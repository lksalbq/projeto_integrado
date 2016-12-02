 <?php

session_start();

if((isset ($_SESSION['nome']) == true) and (isset ($_SESSION['senha']) == true)){ 
   header('location: home.php'); 
}   
include_once "/views/header.php";
?>
            <div id="banner"></div>
            <div id="main" class="container"> 	
                <form name="loginform" id="loginform" action="" method="post" class="wpl-track-me"> 
                    <p class="login-username">
                        <label for="user_login">Usuário</label> 
                        <input type="text" name="nome" id="nome" class="input" placeholder="Usuário" value="" size="20" /> 
                    </p> 
                    <p class="login-password"> 
                        <label for="user_pass">Senha</label><input type="password" name="senha" id="senha" class="input" placeholder="Senha" value="" size="20" /> 
                    </p> 	
                    <p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Lembrar</label></p>
                    <p class="login-submit"><input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Entrar" />
                        <input type="hidden" name="redirect_to" value="#"/>
                    </p> 	
                </form> 
            </div>
      




</body>
</html>
