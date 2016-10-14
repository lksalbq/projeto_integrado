<?php
//classe cliente
class Cliente {
    private $conn;
    private $table_name = "clientes";

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
        $query = "SELECT nome, email,perfil "
                . "FROM clientes "
                . "ORDER BY nome";
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
                matricula = ?
            LIMIT
                0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->matricula);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->nome = $row['nome'];
    }
    
    //faz um update em cliente caso ele seja editado
    function update() {
        $query = "UPDATE 
                cliente
            SET 
                nome = :nome
            WHERE
                matricula = :matricula";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':matricula', $this->matricula);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    
    //deleta o cliente de acordo com a matrícula
    function deletar() {
        $query = " DELETE FROM cliente, endereco, cargo
                    USING cliente
                    INNER JOIN endereco INNER JOIN cargo
                    WHERE cliente.fkendereco = endereco.idendereco
                    AND cliente.fkCargo = cargo.idcargo
                    AND cliente.matricula = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->matricula);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>