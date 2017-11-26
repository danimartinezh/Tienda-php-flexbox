<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include 'head.php';?>
  <title>Peces Componentes</title>
</head>
<body id="login">
  <div class="container">
    <div class="contenedor-aut">
      <div class="row">
        <form class="formulario" method="post" action="validar.php">
          <div class="form-header">
            <img src="img/logo.png" alt="">
            <h3>Inicio de Sesión</h3>
          </div>
          <div class="form-body form-login">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
              <input class="form-control" type="text" placeholder="Usuario">
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
              <input class="form-control" type="password" placeholder="Contraseña">
            </div>
            <div class="input-group alert alert-danger middle-sm error" role="alert">
              <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><strong> El usuario o contraseña no existe</strong></span>
            </div>
          </div>
          <div class="form-footer">
            <button class="boton" type="submit" name="login">Iniciar sesión</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
