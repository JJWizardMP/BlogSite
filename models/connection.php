<?php
    class Connection{
        public static function connetion($user, $password){
            $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
            try {
                $mbd = new PDO('mysql:host=localhost;dbname=Blogs', $user, $password, $options);
            } catch (PDOException $e) {
                die();
            }
            return $mbd;
        }
    }
?>