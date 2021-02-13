<?php
require("classes/classe_produtos.php");
$dadosProduto = new produtos("sistema_ff","localhost:3307","root","");



 if(isset($_GET["tipo"])){
    //pega o pag com valor 1
    $pagina = (isset($_REQUEST['pag'])) ? $_REQUEST['pag'] : 1;
    
    $limite = 2;
    $tipo = $_GET["tipo"]; 

    $total_linha = $dadosProduto ->buscarCamp($tipo);

    $total_camp = ceil(count($total_linha)/$limite);

    $resultado = $dadosProduto ->paginacao($pagina,$tipo);


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
      <?php
       foreach ($resultado as $value) {
      ?><h4>Titulo : <?php echo $value["titulo"];?></h4>
        <h4>Premiação : <?php echo $value["premiacao"];?></h4>
        <h4>data : <?php echo $value["data"];?></h4>
        <h4>Valor : <?php echo $value["valor"];?></h4>
        <hr>

      <?php
        }

      ?>
      <?php
      if($pagina>1){
          echo ' <a href="text.php?pag='.($pagina -1).'&&tipo=squard">Voltar</a>';
      }

      if($pagina < $total_camp ){
        echo ' <a href="text.php?pag='.($pagina + 1).'&&tipo=squard">proximo</a>';
      }

      ?>
    </div>
</body>
</html>