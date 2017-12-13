<?php
include 'datosbbdd.php';
if(isset($_REQUEST['carrito']) && isset($_REQUEST['precio'])){
  $sql = "SELECT count(*) FROM tbl_carrito WHERE propietari='".$_COOKIE['nombre']."' and idProduct='".$_REQUEST['carrito']."'";
  $result = mysqli_query($conexion,$sql);
  $resultado=mysqli_fetch_row($result);
  $existe=$resultado[0];

  $sql = "SELECT qtt FROM tbl_carrito WHERE propietari='".$_COOKIE['nombre']."' and idProduct='".$_REQUEST['carrito']."'";
  $result = mysqli_query($conexion,$sql);
  $resultado=mysqli_fetch_row($result);
  $cantidad=$resultado[0];

  //echo 'Existe:'.$existe.'|Cantiad:'.$cantidad;


  if($existe==0){
    $sql = "INSERT INTO tbl_carrito (propietari,idProduct,qtt,price) VALUES ('".$_COOKIE['nombre']."','".$_REQUEST['carrito']."',1,'".$_REQUEST['precio']."')";
    $result = mysqli_query($conexion,$sql);
  }elseif($existe==1){
    $sql = "UPDATE tbl_carrito SET qtt='".($cantidad+1)."' WHERE propietari='".$_COOKIE['nombre']."' and idProduct='".$_REQUEST['carrito']."'";
    $result = mysqli_query($conexion,$sql);
  }

  mysqli_close($conexion);
  header('Location: index.php?carrito');
}
 ?>
