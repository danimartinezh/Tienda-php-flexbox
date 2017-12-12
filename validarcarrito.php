<?php
include 'datosbbdd.php';
if(isset($_REQUEST['carrito']) && isset($_REQUEST['precio'])){
  $sql = "INSERT INTO tbl_carrito (propietari,idProduct,qtt,price) VALUES ('".$_COOKIE['nombre']."','".$_REQUEST['carrito']."',1,'".$_REQUEST['precio']."')";
  $result = mysqli_query($conexion,$sql);
  mysqli_close($conexion);
  header('Location: index.php?carrito');
}
 ?>
