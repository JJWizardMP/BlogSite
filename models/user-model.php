<?php
    require('connection.php');
    class UserModel{
        private $db;
    
        public function __construct(){
            $this->db=Connection::connetion("root", "");
        }

        public function close(){
            $this->db = null;
        }

        public function get_row($data){
            try {
                $stmt = $this->db->prepare('SELECT * FROM Users 
                                WHERE Username = :user LIMIT 1');
                $stmt->bindParam(':user', $data[':user'], PDO::PARAM_STR);
                $stmt->execute();
                $n_rows = $stmt->rowcount();
                $row = $stmt->fetch();
            } catch (PDOException $e) {
                die();
            }
            return [ 'record' => $row, 'n_rows' => $n_rows ];
        }

        public function add_row($data){
            try {
                $sql = 'INSERT INTO Users(Name, Username, Password) 
                            VALUES (:name, :user, :password)';
                $stmt= $this->db->prepare($sql);
                $stmt->execute($data);
            } catch (PDOException $e) {
                die();
            }
        }
    }
?>