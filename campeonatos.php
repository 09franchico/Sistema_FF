
<?php

require("classes/classe_produtos.php");
$dadosProduto = new produtos("sistema_ff","localhost:3307","root","");


if(isset($_GET["tipo"])){

    $tipo =addslashes($_GET["tipo"]);
    $dadosCamp = $dadosProduto ->buscarCamp($tipo);

}






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>pagina campeonato</title>
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

            if(!empty($dadosCamp)){
            
        // for para colocar od dados no formuario.
            for ($i=0; $i <count($dadosCamp) ; $i++) { 

            ?><div class="item-camp">
                <img id="imgF" src="./imagens/<?php echo $dadosCamp[$i]["imagem"];?>" height="200px" width="360px" alt="">
                <h3 class="justificar" ><?php echo $dadosCamp[$i]["titulo"]; ?></h3>
                <p>DESCRIÇÃO </p>
                <p class="texto" ><?php echo $dadosCamp[$i]["descricao"]; ?> </p>
                <hr id="linha">
                <h3>PREMIAÇÃO : <?php echo $dadosCamp[$i]["premiacao"]; ?></h3>
                <p></p>
                <h3>DATA : <?php $data = $dadosCamp[$i]["data"]; 
                $data_tamp = strtotime($data);
                $data_form = date("d/m/Y",$data_tamp);
                echo $data_form;
                ?>
               </h3>
                <h3>VALOR : <?php echo $dadosCamp[$i]["valor"]; ?></h3>
                <a href="descricao.php?id=<?php echo $dadosCamp[$i]["id_camp"]; ?>"><button>SAIBA MAIS</button></a>
                
            </div> 
            <?php
             
            }
        }else{

            echo"SEM CAMPEONATOS NO MOMENTO !";
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