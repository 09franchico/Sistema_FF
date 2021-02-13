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
    <title>pagina descrição</title>
    <link class="icon" rel="icon" href="img/imagem1.png" type="image/x-icon" />
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
            <a class="mnu" href="index.php"><li><img src="https://img.icons8.com/android/20/ffffff/home.png"/>&nbsp; HOME</li></a>
                <a class="mnu" href="contato.php"><li><img src="https://img.icons8.com/ios-filled/20/ffffff/phone.png"/>&nbsp; CONTATO</li></a>
                <a class="mnu" href="login.php"><li><img src="https://img.icons8.com/material-sharp/20/ffffff/enter-2.png"/>&nbsp; LOGIN</li></a>
            </ul>
        </div>
    </div>

    <!--principal-->
    <div class="princiapl-descricao">

        <?php 
            foreach ($dados as $value) {
           
        ?>
        
        <div class="desc-img">
            <img src="./imagens/<?php echo $value["imagem"]; ?>" height="500px" width="900px" alt="">
        </div>
        <div class="desc-desc">
            <h3 class="justificar"><?php echo strtoupper($value["titulo"]) ;  ?></h3>
            <h3 class="cor-h3"><img class="img-t" src="https://img.icons8.com/plasticine/30/000000/trophy.png"/> <?php echo $value["premiacao"];  ?></h3>
            <h3 class="cor-h3"><img class="img-t" src="https://img.icons8.com/plasticine/30/000000/leave.png"/> <?php $data = $value["data"];
              $data_tamp = strtotime($data);
              $data_form = date("d/m/Y",$data_tamp);
              echo $data_form;
             ?>
             </h3>
            <h3 class="cor-h3"><img class="img-t" src="https://img.icons8.com/doodle/30/000000/money.png"/> <?php echo $value["valor"];  ?></h3>
            <h3 >DESCRIÇÃO:</h3>
            <p class="titulo-desc" ><?php echo nl2br($value["descricao"]) ; ?></p>
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