<?php
    defined('BASEPATH') or exit('Akses Langsung Dilarang');
    /**
     * 
     * WebProJect main configuration file
     * 
     * @package	WebProJect
     * @author	Muhammad Az Zuhair
     * @license	http://opensource.org/licenses/MIT	MIT License
     * @link	https://kafedev.com
     * @since	Version 1.0.0
     */
    
    $config['site_url']                  = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http")."://".$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['SCRIPT_NAME']),"", $_SERVER['SCRIPT_NAME']);
    $config['karakter_uri']              = 'a-z 0-9~%.:_\-';
    $config['session_expiration']        = 0;

    $config['site_data']                 = array(
                                                'title'             => 'NoxMVC',
                                                'subtitle'          => 'Simple PHP Framework with MVC',
                                            );
    
    // Date and Time Configuration
    $config['default_timezone']          = 'Asia/Jakarta';
    $config['datetime_format']           = 'H:i:s';
    $config['localization']              = array('id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
    $config['localized_datetime_format'] = '%A, %d %B %Y - %H.%M';
?>
