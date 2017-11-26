<header>
  <div class="logo-menu">
    <div class="container">
      <div class="row middle-xs between-xs">
        <div class="logo col-xs-12 col-sm-4 center-xs start-sm">
          <img src="img/logo.png" alt="Peces Componentes">
        </div>
        <nav class="menu col-xs-12 col-sm-8 center-xs end-sm">
          <a href="#">Inicio</a>
          <a href="admin/">Admin</a>
          <a href="login.php">Iniciar Sesion</a>
          <a href="registro.php">Registrate</a>
        </nav>
      </div>
    </div>
  </div>
  <div class="sub-menu">
    <div class="container">
      <div class="row middle-xs between-xs">
        <nav class="categorias col-xs-12 center-xs">
          <?php
          $sql = "SELECT nom,description from tbl_categoria";
          $result = mysqli_query($conexion,$sql);
          while($resultado=mysqli_fetch_assoc($result)){
            echo '<a href="#" title="'.$resultado['description'].'">'.$resultado['nom'].'</a>';
          }?>
        </nav>
      </div>
    </div>
  </div>
</header>
