<?php
SESSION_START();
include 'datosbbdd.php';

$nombre = $_REQUEST['nombre'];
$tipoUsuario = 1;
$apellidos = $_REQUEST['apellidos'];
$correo = $_REQUEST['correo'];
$usuario = $_REQUEST['username'];
$passwd = $_REQUEST['password'];
$ciudad = $_REQUEST['ciudad'];
$poblacion = $_REQUEST['poblacion'];
$fechanacimiento = $_REQUEST['fechanacimiento'];
$genero = $_REQUEST['genero'];
//Pido los emails
$sql = "SELECT mail from tbl_usuaris";
$result = mysqli_query($conexion,$sql);
$existeEmail = 0;

//Compruebo si el correo existe
while($resultado=mysqli_fetch_assoc($result)){
  if($resultado['mail']==$correo){
    $existeEmail=1;
    $_SESSION['existe']=1;
  }
}
//Si el correo no existe inserto los datos
if(!$existeEmail){
  $sql = "INSERT INTO tbl_usuaris (nom,tipus,cognom,mail,username,passwd,pobl,country,birthdate,fecharegistro,genre) VALUES ('$nombre',$tipoUsuario,'$apellidos','$correo','$usuario','$passwd','$ciudad','$poblacion','$fechanacimiento',date(now()),$genero)";
  $result = mysqli_query($conexion,$sql);
  $_SESSION['existe']=0;
}

/*
foreach ($_SERVER as $key => $valor)
 echo "SERVER[$key] = $valor<br>";
*/
mysqli_close($conexion);
header('Location: index.php');
?>
