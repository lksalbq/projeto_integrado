<?php

//recebe a matricula do funcionario via requisição ajax e deleta o funcionario

include_once __DIR__.'/config/database.php';
include_once __DIR__.'/model/cliente.php';

$database = new Database();
$db = $database->getConnection();

$cliente = new cliente($db);
 
$cliente->id=$_POST['id'];
$cliente->deletar();
?>