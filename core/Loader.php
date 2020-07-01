<?php
    /**
     * 
     * NoxMVC loader core file
     * 
     * @package	NoxMVC
     * @author	msazzuhair
     * @license	http://opensource.org/licenses/MIT	MIT License
     * @link	https://github.com/msazzuhair/NoxMVC
     * @since	Version 1.0.0
     */
    
    function load_view($file = '', $data = array())
    {
        extract($data);
        $view_path = APPPATH.'views/'.$file.'.php';
        if(!file_exists($view_path)) echo 'Berkas view tidak ditemukan!<br>'.$view_path.'<br>';
        else include $view_path;
    }

    function asset_url($file = '')
    {
        return site_url(ASSETSPATH.$file);
    }

    function config($file,$key = '')
    {
        $conf = array();
        require CONFIGPATH.$file.'.php';
        if ($file == 'database')
        {
            $conf = $db;
        }else
        {
            $conf = $config;
        }
        if (!empty($key)) return $conf[$key];
        return $conf;
    }

    function render($file='',$data = array())
    {
        load_view('_layout/header',$data);
        load_view('_layout/nav',$data);
        load_view($file,$data);
        load_view('_layout/footer',$data);
    }

    function setFlash($key, $message)
    {
        if(!isset($_SESSION)) session_start();
        $_SESSION['flash'] = array();
        $_SESSION['flash'][$key] = $message;
    }

    function getFlash($key)
    {
        if(!isset($_SESSION) || !isset($_SESSION['flash'][$key])) return false;
        $message = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $message;
    }
?>