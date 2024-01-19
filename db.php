<?php
class Database{
    public $pdo;
 
    public function __construct($db = "test", $user ="root", $pass="Rasool123!", $host="localhost:3306") {
 
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully $db";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
       
        }
       
 
        public function insertUser($email, $password){
           $stmt = $this->pdo->prepare("insert into user(email, password) values (?, ?)");
           $password = password_hash($password, PASSWORD_DEFAULT);
           $stmt->execute([$email, $password]);
        }
   
        public function selectUser(){
            $stmt = $this->pdo->query("SELECT * FROM user");
            $resultaat = $stmt->fetchAll();
            return $resultaat;
        }
 
        public function selectOneUser($id){
            $stmt = $this->pdo->prepare("SELECT * FROM user WHERE id = ?");
            $stmt->execute([$id]);
            $resultaat = $stmt->fetch();
            return $resultaat;
        }

        public function editUser(string $email, String $password, int $id){
          $stmt = $this->pdo->prepare("UPDATE user SET email = ?, password = ? WHERE id = ?");
          $stmt->execute([$email, $password, $id]);
        }
 
        public function deleteUser(int $id){
          $stmt = $this->pdo->prepare("DELETE  from users  WHERE id = ?");
          $stmt->execute([$id]);
        }

      
}
 
 
 
 
 
                                         
 
?>