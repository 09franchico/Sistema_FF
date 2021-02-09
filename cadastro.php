<?php

require("classes/classe_cadastro.php");
$dadosUsuario = new cadastro_usuario("sistema_ff","localhost:3307","root","");

//inserir dados no banco de dados
if(isset($_POST["nome"])){

    $nome = addslashes($_POST["nome"]);
    $telefone = addslashes($_POST["telefone"]);
    $email = addslashes($_POST["email"]);
    $senha = addslashes($_POST["senha"]);

    if(!empty($nome)&& !empty($telefone) && !empty($email) && !empty($senha)){

       if( !$dadosUsuario -> cadastroPessoa($nome,$telefone,$email,$senha)){
           echo"<script>alert('Dados ja estão Cadastrados')</script>";

       }else{
           echo"<script>alert('Dados cadastrados com sucesso')</script>";
           
       }
    
    }else{

        echo "<script>alert('Campos devem estar preenchico')</script>";
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>cadastro</title>
</head>
<body>
    <div class="cont-cad">
        <div class="cad-img">
            <img class="cad-img" src="img/imagem1.png" height="100vh" width="100%" alt="">

        </div>
        <div class="cad-form">
            <form class="cad-f" action="cadastro.php" method="POST">
                <input class="cad-input" type="text" name="nome" placeholder="nome"><br>
                <input  class="cad-input" type="text" name="telefone" placeholder="telefone"><br>
                <input  class="cad-input" type="email" name="email" placeholder="email"><br>
                <input  class="cad-input" type="password" name="senha" placeholder="senha"><br>
                <a href=""><button type="submit" class="but-login">salvar</button></a>
            </form>

        </div>

    </div>
    
</body>
</html>