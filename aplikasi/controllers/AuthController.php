<?php
    defined('BASEPATH') or exit('Akses Langsung Dilarang');
    /** Autoloading The required Classes **/
    class AuthController {
        private $model;
        private $site_data;
        function __construct( $tile )
        {
            /** Loading the corresponding Model class **/
            $this->model = new $tile;
            $this->site_data = config('config','site_data');
        }
        
        public function index()
        {
            if(isset($_SESSION['logged']) && $_SESSION['logged']==true)
            {
                redirect(site_url(''));
            }

            $data = array(
                'site' => array('title' => 'Setiawan Spooring'),
                'css' => array('login')
            );
            load_view('auth/login',$data);
        }

        public function verify()
        {
            if(isset($_SESSION['logged']) && $_SESSION['logged']==true)
            {
                redirect(site_url(''));
            }

            $username = htmlspecialchars($_POST['username'],ENT_QUOTES,'UTF-8');
            $password = htmlspecialchars($_POST['password'],ENT_QUOTES,'UTF-8');

            $rows = $this->model->getUserPasswordHash($username);
            if (count($rows) != 1) 
            {
                setFlash('login-error','Username/Password tidak sesuai');
                redirect(site_url('auth'));
            }
            $row = prep_baris($rows);
            if (password_verify($password,$row->password)) {
                $sess = array(
                    'logged' => TRUE,
                    'user_id' => $row->id,
                    'username' => $row->username,
                );
                session_start();
                $_SESSION = $sess;
                redirect(site_url(''));
            } else {
                setFlash('login-error','Username/Password tidak sesuai');
                redirect(site_url('auth'));
            }
        }
        
        public function logout()
        {
            if(!isset($_SESSION['logged']) || $_SESSION['logged']==false)
            {
                redirect(site_url('auth'));
            }
            session_destroy();
            redirect(site_url('auth'));
        }
    }
?>