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
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <nav class="navbar navbar-light bg-faded">
            <a class="navbar-brand" href="categoria.php?opcion=lista"><i class="fa fa-th-list fa-fw" aria-hidden="true"></i>Lista de categorias</a>
            <a class="navbar-brand" href="categoria.php?opcion=add"><i class="fa fa-plus-square fa-fw" aria-hidden="true"></i>Añadir categoria</a>
          </nav>
        </div>
        <div class="col-md-9">
          <div class="cabecera">
            <h1>Categorias</h1>
          </div>
          <div class="body">
            <div class="contenedor">

            <?php
            if(isset($_GET['opcion'])){
              if($_GET['opcion']=='lista'){
                $num = 1;
                $sql = "SELECT * from tbl_categoria";
                $result = mysqli_query($conexion,$sql);
                echo '
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                    </tr>
                  </thead>';
                while($resultado=mysqli_fetch_assoc($result)){
                  echo '<tbody>
                  <tr>
                  <th scope="row">'.$num.'</th>
                  <td>'.$resultado['nom'].'</td>
                  <td>'.$resultado['description'].'</td></tr></tbody>';
                  $num++;
                }
                echo '</table>';

              }else if($_GET['opcion']=='add'){
                echo '
                <form class="form-inline">
                  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <i class="input-group-addon fa fa-font" aria-hidden="true"></i>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Nombre">
                  </div>
                  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <i class="input-group-addon fa fa-comment" aria-hidden="true"></i>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Descripción">
                  </div>

                  <button type="submit" class="btn btn-primary">Añadir categoria</button>
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
