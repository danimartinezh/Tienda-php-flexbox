<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/flexboxgrid.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Peces Componentes</title>
  <!-- http://flexboxgrid.com/ --><!-- https://lenguajecss.com/p/css/propiedades/flexbox -->
  <!-- http://htmlcolorcodes.com/es/tabla-de-colores/ -->
  <!-- http://fontawesome.io/icons/ -->
  <!-- https://icomoon.io/app/#/select -->
  <!-- https://daneden.github.io/animate.css/ --> <!-- animated infinite nombre -->
</head>
<body>
  <?php
  if(isset($_COOKIE["login"])){
  if($_COOKIE["login"]==1){
    include 'datosbbdd.php';
    include 'header.php';
    if(isset($_GET['categoria'])){
      $categoria=$_GET['categoria'];
      include 'categoria.php';
    }else{
      if(isset($_GET['carrito'])){
        include 'carrito.php';
      }else{
        include 'body.php';
      }
    }
  }
}else{
  header('Location: login.php');
}
  ?>
</body>
</html>
