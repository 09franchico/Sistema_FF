<?php
session_start();
require("verificaLogin.php");

?>

<?php

// cadstrar os campeonatos no banco de dados
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

     // verificar se os campos estão vazio
    if(!empty($titulo) && !empty($premiacao) && !empty($tipo)&& !empty($descricao) && !empty($data) && !empty($valor) && !empty($link) ){
          //verificar se o formato da foto é PNG ou JPG
         if($_FILES["img"]["type"] == "image/png" || $_FILES["img"]["type"] == "image/jpeg" ){

            $imagem = $_FILES["img"]["name"].rand(1,999).'.png';
            
           // mover a foto para a pasta img
           move_uploaded_file($_FILES["img"]["tmp_name"],"imagens/".$imagem);

           // salva os dados
           $dadosSalvos=$dadosCadastro->cadastroCamp($tipo,$titulo,$premiacao,$descricao,$data,$valor,$imagem,$link,$id);
           if($dadosSalvos){
            echo"<script>alert('CAMPEONATO CADASTRADOS NO SITE')</script>";
               
           }

         }else{

            echo"<script>alert('FORMATO DE IMAGEM NÃO COMPATIVEL')</script>";
             
         }

    }else{

        echo"<script>alert('POR FAVOR ! PREENCHA TODOS OS CAMPOS')</script>";
    }


}

?>

<?php  

// Mostra campeonatos no PAINEL
$id = $_SESSION["email"];
$dadosCampeonatoPainel = $dadosCadastro->pegarDadosCamp($id);

//EXVLUIR CAMPEONATO
if(isset($_GET["id"])){

   $id = $_GET["id"];
  $dadosCadastro->deletar($id); 
  header("location:painel.php");



  }


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estiloPainel.css">
    <title>painel</title>
    <link class="icon" rel="icon" href="img/imagem1.png" type="image/x-icon" />
</head>
<body>
    <div class="cont">
        <div class="mn">

            <div class="bem-vindo">
                <h3>BEM VINDO(a)</h3>
                <h3><?php echo $_SESSION["nome"]  ?></h3>
            </div>

            <div class="dt">
                <h3>Deartboard</h3>
            </div>
            <ul>
                <li><a class="link" href=""><img class="img-icon" src="https://img.icons8.com/ios-filled/50/ffffff/home.png"/>Pagina Inicial</a></li>
                <li><a id="cadastro" class="link" href=""><img class="img-icon" src="https://img.icons8.com/ios-filled/50/ffffff/form.png"/>Cadastro Camp</a></li>
                <li><a class="link" href=""><img class="img-icon" src="https://img.icons8.com/ios-filled/50/ffffff/phone-contact.png"/>Contatos</a></li>  
            </ul>
        </div>
        <div class="painel-principal">
            <div class="cima">
                <a href=""><img class="ic" src="https://img.icons8.com/bubbles/50/000000/user-male.png"/></a>
                <a href="logout.php"><img class="ic" src="https://img.icons8.com/carbon-copy/100/000000/exit.png"/></a>
            </div>
            <div class="painel-segun">
               <!--Campeonatos publicacados-->
               <div id="camp-sumir">
                    <?php 
                        for ($i=0; $i <count($dadosCampeonatoPainel) ; $i++) { 
                    ?>
                            <div class="camp-publicado">
                                <img src="imagens/<?php echo $dadosCampeonatoPainel[$i]["imagem"]  ?>" height="200px" width="400px" alt="">
                                <h4>TIPO : <?php echo $dadosCampeonatoPainel[$i]["tipo"] ?></h4>
                                <h4>CAMPEONATO : <?php echo $dadosCampeonatoPainel[$i]["titulo"] ?></h4>
                                <a  href="painel.php?id=<?php echo $dadosCampeonatoPainel[$i]["id_camp"] ?>"><button class="btn-excluir">Excluir</button></a> 
                            </div>
                        
                        <?php
                        }

                        ?>
                </div>

               <!--Formulario-->
                <div class="form-painel">
                        <form  action="painel.php" method="POST" enctype="multipart/form-data">
                            <label id="inicio-form">CADASTRO DE CAMPEONATOS</label><br>
                            <input type="text" name="titulo" placeholder="TITULO CAMPEONATO" >
                            <input type="text" name="premiacao" placeholder="PREMIAÇÃO" ><br><br>
                            <select name="tipo">
                                <option value="solo">SOLO</option>
                                <option value="duo">DUO</option> 
                                <option value="squard">SQUARD</option>
                            </select><br><br>
                            <textarea name="descricao" id="" cols="100" rows="10" placeholder="DESCRIÇÃO DO CAMPEONATO"></textarea><br><br>
                            <input type="date" name="data"  >
                            <input type="text" name="valor" placeholder="VALOR DO CAMPEONATO"><br><br>
                            <input class="arquivo" type="file" name="img" placeholder="imagem"><br>
                            <input type="text" name="link" placeholder="LINK PRA CONTATO WHATSAPP" ><br>
                            
                            <label class="label" ><button class="btn-salvar" type="submit">enviar</button></label> 
                        </form>
                </div>
            </div>
        </div>

    </div>
    <script src="js/painel.js"></script>
</body>
</html>