<?php
session_start();
require("verificaLogin.php");



?>

<?php

require("classes/classe_produtos.php");
$dadosCadastro = new produtos("sistema_ff","localhost:3307","root","");


if(isset($_POST["titulo"])){

    $titulo = addslashes($_POST["titulo"]);
    $premiacao = addslashes($_POST["premiacao"]);
    $tipo = addslashes($_POST["tipo"]);
    $descricao = addslashes($_POST["descricao"]);
    $data= addslashes($_POST["data"]);
    $valor= addslashes($_POST["valor"]);
    $link= addslashes($_POST["link"]);
    $id = $_SESSION["email"];

    
    $imagem = $_FILES["img"]["name"].rand(1,999).'.png';

    //verifica se foi enviada 
    //if(isset($_FILES["foto"])){

        // mover a foto para a pasta img
    move_uploaded_file($_FILES["img"]["tmp_name"],"imagens/".$imagem);

    if(!empty($titulo) && !empty($premiacao) && !empty($tipo)&& !empty($descricao) && !empty($data) && !empty($valor) && !empty($link)){
         $dadosSalvos=$dadosCadastro->cadastroCamp($tipo,$titulo,$premiacao,$descricao,$data,$valor,$imagem,$link,$id);
         if($dadosSalvos){
            echo"<script>alert('Dados Publicados com sucesso !')</script>";
        }else{
            echo"<script>alert('Erro ao cadastrar')</script>";
        }

    }else{

        echo"<script>alert('Preenchas todos os Campos')</script>";
    }

    




    
    

    // }

    

}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estiloPainel.css">
    <title>Painel admin</title>
</head>
<body>
    <div class="inicio-painel">
        <div class="painel-img">
          ....
        </div>
        <div class="painel-bv">
            <h1><?php echo $_SESSION["nome"]  ?> </h1>

        </div>
        <div class="painel-sair">
        <a class="sair" href="logout.php">Sair</a>
        </div>

    </div>
    <div class="cont-painel">
        <!--Menu-->
        <div class="menu-painel">
            <div id="exit-painel" ><img  src="img/exit.png" height="30px" width="30px" alt=""></div>
             <a href=""><div id="menu-item1" class="menu-item">HOME</div></a>
            <div id="menu-item2"  class="menu-item">CAMPEONATO</div>
            <div class="menu-item">CONTATO</div>
            <div id="menu-item4" class="menu-item">RECRUTAMENTO</div>
        </div>  

        <!--icon menu-->
        <div id="menu-painel">
            <img  src="img/menu.png" height="40px" width="40px" alt="">
        </div>

        <!--1 formulario-->

        <div class="geral-painel">
            <div class="form-painel" >
                <form  action="painel.php" method="POST" enctype="multipart/form-data">
                    <label id="inicio-form">CADASTRO DE CAMPEONATOS</label><br>
                    <label > <h4>TITULO</h4>
                    <input type="text" name="titulo" ><br>
                    </label>
                    <label > <h4>PREMIAÇÃO</h4>
                    <input type="text" name="premiacao" >
                   </label>
                    <select name="tipo">
                        <option value="solo">SOLO</option>
                        <option value="duo">DUO</option> 
                        <option value="squard">SQUARD</option>
                    </select><br />
                    <label > <h4>DESCRIÇÃO</h4>
                    <textarea name="descricao" id="" cols="80" rows="10"></textarea><br>
                    </label>
                    <label > <h4>DATA</h4>
                    <input type="date" name="data" ><br>
                    </label>
                    <label > <h4>VALOR</h4>
                    <input type="text" name="valor" >
                    </label>
                    <label  id="file">IMAGEM</label><input type="file" name="img" placeholder="imagem"><br>
                    <label > <h4>LINK WHATSAPP</h4>
                    <input type="text" name="link" ><br>
                    </label>
                    <label class="label" ><button type="submit">enviar</button></label> 
                </form>
            </div>

            <!--Recrutamento-->
            <div class="cont-recrutamento">
                <form action="">
                    <label id="inicio-form">RECRUTAMENTO</label><br>
                    <label >
                        <h4>DESCRIÇÃO</h4>
                        <textarea name="descrição" id="" cols="80" rows="10"></textarea><br>
                    </label>
                    <label id="file2">
                        <h4>IMAGEM</h4>
                        <input type="file" name="img" placeholder="imagem">
                    </label>
                    <label > 
                        <h4>LINK WHATSAPP</h4>
                        <input type="text" name="link" ><br>
                    </label>
                    <label class="label" >
                        <button type="submit">enviar</button>
                    </label> 

                </form>
            </div>





        </div>
    </div>
    

    <script src="js/painel.js"></script>
    
</body>
</html>