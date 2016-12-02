<?php
include_once "header.php";
include_once "menu.php";
?>

<div id="fh5co-main">

    <div class="fh5co-cards">
        <div class="container-fluid">
            <div class="row animate-box">
                <div class="col-md-12 heading text-center"><h2>Administrador, Seja Bem-Vindo! </h2></div>
                
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 animate-box">
                    <a class="smoothscroll" href="#cadastroProdutos">

                        <div class="fh5co-card-body">
                            <img class="img-card-home"  src="../images/produtos_servicos.png" alt="" class="img-responsive">
                          
                            <p></p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 animate-box">
                    <a  class="smoothscroll" href="#cadastroCliente">

                        <div class="fh5co-card-body">
                            <img  class="img-card-home" src="../images/clientes.png" alt="" class="img-responsive">


                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 animate-box">
                    <a class="smoothscroll" href="#cadastroVendas">

                        <div class="fh5co-card-body">
                            <img class="img-card-home" src="../images/leitor.png" alt="" class="img-responsive">
                          

                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 animate-box">
                    <a class="smoothscroll" href="#caixa">
                        
                        <div class="fh5co-card-body">
                            <img src="../images/cashier-icon.png" alt="" class="img-responsive">
                        
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>

    
    <?php include_once 'view_clientes.php' ?>
    
    <?php include_once 'view_produtos.php' ?>
    
    <?php include_once 'view_vendas.php' ?>
    
    <?php include_once 'view_caixa.php' ?>
    


    <footer role="contentinfo" id="fh5co-footer">
        <a href="#" class="fh5co-arrow fh5co-gotop footer-box"><i class="ti-angle-up"></i></a>
    </footer>

</body>
</html>
