<?php
SESSION_START();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/flexboxgrid.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!--<link href="https://fonts.googleapis.com/css?family=Lobster|PT+Sans" rel="stylesheet">-->
  <title>Peces Componentes</title>
</head>
<body id="login">
  <div class="container">
    <div class="contenedor-aut">
      <div class="row">
        <form class="formularioregistro" method="post" action="validar.php">
          <div class="form-header">
            <img src="img/logo.png" alt="">
            <h3 class="item"><a href="login.php">Quiero logearme</a></h3>
          </div>
          <div class="form-body form-registro">
            <div class="columna">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="text" name="nombre" placeholder="Nombre">
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="text" name="username" placeholder="Usuario">
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="text" name="poblacion" placeholder="Población">
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="text" name="correo" placeholder="Correo Electronico">
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="text" name="correo2" placeholder="Confirmar Correo Electronico">
              </div>
            </div>
            <div class="columna">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="text" name="apellidos" placeholder="Apellidos">
              </div>
              <div class="input-group desplegable">
                <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                <select class="custom-select col-md-10" name="genero">
                  <option value="" disabled selected>Genero</option>
                  <option value="0">Hombre</option>
                  <option value="1">Mujer</option>
                  <option value="2">Otros</option>
                </select>
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="text" name="ciudad" placeholder="Ciudad">
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="password" name="password" placeholder="Contraseña">
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                <input class="form-control" type="date" name="fechanacimiento">
              </div>
            </div>
          </div>
          <div class="form-body fecherror">
            <!--<div class="input-group fechanacimiento">
              <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
              <input class="form-control" type="date" name="fechanacimiento">
            </div>-->
            <?php
            if(isset($_SESSION['existe'])){
              if($_SESSION['existe']==1){
                echo '<div class="input-group alert alert-danger middle-sm error" role="alert">
                  <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><strong> El usuario ya existe</strong></span>
                </div>';
              }
            }
            if(isset($_SESSION['correo'])){
              if($_SESSION['correo']==1){
                echo '<div class="input-group alert alert-danger middle-sm error" role="alert">
                  <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><strong> El correo no coincide</strong></span>
                </div>';
              }
            }
             ?>
          </div>
          <div class="form-footer">
            <button class="boton" type="submit" value="registro" name="btn">Registrarme</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<?php SESSION_DESTROY();?>
