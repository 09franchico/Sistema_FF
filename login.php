<?php

session_start();
require("classes/classe_cadastro.php");
$dadosUsuario = new cadastro_usuario("sistema_ff","localhost:3307","root","");



if(!empty($_POST["email"]) && !empty($_POST["senha"])){
    $email = addslashes($_POST["email"]);
    $senha = addslashes($_POST["senha"]);
    
    
    $res = $dadosUsuario->login($email,$senha);
    if($res){
        foreach ($res as $key =>$value) {
            //echo "<pre>";
             //var_dump($value["email"]);
             //echo "</pre>";

            $_SESSION["email"]=$value["id_usuario"];
            $_SESSION["nome"] = $value["nome"];
            header("location:painel.php"); 
            exit();
             
        }
       
    }else{

          echo"<script>alert('DADOS INVALIDOS !')</script>";
         

    }

}
  







?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>login</title>
</head>
<body>
    <div class="cont-login">
        <div class="login-img">
          <img src="img/novobanner2.png" height="170px" width="356px" alt="">
        </div>
        <div class="login-form">
            <form action="login.php" method="POST">
                <input class="input-log" type="email" name="email" placeholder="email"><br>
                <input class="input-log" type="password" name="senha" placeholder="Senha"><br>
                <button type="submit" class="but-login">Entrar</button><br><br>
                <label for="">Ainda não é cadastrado ?<a id="link-login" href="cadastro.php">CADASTRE-SE</a></label>
            </form>

        </div>
        

    </div>
    
</body>
</html>