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

    
    $imagem = $_FILES["img"]["name"].rand(1,999).'.png';

        // mover a foto para a pasta img
    move_uploaded_file($_FILES["img"]["tmp_name"],"imagens/".$imagem);

    if(!empty($titulo) && !empty($premiacao) && !empty($tipo)&& !empty($descricao) && !empty($data) && !empty($valor) && !empty($link) && !empty($imagem)){
         $dadosSalvos=$dadosCadastro->cadastroCamp($tipo,$titulo,$premiacao,$descricao,$data,$valor,$imagem,$link,$id);
         if($dadosSalvos){
            echo"<script>alert('Dados Publicados com sucesso !')</script>";
        }else{
            echo"<script>alert('Erro ao cadastrar')</script>";
        }

    }else{

        echo"<script>alert('Preenchas todos os Campos')</script>";
    }


}

?>

<?php

//cadastrar os recrutamento
if(isset($_POST["descricaoRecruta"])){

    $descricao = $_POST["descricaoRecruta"];
    $link = $_POST["link"];
    $id = $_SESSION["email"];

    //pega a imagem e envia para a pasta IMAGENS
    $imagem = $_FILES["imagem"]["name"].rand(1,999).'.png';
    move_uploaded_file($_FILES["imagem"]["tmp_name"],"imagens/".$imagem);

    // verifica se os campos nao estao vazio
    if(!empty($descricao) && !empty($link) && !empty($imagem)){
        $dadosRecrutamento = $dadosCadastro->recrutamento($descricao,$imagem,$link,$id);
        if($dadosRecrutamento){

            echo"<script>alert('Dados Publicados com sucesso !')</script>";
        }else{
            echo"<script>alert('Erro ao cadastrar')</script>";
        }


    }else{
        echo"<script>alert('Preenchas todos os Campos')</script>";

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
    <a href="https://icons8.com/icon/80319/casa"></a>
    <title>Painel admin</title>
</head>
<body>
    <div class="inicio-painel">
        <div class="painel-img">
          <h2>BEM VINDO</h2>
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
            <!--Mostrar dado do camp no painel-->
            <div class="camp-publicados">
              <?php 

              for ($i=0; $i <count($dadosCampeonatoPainel) ; $i++) { 
                 ?>
                 <div class="publicados-item">
                    <h2><?php echo $dadosCampeonatoPainel[$i]["titulo"]  ?></h2>
                     <img src="imagens/<?php echo $dadosCampeonatoPainel[$i]["imagem"]  ?>" width="380px" height="200px" alt=""><br><br>
                     <a href="painel.php?id=<?php echo $dadosCampeonatoPainel[$i]["id_camp"] ?>"> <button class="btn-camp-painel">EXCLUIR</button></a> 
                    
                 </div>
                <?php
                }

                ?>

                
            </div>
            <div class="form-painel" >
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
                    
                    <label class="label" ><button type="submit">enviar</button></label> 
                </form>
            </div>

            <!--Recrutamento-->
            <div class="cont-recrutamento">
                <form action="painel.php" method="POST" enctype="multipart/form-data">
                    <label id="inicio-form">RECRUTAMENTO</label><br>
                    <label >
                        <textarea name="descricaoRecruta" id="" cols="80" rows="10" placeholder="DESCRICAO RECRUTAMENTO"></textarea><br>
                    </label><br><br>
                    <label id="file2">
                        <input class="file" type="file" name="imagem" placeholder="imagem">
                    </label><br><br>
                    <label > 
                        <input  type="text" name="link" placeholder="LINK WHATS" ><br>
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