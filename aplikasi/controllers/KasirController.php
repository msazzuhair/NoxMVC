<?php
    defined('BASEPATH') or exit('Akses Langsung Dilarang');
    /** Autoloading The required Classes **/
    class KasirController {
        private $model;
        private $site_data;
        function __construct( $tile )
        {
            if(!isset($_SESSION['logged']) || $_SESSION['logged']==false)
            {
                redirect(site_url('auth'));
            }
            /** Loading the corresponding Model class **/
            $this->model = new $tile;
            $this->site_data = config('config','site_data');
        }

        public function index()
        {
            $data = array(
                'site'      => $this->site_data,
                'page'      => array('title' => 'Home'),
                'css'       => array('style','menu'),
                'js'        => array('main'),
                'customer'  => $this->model->getCustomers(),
                'pembayaran'  => $this->model->getPembayaran()
            );
            render('penjualan/kasir',$data);
        }

        public function add_item()
        {
            $customer = htmlspecialchars($_POST['customer'],ENT_QUOTES,'UTF-8');
            $pembayaran = htmlspecialchars($_POST['pembayaran'],ENT_QUOTES,'UTF-8');
            $nopol = htmlspecialchars($_POST['nopol'],ENT_QUOTES,'UTF-8');
            $_SESSION['kasir_customer'] = $customer;
            $_SESSION['kasir_pembayaran'] = $pembayaran;
            $_SESSION['kasir_nopol'] = strtoupper($nopol);
            $item = htmlspecialchars($_POST['add_item'],ENT_QUOTES,'UTF-8');
            $qty  = htmlspecialchars($_POST['qty'],ENT_QUOTES,'UTF-8');
            $barang = $this->model->getBarang((int) $item);
            
            if ($barang)
            {
                if(isset($_SESSION['kasir']))
                {
                    foreach ($_SESSION['kasir'] as $key => $value) {
                        if ($value['idBarang'] == $barang['idBarang']) $k = $key;
                    }
                    if(isset($k))
                    {
                        $_SESSION['kasir'][$k]['qty']+=$qty;
                    }else
                    {
                        $barang['qty'] = $qty;
                        $_SESSION['kasir'][] = $barang;    
                    }
                }
                else
                {
                    $barang['qty'] = $qty;
                    $_SESSION['kasir'][] = $barang;
                }
            }
            redirect(site_url('kasir'));
        }

        public function delete_item($item='')
        {
            if (!empty($item) && isset($_SESSION['kasir']))
            {
                unset($_SESSION['kasir'][(int)$item-1]);
                $_SESSION['kasir']  = array_values($_SESSION['kasir']);
            }
            redirect(site_url('kasir'));
        }

        public function cancel()
        {
            if (isset($_SESSION['kasir']))
            {
                unset($_SESSION['kasir']);
                unset($_SESSION['kasir_customer']);
                unset($_SESSION['kasir_pembayaran']);
                unset($_SESSION['kasir_nopol']);
            }
            redirect(site_url('kasir'));
        }

        public function cetak()
        {
            
            if (!isset($_SESSION['kasir']))
            {
                redirect(site_url('kasir'));
            }
            $data = array(
                'customer'  => $this->model->getCustomers(),
                'pembayaran'  => $this->model->getPembayaran(),
            );
            load_view('penjualan/cetak',$data);
        }
    }
?>