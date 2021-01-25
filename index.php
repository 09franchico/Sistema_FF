<?php
require("classes/classe_produtos.php");
$dadosclasse = new produtos("sistema_ff","localhost:3307","root","");

$dadosRecrutamento = $dadosclasse->pegarRecrutamento();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Pagina home</title>
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
                <a href="index.php"><li><img src="img/home.png" height="20px" width="20px" alt="">&nbsp; HOME</li></a>
                <a href="contato.php"><li><img src="img/email.png" height="20px" width="20px" alt="">&nbsp; CONTATO</li></a>
                <a href="login.php"><li><img src="img/login.png" height="20px" width="20px" alt="">&nbsp; LOGIN</li></a>
            </ul>
        </div>
    </div>

    <!--Banner-->
    <div class="conteiner2">
        <div class="slider--controle">
            <img class="slider-control" onclick="voltar()" src="img/voltar.png" height="100px" width="100px" alt="">
            <img class="slider-control" onclick="proximo()" src="img/proximo.png"  height="100px" width="100px" alt="">
           
        </div>
            <div class="slider--width">
                <div class="slider--item" style="background-image: url(img/novobanner2.png);" ></div>
                <div class="slider--item" style="background-image: url(img/bannernovo.png);" ></div>
                <div class="slider--item" style="background-image: url(img/novobanner2.png);" ></div>
            </div>
    </div>



     <!--video de apresentação-->

    <!--CAMPEONATOS-->
    <div class="conteiner4">
        <div class="camp-solo">
            <img class="img-camp" src="img/solo.jpg" height="200px" width="500px" alt="">
            <h4>CAMPEONATO SOLO</h4>
            <P>AQUI VAI TER UMA DESCRIÇÃO SOBRE O CAMPEONATO SOLO, OS MELHOR</P>
            <hr>
            <a href="campeonatos.php?tipo=solo"><button>ACESSAR</button></a>

        </div>
        <div class="camp-duo">
            <img class="img-camp" src="img/duo.jpg" height="200px" width="500px" alt="">
            <h4>CAMPEONATO DUO</h4>
            <P>AQUI VAI TER UMA DESCRIÇÃO SOBRE O CAMPEONATO SOLO, OS MELHORES</P>
            <hr>
            <a href="campeonatos.php?tipo=duo"><button>ACESSAR</button></a>

        </div>
        <div class="camp-squard">
            <img class="img-camp" src="img/squard.jpg" height="200px" width="500px" alt="">
            <h4>CAMPEONATO SQUARD</h4>
            <P>AQUI VAI TER UMA DESCRIÇÃO SOBRE O CAMPEONATO SOLO, OS MELHORES</P>
            <hr>
            <a href="campeonatos.php?tipo=squard"><button>ACESSAR</button></a>
 
        </div>
        <div class="x-treino">
            <img class="img-camp" src="img/treino.jpg" height="200px" width="500px" alt="">
            <h4>X TREINO</h4>
            <P>AQUI VAI TER UMA DESCRIÇÃO SOBRE O CAMPEONATO SOLO, OS MELHORES</P>
            <hr>
            <a href=""><button>ACESSAR</button></a>
        </div>

        
    </div>

    <!--video
    <video id="video" height="300" width="300" autoplay loop>
        <source src="img/video.mp4"  type="video/mp4">
    </video>
    -->


    <!--recrutando-->
     <div class="rec-inicio">
         <div class="rec-meio">
            <h1>GUILDAS RECRUTANDO</h1>
         </div>
     </div>

     <div class="conteiner5">
       <?php
         for ($i=0; $i <count($dadosRecrutamento) ; $i++) { 
       
        ?>
         <div class="img-divulga" onclick="abrir()" >
         <img  class="img-foto" src="./imagens/<?php echo $dadosRecrutamento[$i]["nome_imagem"];?>" height="200px" width="400px" alt="">
         </div>
         <div class="modal" >
               <img src="./imagens/<?php echo $dadosRecrutamento[$i]["nome_imagem"]; ?>" height="300px" width="500px" alt="">
               <h3 class="modal-des">DESCRIÇÃO</h3>
                    <p><?php echo $dadosRecrutamento[$i]["descricao"]; ?></p></h3><br><br>
               <a href="<?php echo $dadosRecrutamento[$i]["link"]; ?>"><button>CONTATO</button></a>
         </div>
         <?php

           }

         ?>

     
     <!--fotter-->
     <div class="rodape">
         <div>
             <ul>
                 <a  href=""><li><img src="img/facebook.png" height="50px" width="50px" alt=""></li></a>
                 <a href=""><li><img src="img/instagran.png" height="50px" width="50px" alt=""></li></a>
                 <a href=""><li><img src="img/youtube.png" height="50px" width="50px" alt=""></li></a>
             </ul>
         </div>
     </div>



    <script src="js/script.js"></script>
</body>
</html>