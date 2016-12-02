<?php
//classse login
class Usuario {
    private $conn;
    private $table_name = "usuario";
 
  
    public $id;
    public $login;
    public $senha;
    public $perfil;
   
    public function __construct($db){
        $this->conn = $db;
    }
    
    //cria um login
    function create(){
 
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    login = ?, senha = ?, perfil = ?";
        
    
 
        $stmt = $this->conn->prepare($query);
 
        $stmt->bindParam(1, $this->login);
        $stmt->bindParam(3, $this->senha);
        $stmt->bindParam(4, $this->perfil);
    
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }       
        
        
    }
    
     //faz um update no usuario caso ele seja editado
    function update() {
        $query = "UPDATE 
                
            SET 
                login = :login,
                senha = :senha,
                perfil = :perfil
                
            WHERE
                id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':login', $this->login);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':perfil', $this->perfil);
        
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
     //lê um usuario para ser editado
    function readOne() {
        $query = "SELECT
                 id,login,senha,perfil
                FROM " . $this->table_name . "
            WHERE
                id = ?
            LIMIT
                0,1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->id = $row['id'];
        $this->login = $row[''];
        $this->senha = $row['senha'];
        $this->perfil = $row['perfil'];
    }
    
    
    //verifica se o usuario existe na tabela login
    
    function logando(){
     
 
    $query = "SELECT *
   
                FROM  " . $this->table_name . "
            WHERE
                login = ? and
                senha = ?
            LIMIT
                1";
 
    $stmt = $this->conn->prepare( $query );
    
    $stmt->bindParam(1, $this->login);
    $stmt->bindParam(2, $this->senha);
    
    $stmt->execute();
    
    return $stmt;
    }
    
    //recupera o nivel de acesso do usuario
    
    function recuperaPerfil(){
     
 
    $query = "SELECT *
   
                FROM  " . $this->table_name . "
            WHERE
                login = ? and
                senha = ?
            LIMIT
                1";
 
    $stmt = $this->conn->prepare( $query );
    
    $stmt->bindParam(1, $this->login);
    $stmt->bindParam(2, $this->senha);
    
    $stmt->execute();
    
    return $stmt->fetch();
    }
    
     //lê todos os usuarios
    function readAll() {
        $query = "SELECT id,login,perfil "
                . "FROM " . $this->table_name . "
                ORDER BY login";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
}