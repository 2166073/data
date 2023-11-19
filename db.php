<?php
class Database{
    public $pdo;

    public function __construct($db = "test", $host = "localhost",  $user = "root", $pass = "Rasool123!") {

        try{
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $this->pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo"connected to database $db";
           }catch(PDOException $e){
            echo "Connection failed:" . $e->getMessage();
           }  
        
        }
}

$connectie = new Database();                                            

?>