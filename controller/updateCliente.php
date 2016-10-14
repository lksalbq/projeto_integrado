<?php
//update do usuario requisitado via ajax
include_once __DIR__.'/config/database.php';
include_once __DIR__.'/model/cliente.php';

 
$database = new Database();
$db = $database->getConnection();
 
$cliente = new Cliente($db);

$cliente->id= strip_tags($_POST['id']);

$cliente->nome=strip_tags($_POST['nome']);

$cliente->email=strip_tags($_POST['email']);

$cliente->endereco=strip_tags($_POST['endereco']);

$cliente->update();

?>