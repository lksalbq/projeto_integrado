<?php
//faz a insercao do cliente via requisicao ajax caso tudo esteja conforme
if($_POST){

    include_once $_SERVER['DOCUMENT_ROOT'].'/config/database.php';
    $database = new Database();
    $db = $database->getConnection();
    
    
    
    include_once $_SERVER['DOCUMENT_ROOT'].'../model/cliente.php';
    $cliente = new Cliente($db);
    
   
  
    $cliente->nome = strip_tags($_POST['nome']);
    $cliente->endereco = strip_tags($_POST['endereco']);
    $cliente->email =  strip_tags($_POST['email']);
    $cliente->perfil =  strip_tags($_POST['perfil']);

    
    $cliente->create();  
    
  
}
