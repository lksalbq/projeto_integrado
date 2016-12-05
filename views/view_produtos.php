<div class="container">

    <div class="row text-center" id="fh5co-features">
        <div class=" heading animate-box"><h2>Cadastro de Produtos/Serviços</h2></div>

        <form id="cadastroProdutos" method="post" class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <legend></legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="codigo">Código do produto</label>  
                    <div class="col-md-6">
                        <input id="codigo" name="codigo" placeholder="Código" class="form-control input-md" required="" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="descricao">Descrição do Produto ou Serviço</label>  
                    <div class="col-md-5">
                        <input id="descricao" name="descricao" placeholder="Descrição" class="form-control input-md" required="" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="preco">Valor</label>  
                    <div class="col-md-4">
                        <input id="valor" name="valor" placeholder="Valor" class="form-control input-md" required="" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="quantidade">Quantidade</label>  
                    <div class="col-md-4">
                        <input id="quantidade" name="quantidade" placeholder="Quantidade" class="form-control input-md" type="text">

                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="salvar"></label>
                    <div class="col-md-4">
                        <button id="salvar" name="salvar" class="btn btn-success">Salvar</button>
                        <button id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
                    </div>
                </div>

            </fieldset>
        </form>

    </div>

    <?php
    include_once '../config/database.php';
    include_once '../models/produto.php';


    $database = new Database();
    $db = $database->getConnection();

    $produto = new Produto($db);

    $stmt = $produto->readAll();

    $num = $stmt->rowCount();

//lista os produtos cadastrados
    if ($num > 0) {
        echo "<div class=' heading animate-box'><h2>Lista de Produtos</h2></div>";
        echo "<table id='lista_produtos' class='table table-bordered table-hover lista_produtos'>";


        echo "<tr>";
        echo "<th class='width-5-pct'>Código</th>";
        echo "<th class='width-10-pct'>Descrição</th>";
        echo "<th class='width-20-pct'>Valor</th>";
        echo "<th class='width-20-pct'>Quantidade</th>";
        echo "<th style='text-align:center;'>Ação</th>";
        echo "</tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {



            extract($row);

            echo "<tr>";
            echo "<td>{$codigo}</td>";
            echo "<td>{$descricao}</td>";
            echo "<td>{$valor}</td>";
            echo "<td>{$quantidade}</td>";
            

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


</div>