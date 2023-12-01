<?php
class Database{
    public $pdo;

    public function __construct($db = "test", $host = "localhost",  $user = "root", $pass = "Rasool123!") {

        try{
            $this->pdo = new PDO("mysql:$host=;dbname=$db", $user, $pass);
            $this->pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo"connected to database $db";
           }catch(PDOException $e){
            echo "Connection failed:" . $e->getMessage();
           }  
        
        }
       

        public function insertUser($email, $password){
           $stmt = $this->pdo->prepare("insert into user(email, password) values (?, ?)");
           $password = password_hash($password, PASSWORD_DEFAULT);
           $stmt->execute([$email, $password]);
        }

        public function select(){
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
}





                                          

?>
