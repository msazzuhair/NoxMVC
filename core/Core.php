<?php
    /**
     * 
     * NoxMVC core file
     * 
     * @package	NoxMVC
     * @author	msazzuhair
     * @license	http://opensource.org/licenses/MIT	MIT License
     * @link	https://github.com/msazzuhair/NoxMVC
     * @since	Version 1.0.0
     */

    require_once BASEPATH.'Loader.php';
    require_once BASEPATH.'Database.php';
    require_once BASEPATH.'Uri.php';
    $config = config('config');
    ini_set('session.gc_maxlifetime', $config['session_expiration']);
    date_default_timezone_set($config['default_timezone']);
    setlocale(LC_ALL,$config['localization']);
    define('DATETIME_FORMAT', config('config','localized_datetime_format'));
    session_name('setiawan_spooring');
    session_start();

    $uri_string = '';
    $uri_segment = array();
    $karakter_uri = $config['karakter_uri'];
    
    if (isset($_SERVER['PATH_INFO']))
    {
        $uri_string = $_SERVER['PATH_INFO'];
        $uri_segment = explode('/', ltrim($uri_string));
    }

    $valid_uri = true;
    foreach($uri_segment as $str)
    {
        if (! empty($str) && ! empty($karakter_uri) && !preg_match('/^['.$karakter_uri.']+$/i', $str))
        {
            $valid_uri = false;
            break;
        }
    }
    
    if(! $valid_uri)
    {
        die('Terdapat karakter yang dilarang pada URL');
    }
    else if ($uri_string === '')
    {
        require_once APPPATH.'models/IndexModel.php';
        require_once APPPATH.'controllers/IndexController.php';
        $get_model = new IndexModel();
        $get_controller = new IndexController($get_model);

        $model = $get_model;
        $controller = $get_controller;
        
        $ObjekModel = new $model;
        $ObjekController = new $controller($get_model);
    
        print $ObjekController->index();
    }
    else
    {
        $get_controller = ucfirst($uri_segment[1]);
        $get_model = ucfirst($uri_segment[1]);
        
        $req_method = isset($uri_segment[2])? $uri_segment[2] :'';
        $req_param = array_slice($uri_segment, 3);
        $controller_exists = APPPATH.'controllers/'.$get_controller.'Controller.php';
        
        if (file_exists($controller_exists))
        {
            require_once APPPATH.'models/'.$get_model.'Model.php';
            require_once APPPATH.'controllers/'.$get_controller.'Controller.php';

            $model = $get_model.'Model';
            $controller = $get_controller.'Controller';
            
            $ObjekModel = new $model;
            $ObjekController = new $controller($get_model.'Model');
            
            $method = $req_method;
            
            if ($req_method != '')
            {
                print $ObjekController->$method($req_param);
            }
            else
            {
                print $ObjekController->index();
            }
        }
        else
        {
            header('HTTP/1.1 404 Not Found');
            die('Kode Kesalahan 404 - Laman tidak ditemukan');
        }
    }
?>