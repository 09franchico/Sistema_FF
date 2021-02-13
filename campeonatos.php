
<?php

require("classes/classe_produtos.php");
$dadosProduto = new produtos("sistema_ff","localhost:3307","root","");


  if(isset($_GET["tipo"])){


    $tipo =$_GET["tipo"];
    //$dadosCamp = $dadosProduto ->buscarCamp($tipo);

    //pega o valor que vem pelo id da pagina
    $pagina = (isset($_REQUEST['pag'])) ? $_REQUEST['pag'] : 1;

    //$tipo = $_GET["tipo"]; 
    // contar quantos campeonatos temos no banco de dados referente ae tipo
    $limite = 6;
    $total_linha = $dadosProduto ->buscarCamp($tipo);
    $total_camp = ceil(count($total_linha)/$limite);

    //buscou os dados referente ao tipo e a quantidade que irão aparecer na paginação
    $resultado = $dadosProduto ->paginacao($pagina,$tipo);

}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>pagina campeonato</title>
    <link class="icon" rel="icon" href="img/imagem1.png" type="image/x-icon" />
</head>
<body>
      <!--menu-->
      <div class="conteiner1">
        <div class="img-logo">
         <img class="icon-logo" src="" alt="">
        </div>
        <div class="menu">
            <img id="img-menu" src="img/menu.png" height="40px" width="40px" alt="">
            <ul>
            <a class="mnu" href="index.php"><li><img src="https://img.icons8.com/android/20/ffffff/home.png"/>&nbsp; HOME</li></a>
                <a class="mnu" href="contato.php"><li><img src="https://img.icons8.com/ios-filled/20/ffffff/phone.png"/>&nbsp; CONTATO</li></a>
                <a class="mnu" href="login.php"><li><img src="https://img.icons8.com/material-sharp/20/ffffff/enter-2.png"/>&nbsp; LOGIN</li></a>
            </ul>
        </div>
    </div>

    <!--banner-->
    <div class="banner-camp">
        <img src="img/imagem1.png" height="400px" width="100%" alt="">
    </div>
     




    <!--lista campeonatos-->
    <div class="camp-principal">
        <div class="titulo-camp">
             <h2>CAMPEONATOS</h2>
             <P>ATENÇÃO ! INSCRIÇÃO É DE TOTAL RESPONSABILIDADE DO DIVULGADOR DO CAMPEONATO.</P>
        </div>
        <div class="divulga-camp">
    
         <?php 

            if(!empty($resultado)){
            
        // for para colocar od dados no formuario.
            for ($i=0; $i <count($resultado) ; $i++) { 

            ?><div class="item-camp">
                <img id="imgF" src="./imagens/<?php echo $resultado[$i]["imagem"];?>" height="200px" width="360px" alt="">
                <h3 class="justificar" ><?php echo strtoupper( $resultado[$i]["titulo"]) ?></h3>
                <p>DESCRIÇÃO </p>
                <p class="texto" ><?php echo $resultado[$i]["descricao"]; ?> </p>
                <hr id="linha">
                <h3 class="h3-m"><img class="img-t" src="https://img.icons8.com/plasticine/30/000000/trophy.png"/> <?php echo $resultado[$i]["premiacao"]; ?></h3>
                <h3 class="h3-m"><img class="img-t" src="https://img.icons8.com/plasticine/30/000000/leave.png"/> <?php $data = $resultado[$i]["data"]; 
                $data_tamp = strtotime($data);
                $data_form = date("d/m/Y",$data_tamp);
                echo $data_form;
                ?>
               </h3>
                <h3 class="h3-m"><img class="img-t" src="https://img.icons8.com/doodle/30/000000/money.png"/> <?php echo $resultado[$i]["valor"]; ?></h3>
                <a href="descricao.php?id=<?php echo $resultado[$i]["id_camp"]; ?>"><button>SAIBA MAIS</button></a>
                
            </div> 
            <?php
             
            }
        }else{

            ?><h1 class='sem'>SEM CAMPEONATOS NO MOMENTO ! <img class="img-triste" src="https://img.icons8.com/metro/70/000000/sad.png"/></h1>
             <?php
             //header("location:index.php");
          }
             ?>  


        </div>
        <div class="paginacao">

           <?php
              // condição para pagina voltar e proximo
                if($pagina>1){
                    echo ' <a class="btn-pag" href="campeonatos.php?pag='.($pagina - 1).'&tipo='.$resultado[0]["tipo"].'">voltar</a> ';
                }
                if($pagina < $total_camp ){
                    echo ' <a  class="btn-pag" href="campeonatos.php?pag='.($pagina + 1).'&tipo='.$resultado[0]["tipo"].'">proximo</a>';
                }

           ?>
            
        </div>
        

    </div>

    <!--fotter-->
    <div class="rodape">
         <div class="pe">
             <ul>
                 <a class="rodape-esp"  href=""><li><img src="https://img.icons8.com/carbon-copy/70/4a90e2/facebook.png"/></li></a>
                 <a class="rodape-esp" href=""><li><img src="https://img.icons8.com/carbon-copy/70/4a90e2/instagram-new.png"/></li></a>
                 <a class="rodape-esp" href=""><li><img src="https://img.icons8.com/carbon-copy/70/4a90e2/youtube-squared.png"/></li></a>
             </ul>
             <p class="p-rodape">© All rights reserved Design: FFCAMP - Site ©  </p>
         </div>
     </div>


   <script src="js/script.js"></script>
    
</body>
</html>