<?php
class Database{
 
    // specify your own database credentials
    private $host = "192.169.227.103";
    private $port =  "3306";
    private $db_name = "diaGuide_godaddy";
    private $username = "debajit_diaguide";
    private $password = '5$w1nj1E';
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";port=".$this->port .";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>