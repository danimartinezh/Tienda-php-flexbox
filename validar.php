<?php
SESSION_START();
include 'datosbbdd.php';


if($_REQUEST['btn']=="registro"){
  $nombre = $_REQUEST['nombre'];
  $tipoUsuario = 1;
  $apellidos = $_REQUEST['apellidos'];
  $correo = $_REQUEST['correo'];
  $correo2 = $_REQUEST['correo2'];
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
  if(!$existe && $correo==$correo2){
    $sql = "INSERT INTO tbl_usuaris (nom,tipus,cognom,mail,username,passwd,pobl,country,birthdate,fecharegistro,genre) VALUES ('$nombre',$tipoUsuario,'$apellidos','$correo','$usuario','$passwd','$ciudad','$poblacion','$fechanacimiento',date(now()),$genero)";
    $result = mysqli_query($conexion,$sql);
    $_SESSION['existe']=1;
    mysqli_close($conexion);
    header('Location: login.php');
  }else{
    if($correo!=$correo2){
      $_SESSION['correo']=1;
    }
    mysqli_close($conexion);
    header('Location: registro.php');
  }

}else if($_REQUEST['btn']=="login"){
  $usuario = $_REQUEST['username'];
  $passwd = $_REQUEST['password'];
  $_SESSION['existe']=0;
  //Pido los usuarios y contraseñas
  $sql = "SELECT username,passwd,tipus from tbl_usuaris";
  $result = mysqli_query($conexion,$sql);
  //Compruebo si el correo existe
  while($resultado=mysqli_fetch_assoc($result)){
    if($resultado['username']==$usuario && $resultado['passwd']==$passwd){
      $_SESSION['existe']=1;
      $tipo=$resultado['tipus'];
    }
  }
  if($_SESSION['existe']){
    mysqli_close($conexion);
    setcookie("login", 1, time()+3600, "/", "localhost", false, true);
    setcookie("nombre", $usuario, time()+3600, "/", "localhost", false, true);
    setcookie("tipousuario", $tipo, time()+3600, "/", "localhost", false, true);
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
