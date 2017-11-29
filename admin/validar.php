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
}else if($_REQUEST['btn']=='eliminarCat'){
  $categoria = $_REQUEST['eliminarCat'];
  $sql = "DELETE FROM tbl_categoria where nom='".$categoria."'";
  $result = mysqli_query($conexion,$sql);
  mysqli_close($conexion);
  header('Location: categoria.php?opcion=lista');
}else if($_REQUEST['btn']=='producto'){
  $nombreProducto = $_REQUEST['nombre'];
  $precio = $_REQUEST['precio'];
  $coste = $_REQUEST['coste'];
  $categoria = $_REQUEST['categoria'];
  $descuento = $_REQUEST['descuento'];
  $stock = $_REQUEST['stock'];
  $marca = $_REQUEST['marca'];
  $descripcion = $_REQUEST['descripcion'];
  //Ruta donde se guardarán las imágenes
  //$directorio = $_SERVER['DOCUMENT_ROOT'].'/tienda/img/imgarticulos/';
  // Recibo los datos de la imagen
  $nameserver = $_FILES['imagen']['name'];//Nombre de la imagen
  $trozos = explode(".",$nameserver);//Me devuelve array separado por el delimitador que le he puesto
  $extension = end($trozos);//Cojo el ultimo array
  $nombre=time().'.'.$extension;//Para no repetir nombres añado fecha+extension Ex: 623178136.jpg
  // Compruebo si el arhivo existe
  $fichero = $rutaIMG.$nombre;//Indico la ruta del fichero
  if(is_file($fichero)){//Compruebo si el fichero existe
    //Es casi imposible que entre aqui, pero si entra le cambiamos el nombre hasta que no exista
    while(is_file($fichero)){
      $nombre='imagen'.(time()+1).'.'.$extension;
    }
  }else{
    // Si no existe la imagen la muvo desde su ubicación temporal al directorio definitivo y la inserto en la base de datos
    move_uploaded_file($_FILES['imagen']['tmp_name'],$rutaIMG.$nombre);
    $sql = "SELECT max(ID) from tbl_product";
    $result = mysqli_query($conexion,$sql);
    while($resultado=mysqli_fetch_assoc($result)){
      $ID=$resultado['max(ID)'];
    }
    $ID++;
    $sql = "INSERT INTO tbl_product (ID,nom,image,precio,cost,category,dte,stock,description,marca) VALUES ($ID,'$nombreProducto','$nombre',$precio,$coste,'$categoria',$descuento,$stock,'$descripcion','$marca')";
    $result = mysqli_query($conexion,$sql);
    mysqli_close($conexion);
  }
}





?>
