<?php

if(!$_SESSION["nome"]){
   header('location: login.php');
   exit();
}

?>