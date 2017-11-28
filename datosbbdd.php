<?php
/*
$host="damdb.cu331fsyh9u2.us-west-2.rds.amazonaws.com";
$port=33006;
$user="dam2017_0001";
$password="BBNiAzNn";
$dbname="dam2017_0001";
*/

$host="localhost";
$port=3306;
$user="root";
$password="1234";
$dbname="shop";

$conexion = mysqli_connect($host, $user, $password,$dbname,$port);
if (!$conexion) {
  exit('No se puede conectar'.mysql_error());
}
?>
