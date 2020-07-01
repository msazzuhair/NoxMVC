<?php

    error_reporting(E_ALL);
    /**
     * 
     * NoxMVC index file
     * 
     * @package	NoxMVC
     * @author	Muhammad Az Zuhair
     * @license	http://opensource.org/licenses/MIT	MIT License
     * @link	https://github.com/msazzuhair/NoxMVC
     * @since	Version 1.0.0
     */

    /*
     * -------------------------------------------------------------------
     *  Configurasi Direktori
     * -------------------------------------------------------------------
     * 
     */
    $app_path = 'aplikasi';
    $conf_path = 'config';
    $base_path = 'core';
    $assets_path = 'assets';

    /*
     * -------------------------------------------------------------------
     *  Deklarasi Konstanta
     * -------------------------------------------------------------------
     * 
     */
    define('APPPATH',$app_path.DIRECTORY_SEPARATOR);
    define('CONFIGPATH',$conf_path.DIRECTORY_SEPARATOR);
    define('BASEPATH',$base_path.DIRECTORY_SEPARATOR);
    define('ASSETSPATH',$assets_path.DIRECTORY_SEPARATOR);

    /*
     * --------------------------------------------------------------------
     * Memuat file inti
     * --------------------------------------------------------------------
     *
     * Siap meluncur...
     */
    require_once BASEPATH.'Core.php';
?>