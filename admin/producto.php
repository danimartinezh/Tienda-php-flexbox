<?php SESSION_START();
include 'comprobacion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/flexboxgrid.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Administracion</title>
</head>
<body>
  <?php
  include 'header.php';
  include '../datosbbdd.php';
  ?>
  <div class="main">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2">
          <nav class="navbar navbar-light bg-faded">
            <a class="navbar-brand" href="producto.php?opcion=lista"><i class="fa fa-th-list fa-fw" aria-hidden="true"></i>Lista de productos</a>
            <a class="navbar-brand" href="producto.php?opcion=add"><i class="fa fa-plus-square fa-fw" aria-hidden="true"></i>Añadir producto</a>
            <a class="navbar-brand" href="producto.php?opcion=del"><i class="fa fa-trash fa-fw" aria-hidden="true"></i>Eliminar producto</a>
          </nav>
        </div>
        <div class="col-md-10">
          <div class="cabecera">
            <h1>Producto</h1>
          </div>
          <div class="body">
            <div class="contenedor">

            <?php
            if(isset($_GET['opcion'])){
              if($_GET['opcion']=='lista'){
                $sql = "SELECT * from tbl_product";
                $result = mysqli_query($conexion,$sql);
                echo '
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Imagen</th>
                      <th>Precio</th>
                      <th>Coste</th>
                      <th>Categoria</th>
                      <th>Descuento</th>
                      <th>Stock</th>
                      <th>Descripcion</th>
                      <th>Marca</th>
                    </tr>
                  </thead>';
                while($resultado=mysqli_fetch_assoc($result)){
                  echo '<tbody>
                  <tr>
                  <th scope="row">'.$resultado['ID'].'</th>
                  <td>'.$resultado['nom'].'</td>
                  <td><a href="'.$RUTA.$resultado['image'].'" target="_blank">'.$resultado['image'].'</a></td>
                  <td>'.$resultado['precio'].'</td>
                  <td>'.$resultado['cost'].'</td>
                  <td>'.$resultado['category'].'</td>
                  <td>'.$resultado['dte'].'</td>
                  <td>'.$resultado['stock'].'</td>
                  <td>'.$resultado['description'].'</td>
                  <td>'.$resultado['marca'].'</td></tr></tbody>';
                }
                echo '</table>';

              }else if($_GET['opcion']=='add'){
                echo '
                  <form class="container" method="post" enctype="multipart/form-data" action="validar.php">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Imagen</label>
                        <input type="file" class="form-control" name="imagen" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label>Precio</label>
                        <input type="number" class="form-control" placeholder="100" name="precio" required>
                        <div class="invalid-feedback">
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Coste</label>
                        <input type="number" class="form-control" placeholder="Coste" name="coste" required>
                        <div class="invalid-feedback">
                          Please provide a valid state.
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label>Categoria</label>
                        <select class="form-control" name="categoria">';
                        $sql = "SELECT nom from tbl_categoria";
                        $result = mysqli_query($conexion,$sql);
                        while($resultado=mysqli_fetch_assoc($result)){
                          echo '<option value="'.$resultado['nom'].'">'.$resultado['nom'].'</option>';
                        }
                        echo '
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label>Descuento</label>
                        <input type="number" class="form-control" placeholder="Descuento" name="descuento" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Stock</label>
                        <input type="number" class="form-control" placeholder="Stock" name="stock" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label>Marca</label>
                        <select class="form-control" name="marca">';
                        $sql = "SELECT nom from tbl_marca";
                        $result = mysqli_query($conexion,$sql);
                        while($resultado=mysqli_fetch_assoc($result)){
                          echo '<option value="'.$resultado['nom'].'">'.$resultado['nom'].'</option>';
                        }
                        echo '
                        </select>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label>Descripcion</label>
                        <input type="text" class="form-control" placeholder="Descripcion" name="descripcion" required>
                      </div>
                    </div>
                    <button class="btn btn-primary" name="btn" value="producto" type="submit">Añadir producto</button>
                  </form>
                ';
                if(isset($_SESSION['existe'])){
                  if(!$_SESSION['existe']){
                    echo '<div class="input-group alert alert-danger middle-sm" role="alert">
                      <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><strong> Esta producto ya existe</strong></span>
                    </div>';
                  }
                }
              }else if($_GET['opcion']=='del'){
                echo '
                <form class="form-inline" method="post" action="validar.php">
                  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                    <select class="custom-select" name="eliminarPro">';
                    $sql = "SELECT nom from tbl_product";
                    $result = mysqli_query($conexion,$sql);
                    while($resultado=mysqli_fetch_assoc($result)){
                      echo '<option value="'.$resultado['nom'].'">'.$resultado['nom'].'</option>';
                    }
                    echo '
                    </select>
                  </div>
                    <button type="submit" name="btn" value="eliminarProducto" class="btn btn-primary">Eliminar producto</button>
                </form>
                ';
              }
            }
            ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<?php SESSION_DESTROY();?>
