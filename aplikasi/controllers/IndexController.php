<?php
    defined('BASEPATH') or exit('Akses Langsung Dilarang');
    /** Autoloading The required Classes **/
    class IndexController {
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
            $user_data = $this->model->getUserData();
            $data = array(
                'site' => $this->site_data,
                'page' => array('title' => 'Home'),
                'css'  => array('style','menu'),
                'js'   => array('main'),
                'user' => $user_data
            );
            $_SESSION['user_data'] = $user_data;
            render('home',$data);
        }
        
    }
?>