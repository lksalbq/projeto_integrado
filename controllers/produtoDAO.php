<?php
//faz a insercao do produto via requisicao ajax caso tudo esteja conforme


    include_once '../config/database.php';
    $database = new Database();
    $db = $database->getConnection();
    
    
    
    include_once '../models/produto.php';
    $produto = new Produto ($db);
    
   
  
    $produto->codigo = strip_tags($_POST['codigo']);
    $produto->descricao = strip_tags($_POST['descricao']);
    $produto->valor =  strip_tags($_POST['valor']);
    $produto->quantidade =  strip_tags($_POST['quantidade']);


    
    $produto->create();  
    
