<?php
    defined('BASEPATH') or exit('Akses Langsung Dilarang');
    /** Autoloading The required Classes **/
    class KasirModel
    {
        public function getCustomers()
        {
            $query = get("select * from customer");
            return array_hasil($query);
        }

        public function getPembayaran()
        {
            $query = get("select * from pembayaran");
            return array_hasil($query);
        }

        public function getBarang($idBarang)
        {
            $query = get("select * from barang where idBarang='$idBarang'");
            return baris($query);
        }
    }
?>