<?php

//recebe a matricula do funcionario via requisição ajax e deleta o funcionario

include_once '../config/database.php';
include_once '../models/cliente.php';

$database = new Database();
$db = $database->getConnection();

$cliente = new Cliente($db);

$cliente->idclientes=$_POST['idclientes'];
$cliente->deletar();
?>