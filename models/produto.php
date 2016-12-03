<?php
//classe produto
class Produto {
    private $conn;
    private $table_name = "produto";
    
    public $idproduto;
    public $codigo;
    public $descricao;
    public $valor;
    public $quantidade;

    
    public function __construct($db) {
        $this->conn = $db;
    }
    //cadastrar produto
    
    function create() {
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    idproduto = ?, codigo = ?, descricao = ?, valor = ?, quantidade = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idproduto);
        $stmt->bindParam(2, $this->codigo);
        $stmt->bindParam(3, $this->descricao);
        $stmt->bindParam(4, $this->valor);
        $stmt->bindParam(5, $this->quantidade);

       

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    
    //lê todos os produtos
    function readAll() {
        $query = "SELECT * "
                . "FROM produto "
                . "ORDER BY idproduto";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    
    //lê um produto para a tabela lista_produtos
    function readOne() {
        $query = "SELECT
                 codigo,descricao,valor,quantidade
                FROM produto
            WHERE
                idproduto = ?
            LIMIT
                0,1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idproduto);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->codigo = $row['codigo'];
        $this->descricao = $row['descricao'];
        $this->valor = $row['valor'];
        $this->quantidade = $row['quantidade'];
    }
    
    //faz um update em cliente caso ele seja editado
    function update() {
        $query = "UPDATE 
                clientes
            SET 
                nome = :nome,
                endereco = :endereco,
                email = :email
                
            WHERE
                id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':email', $this->email);
        
        
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