<?php
    /**
     * 
     * WebProJect URI helper core file
     * 
     * @package	WebProJect
     * @author	msazzuhair
     * @license	http://opensource.org/licenses/MIT	MIT License
     * @link	https://kafedev.com
     * @since	Version 1.0.0
     */
    
    function site_url($uri = '')
    {
        return config('config','site_url').$uri;
    }

    function redirect($uri = '')
	{
        $code = null;
        
        if (isset($_SERVER['SERVER_PROTOCOL'], $_SERVER['REQUEST_METHOD']) && $_SERVER['SERVER_PROTOCOL'] === 'HTTP/1.1')
            $code = ($_SERVER['REQUEST_METHOD'] !== 'GET') ? 303 : 307;
        else
            $code = 302;

        header('Location: '.$uri, TRUE, $code);
		exit;
	}
?>