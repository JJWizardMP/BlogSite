<?php
    require('connection.php');
    class PostModel{
        private $db;
    
        public function __construct(){
            $this->db=Connection::connetion("root", "");
        }

        public function close(){
            $this->db = null;
        }
        // New Post
        public function add_post($data){
            try {
                $sql = 'INSERT INTO Posts(ID_User, Title, Imagepath, Description, Content, DateTime) 
                            VALUES (:iduser, :title, :imgpath, :des, :cont, :dt)';
                $stmt= $this->db->prepare($sql);
                $stmt->execute($data);
                $stmt = $this->db->query("SELECT LAST_INSERT_ID()");
                $lastId = $stmt->fetchColumn();
            } catch (PDOException $e) {
                die();
            }
            return $lastId;
        }
        // Update image path
        public function update_path($path, $id){
            try {
                $sql = "UPDATE Posts SET Imagepath=:imgpath WHERE ID_Post=:id";
                $stmt= $this->db->prepare($sql);
                $stmt->bindValue(':imgpath', $path, PDO::PARAM_STR);
                $stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
                $stmt->execute();
            } catch (PDOException $e) {
                die();
            }
        }
        // Get rows num of the posts
        public function count_posts(){
            try {
                $sql = 'SELECT * FROM Posts';
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $n_rows = $stmt->rowcount();
            } catch (PDOException $e) {
                die();
            }
            return $n_rows;
        }
        // Get a specific post
        public function get_post($id){
            try {
                $sql = 'SELECT Posts.ID_Post, Users.ID_User, Users.Username, Posts.Title, 
                        Posts.Imagepath, Posts.Description, Posts.Content, Posts.DateTime 
                        FROM Users INNER JOIN Posts ON Posts.ID_User = Users.ID_User 
                        WHERE Posts.ID_Post = :id';
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(':id', ((int)$id), PDO::PARAM_INT);
                $stmt->execute();
                $row = $stmt->fetch();
            } catch (PDOException $e) {
                die();
            }
            return $row;
        }
        // Get post section home
        public function get_limit_post($start_from, $record_per_page){
            try {
                $sql = 'SELECT Posts.ID_Post, Users.ID_User, Users.Username, Posts.Title, 
                        Posts.Imagepath, Posts.Description, Posts.Content, Posts.DateTime 
                        FROM Users INNER JOIN Posts ON Posts.ID_User = Users.ID_User 
                        ORDER BY Posts.ID_Post DESC LIMIT :start, :records';
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(':start', (int) $start_from, PDO::PARAM_INT);
                $stmt->bindValue(':records', (int) $record_per_page, PDO::PARAM_INT);
                $stmt->execute();
                $rows = $stmt->fetchAll();
            } catch (PDOException $e) {
                die();
            }
            return $rows;
        }
        // Add new comment
        public function add_comment($data){
            try {
                $sql = 'INSERT INTO Comments(ID_Post, ID_User, Comment, DateTime) 
                            VALUES (:idpost, :iduser, :comment, :dt)';
                $stmt= $this->db->prepare($sql);
                $stmt->execute($data);
            } catch (PDOException $e) {
                die();
            }
        }
        // Get all comments in a post
        public function get_comments($id){
            try {
                $sql = 'SELECT Comments.ID_Comment, Comments.ID_Post, Users.ID_User, Users.Username, 
                        Comments.Comment, Comments.DateTime 
                        FROM Users INNER JOIN Comments ON Comments.ID_User = Users.ID_User 
                        WHERE Comments.ID_Post = :id
                        ORDER BY Comments.ID_Comment DESC';
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(':id', ((int)$id), PDO::PARAM_INT);
                $stmt->execute();
                $rows = $stmt->fetchAll();
            } catch (PDOException $e) {
                die();
            }
            return $rows;
        }
        // Add new reply
        public function add_reply($data){
            try {
                $sql = 'INSERT INTO Replies(ID_Comment, ID_User, ID_Post, Reply, DateTime) 
                            VALUES (:idcomment, :iduser, :idpost, :reply, :dt)';
                $stmt= $this->db->prepare($sql);
                $stmt->execute($data);
            } catch (PDOException $e) {
                die();
            }
        }
        // Get all comments in a post
        public function get_all_replies($idpost, $idcomment){
            try {
                $sql = 'SELECT Replies.ID_Comment, Replies.ID_Post, Users.ID_User, Users.Username, 
                        Replies.Reply, Replies.DateTime 
                        FROM Users 
                        INNER JOIN Replies ON Replies.ID_User = Users.ID_User
                        WHERE Replies.ID_Post = :idpost AND Replies.ID_Comment = :idcomment
                        ORDER BY Replies.ID_Reply DESC';
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(':idpost', ((int)$idpost), PDO::PARAM_INT);
                $stmt->bindValue(':idcomment', ((int)$idcomment), PDO::PARAM_INT);
                $stmt->execute();
                $rows = $stmt->fetchAll();
            } catch (PDOException $e) {
                die();
            }
            return $rows;
        }
    }
?>