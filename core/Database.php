<?php
    /**
     * 
     * NoxMVC database core file
     * 
     * @package	NoxMVC
     * @author	msazzuhair
     * @license	http://opensource.org/licenses/MIT	MIT License
     * @link	https://github.com/msazzuhair/NoxMVC
     * @since	Version 1.0.0
     */ 

    function _dbconn()
    {
        // require_once CONFIGPATH.'database.php';
        $db = config('database');
        $link = mysqli_connect($db['hostname'], $db['username'], $db['password'], $db['database']);

        if (!$link) {
            return false;
        }        

        return $link;
    }

    function get($query = '')
    {
        return mysqli_query(_dbconn(),$query);
    }

    function array_hasil($result)
    {
        if(!$result) return false;

        while($row = $result->fetch_assoc()) $rows[] = $row;

        return $rows;
    }

    function baris($result)
    {
        if ($result == false) return false;
        return mysqli_fetch_array($result);
    }

    function prep_baris($array)
    {
        if ($array == false) return false;
        return (object) $array[0];
    }
?>