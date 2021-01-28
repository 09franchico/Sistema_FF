<?php
require("classes/classe_produtos.php");
$dadoscamp = new produtos("sistema_ff","localhost:3307","root","");

if(isset($_GET["id"])){

    $id = addslashes($_GET["id"]);

    $dados = $dadoscamp->dadosCampeonato($id);
    


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
    <div class="conteiner1-2">
        <div class="img-logo">
         <img class="icon-logo" src="" alt="">
        </div>
        <div >
            <img id="img-menu" src="img/menu.png" height="40px" width="40px" alt="">
            <ul>
                <a class="mnu" href="index.php"><li><img src="img/home.png" height="20px" width="20px" alt="">&nbsp; HOME</li></a>
                <a class="mnu" href="contato.php"><li><img src="img/email.png" height="20px" width="20px" alt="">&nbsp; CONTATO</li></a>
                <a class="mnu" href="login.php"><li><img src="img/login.png" height="20px" width="20px" alt="">&nbsp; LOGIN</li></a>
            </ul>
        </div>
    </div>

    <!--principal-->
    <div class="princiapl-descricao">

        <?php 
            foreach ($dados as $value) {
           
        ?>
        
        <div class="desc-img">
            <img src="./imagens/<?php echo $value["imagem"]; ?>" height="500px" width="620px" alt="">
        </div>
        <div class="desc-desc">
          
            <h3 class="justificar"><?php echo $value["titulo"];  ?></h3>
            <h3>PREMIAÇÃO:<?php echo $value["premiacao"];  ?></h3>
            <h3>DATA:<?php echo $value["data"];  ?></h3>
            <h3>VALOR:<?php echo $value["valor"];  ?></h3>
            <h3 >DESCRIÇÃO:</h3>
            <p class="titulo-desc" ><?php echo $value["descricao"];  ?></p>
            <div class="desc-button">
                <a href="<?php echo $value["link"];  ?>"><button>INSCREVA-SE</button></a>
            </div>
            <?php
            }  

             ?>
            

        </div>
        
        
    </div>


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