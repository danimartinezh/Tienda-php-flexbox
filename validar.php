<?php
SESSION_START();
include 'datosbbdd.php';


if($_REQUEST['btn']=="registro"){
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
  $sql = "SELECT username from tbl_usuaris";
  $result = mysqli_query($conexion,$sql);
  $existe = 0;

  //Compruebo si el correo existe
  while($resultado=mysqli_fetch_assoc($result)){
    if($resultado['username']==$usuario){
      $existe=1;
      $_SESSION['existe']=1;
    }
  }
  //Si el correo no existe inserto los datos
  if(!$existe){
    $sql = "INSERT INTO tbl_usuaris (nom,tipus,cognom,mail,username,passwd,pobl,country,birthdate,fecharegistro,genre) VALUES ('$nombre',$tipoUsuario,'$apellidos','$correo','$usuario','$passwd','$ciudad','$poblacion','$fechanacimiento',date(now()),$genero)";
    $result = mysqli_query($conexion,$sql);
    $_SESSION['existe']=0;
    mysqli_close($conexion);
    header('Location: index.php');
  }else{
    mysqli_close($conexion);
    header('Location: registro.php');
  }

}else if($_REQUEST['btn']=="login"){
  $usuario = $_REQUEST['username'];
  $passwd = $_REQUEST['password'];
  $_SESSION['existe']=0;
  //Pido los usuarios y contraseñas
  $sql = "SELECT username,passwd from tbl_usuaris";
  $result = mysqli_query($conexion,$sql);
  //Compruebo si el correo existe
  while($resultado=mysqli_fetch_assoc($result)){
    if($resultado['username']==$usuario && $resultado['passwd']==$passwd){
      $_SESSION['existe']=1;
    }
  }
  if($_SESSION['existe']){
    mysqli_close($conexion);
    header('Location: index.php');
  }else if(!$_SESSION['existe']){
    mysqli_close($conexion);
    header('Location: login.php');
  }
}

/*
foreach ($_SERVER as $key => $valor)
 echo "SERVER[$key] = $valor<br>";

mysqli_close($conexion);
*/
?>
