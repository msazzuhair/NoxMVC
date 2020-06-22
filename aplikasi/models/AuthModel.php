<?php
    defined('BASEPATH') or exit('Akses Langsung Dilarang');
    /** Autoloading The required Classes **/
    class AuthModel
    {
        public function getUserPasswordHash($inputUsername)
        {
            $conn = _dbconn();
            $result = array();
            if ($stmt = $conn->prepare('SELECT id, username, password FROM users WHERE username=?'))
            {
                $stmt->bind_param("s", $username);
                $username = $inputUsername;
                $stmt->execute();
                $stmt->bind_result($id, $user,$pass);
                
                while ($stmt->fetch()) {
                    $result[] = array('id' => $id, 'username' => $user, 'password' => $pass);
                }
                $stmt->close();
            }
            $conn->close();
            return $result;
        }
    }
?>