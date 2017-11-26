<?php
$conexion = mysqli_connect("localhost", "root", "1234","shop","3306");
if (!$conexion) {
  exit('No se puede conectar'.mysql_error());
}
?>
