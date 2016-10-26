<?php
include_once './config/database.php';
include_once './model/cliente.php';



$id = isset($_GET['id']) ? $_GET['id'] : die('Cliente não encontrado!');
 
$database = new Database();
$db = $database->getConnection();

$cliente = new cliente($db);

$cliente->id = $id;


$cliente->readOne();

?>

<form id='updateCliente' action='' method='post' border='0' autocomplete="off">
    <table class='table table-bordered table-hover'>
        
        <tr>
            <td>Nome</td>
            <td>
                <input name='nome' type="text" class='form-control' value='<?php echo htmlspecialchars($cliente->nome, ENT_QUOTES); ?>' required=/>
            </td>
        </tr>
        <tr>
            <td>Endereço</td>
            <td><input type='text' name='endereco' class='form-control' value='<?php echo htmlspecialchars($cliente->endereco, ENT_QUOTES);  ?>' required /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input  type='text' name='email' class='form-control' value='<?php echo htmlspecialchars($cliente->email, ENT_QUOTES);  ?>' required /></td>
        </tr>
        <tr>
            <td>
              
                <input type='hidden' name='id' value='<?php echo $id ?>' /> 
        
            </td>
            <td>
                <button type='submit' class='btn btn-primary'>
                    <span class='glyphicon glyphicon-edit'></span> Salvar Alterações
                </button>
            </td>
        </tr>
    </table>
</form>

<div id="msgsucessoupdate"  style="display: none;" class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Cliente alterado com sucesso!
</div>