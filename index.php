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
                <a class="mnu" href="index.php"><li><img src="https://img.icons8.com/android/20/ffffff/home.png"/>&nbsp; HOME</li></a>
                <a class="mnu" href="contato.php"><li><img src="https://img.icons8.com/ios-filled/20/ffffff/phone.png"/>&nbsp; CONTATO</li></a>
                <a class="mnu" href="login.php"><li><img src="https://img.icons8.com/material-sharp/20/ffffff/enter-2.png"/>&nbsp; LOGIN</li></a>
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
                <div class="slider--item" style="background-image: url(img/ffcamp.png);" ></div>
                <div class="slider--item" style="background-image: url(img/imagem2.png);" ></div>
                <div class="slider--item" style="background-image: url(img/controle.png);" ></div>
            </div>
    </div>
    <div class="cont-oque">
          <img class="img-text" src="img/imagem2.png" height="300px" width="300px" alt="">
          <div class="texto-desc">
          <h2 id="h2-camp1" >O que é o FFCAMP ?</h2>
          <p id="paragrafo" >É um site grátes para divulgação de campeonatos de FREEFIRE , aqui você apenas realiza um cadastro e publicas seus campeonatos, não perdendo tempo em divulgar em varias plataformas.</p>
          <p>Com esses pensamento , em ter apenas um lugar para publicar seus torneios , que a FFCAMP foi criada, ja pensou em apenas um lugar você tem os melhores campeonatos!</p>
          </div>
    </div>
    <div class="cont-oque2">
          <div class="texto-desc2">
          <h2 id="h2-camp">Objetivo do FFCAMP ?</h2>
          <p class="paragrafo" >Nosso objetivo é crecer ainda mais a comunidade do FREEFIRE e ajudar aqueles jogadores que pretendem realizar um campeonato e ter a duvida de por onde começar?</p>
          <p class="paragrafo">Aqui você encontrar todos os tipos de campeonatos (SOLO, DUO, SQUARD ).Faça parte, apenas CADASTRE-SE e aproveite a plataforma !</p>
          </div>
          <img class="img-text2" src="img/imagem3.png" height="300px" width="300px" alt="">
    </div>
    <div>
          

    </div>

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