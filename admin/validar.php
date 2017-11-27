<?php
SESSION_START();
include '../datosbbdd.php';

if($_REQUEST['btn']=='categoria'){
  $nombre = $_REQUEST['nombre'];
  $descripcion = $_REQUEST['descripcion'];
  $existe=0;
  $sql = "SELECT nom from tbl_categoria";
  $result = mysqli_query($conexion,$sql);
  $_SESSION['existe']=1;

  while($resultado=mysqli_fetch_assoc($result)){
    if($resultado['nom']==$nombre){
      $existe=1;
    }
  }
  if(!$existe){
    $sql = "INSERT INTO tbl_categoria (nom,description) VALUES ('$nombre', '$descripcion')";
    $result = mysqli_query($conexion,$sql);
    mysqli_close($conexion);
    header('Location: categoria.php?opcion=lista');
  }else if($existe){
    mysqli_close($conexion);
    $_SESSION['existe']=0;
    header('Location: categoria.php?opcion=add');
  }
}else if($_REQUEST['btn']=='categoria'){

}





?>
