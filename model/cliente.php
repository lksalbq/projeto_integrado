<?php
//classe cliente
class Cliente {
    private $conn;
    private $table_name = "clientes";
    
    public $id;
    public $nome;
    public $endereco;
    public $email;
    public $perfil;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    //cria um cliente
    
    function create() {
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    nome = ?, endereco = ?,email = ?, perfil = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->nome);
        $stmt->bindParam(2, $this->endereco);
        $stmt->bindParam(3, $this->email);
        $stmt->bindParam(4, $this->perfil);
       

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    
    //lê todos os clientes
    function readAll() {
        $query = "SELECT id,nome, email,perfil "
                . "FROM clientes "
                . "ORDER BY id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    
    //lê um cliente para a tabela lista_clientes
    function readOne() {
        $query = "SELECT
                 nome
                FROM clientes
            WHERE
                id = ?
            LIMIT
                0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->nome = $row['nome'];
    }
    
    //faz um update em cliente caso ele seja editado
    function update() {
        $query = "UPDATE 
                clientes
            SET 
                nome = :nome
            WHERE
                matricula = :matricula";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':id', $this->id);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    
    //deleta o cliente de acordo com a matrícula
    function deletar() {
        $query = " DELETE FROM clientes WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(1, $this->id);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>