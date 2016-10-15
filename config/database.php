<?php
class Database {

    public $url;
    public $host;
    public $db_name;
    public $username;
    public $password;
    public $conn;

    public function __construct(){
        $this->host = "localhost";
        $this->db_name = "rc_info";
        $this->username = "root";
        $this->password = "";    
    }
    
    public function getConnection() {
   
        $this->conn = null;
 
        try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch (PDOException $exception) {
                echo "Connection error: " . $exception->getMessage();
        }
     
        
        return $this->conn;
    }
    
    
}
?>