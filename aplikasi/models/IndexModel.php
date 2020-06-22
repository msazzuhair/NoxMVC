<?php
    defined('BASEPATH') or exit('Akses Langsung Dilarang');
    /** Autoloading The required Classes **/
    class IndexModel
    {
        public function getUserData()
        {
            $user_id = $_SESSION['user_id'];
            $query = get("select username,pegawai_nama from users join pegawai on users.id=user_id where users.id='$user_id';");
            $result = baris($query);
            $query = get("select jabatan_deskripsi from jabatan natural join menjabat_sebagai natural join pegawai where user_id='$user_id';");
            $result['jabatan'] = array_hasil($query);
            return $result;
        }
    }
?>