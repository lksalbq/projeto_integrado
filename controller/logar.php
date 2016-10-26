<?php
session_start();
//faz o login do usuario de acordo com os dados passados
include_once ('../config/database.php');
include_once ('../model/usuario.php');


$database = new Database();
$db = $database->getConnection();

$usuario = new Usuario($db);

$usuario->nome = strip_tags($_POST['nome']);
$usuario->senha = strip_tags($_POST['senha']);

$stmt = $usuario->logando();


$num = $stmt->rowCount();

if($num > 0)
{   
    echo 1;
    $_SESSION['nome'] = $usuario->nome;
    $_SESSION['senha'] = $usuario->senha;
    $_SESSION['perfil'] = $usuario->perfil;
    
}
else{
    echo 0;      
}
?>