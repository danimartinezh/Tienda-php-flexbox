<?php
/*COMPROBACIÓN PARA VER SI EL USUARIO ES ADMIN*/
if(isset($_COOKIE["login"]) && isset($_COOKIE['tipousuario'])){
  if($_COOKIE['tipousuario']!=0){
    header('Location: ../index.php');
  }
}else{
header('Location: ../login.php');
}
 ?>
