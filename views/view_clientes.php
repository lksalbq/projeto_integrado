<div id="hoverCliente" class="container">

    <div class="row text-center" id="fh5co-features">

        <div class=" heading animate-box"><h2>Cadastro de Clientes</h2></div>

        <div id="load" class="form-group"></div>

        <div id="msgsucesso"  style="display: none;" class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Cliente cadastrado com sucesso!
        </div>

        <form  id="cadastroCliente" class="form-horizontal"  action="" method="POST" autocomplete="off" enctype="multipart/form-data">
            <fieldset>

                <!-- Form Name -->
                <legend></legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="">Nome</label>  
                    <div class="col-md-6">
                        <input id="nome" name="nome" placeholder="Nome" class="form-control input-md" required="" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="endereco">Endereço</label>  
                    <div class="col-md-6">
                        <input id="endereco" name="endereco" placeholder="Endereço" class="form-control input-md" required="" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">E-mail</label>  
                    <div class="col-md-5">
                        <input id="email" name="email" placeholder="E-mail" class="form-control input-md" required="" type="text">

                    </div>
                </div>

                <!-- Button (Double) --> 
                <div class="form-group"> <label class="col-md-4 control-label" for="salvar"></label> <div class="col-md-4"> <button id="salvar" name="salvar" class="btn btn-success">Salvar</button> 
                <button id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button> </div> </div>
            </fieldset>
        </form>
    </div>
    <div id="msgsucessodelete"  style="display: none;" class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Cliente excluído com sucesso!
    </div>
    
 <?php
    include_once '../config/database.php';
    include_once '../models/cliente.php';


    $database = new Database();
    $db = $database->getConnection();

    $cliente = new Cliente($db);

    $stmt = $cliente->readAll();

    $num = $stmt->rowCount();

//lista os funcionarios cadastrados
    if ($num > 0) {
        echo "<div class=' heading animate-box'><h2>Lista de Clientes</h2></div>";
        echo "<table id='lista_clientes' class='table table-bordered table-hover lista_clientes'>";


        echo "<tr>";
        echo "<th class='width-50-pct'>Nome</th>";
        echo "<th class='width-100-pct'>Endereço</th>";
        echo "<th class='width-200-pct'>E-mail</th>";
        echo "<th style='text-align:center;'>Ação</th>";
        echo "</tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {



            extract($row);

            echo "<tr>";
            echo "<td>{$nome}</td>";
            echo "<td>{$endereco}</td>";
            echo "<td>{$email}</td>";
            

            echo "<td style='text-align:center;'>";
            echo "<div id='idclientes' class='idclientes display-none' style='display: none;'>{$idclientes}</div>";

            echo "<div class='btn btn-info edit-btn margin-right-1em'>";
            echo "<span class='glyphicon glyphicon-edit'></span> Editar";
            echo "</div>";


            echo "<div class='btn btn-danger delete-btn'>";
            echo "<span class='glyphicon glyphicon-remove'></span> Deletar";
            echo "</div>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<div class='lista_clientes alert alert-info'>Nenhum Cliente Cadastrado!</div>";
    }

    echo "<div id='page-edita'></div>";
?>
