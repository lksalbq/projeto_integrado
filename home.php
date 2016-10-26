<?php
include_once "header.php";
include_once "menu.php";
?>

<div id="fh5co-main">

    <div class="fh5co-cards">
        <div class="container-fluid">
            <div class="row animate-box">
                <div class="col-md-12 heading text-center"><h2>Administrador, Seja Bem-Vindo! </h2></div>
                <ul>
                     <li role="presentation"><a tabindex="-1" href="controller/logout.php"> <i aria-hidden="true" class="glyphicon glyphicon-log-out"></i> Sair  </a></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6 animate-box">
                    <a  class="fh5co-card smoothscroll" href="#hoverCliente" >
                        <img id="imgCliente" src="images/clientes.png" alt="" class="img-responsive">
                        <div class="fh5co-card-body">
                            <h3>Cadastro de Clientes</h3>

                        </div>
                    </a>
                </div>


            </div>
        </div>
    </div>

    <?php
    include_once "./view/view_cliente.php";
    ?>


    <footer role="contentinfo" id="fh5co-footer">
        <a href="#" class="fh5co-arrow fh5co-gotop footer-box"><i class="ti-angle-up"></i></a>
    </footer>

</body>
</html>
