<?php
date_default_timezone_set('America/Sao_Paulo');
//faz a insercao do cliente via requisicao ajax caso tudo esteja conforme
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();



include_once '../models/cliente.php';
$cliente = new Cliente($db);


$cliente->idclientes = strip_tags($_POST["idclientes"]);
$cliente->nome = strip_tags($_POST["nome"]);
$cliente->endereco = strip_tags($_POST["endereco"]);
$cliente->email = strip_tags($_POST["email"]);



$cliente->create();



