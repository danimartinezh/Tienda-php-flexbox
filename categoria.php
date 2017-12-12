<div class="main">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <?php
          $sql = "SELECT * from tbl_product where category='".$categoria."'";
          $result = mysqli_query($conexion,$sql);
          while ($resultado=mysqli_fetch_assoc($result)) {
            echo '<article class="articulo col-xs-6 col-sm-4 col-md-3">
              <img src="'.$RUTA.$resultado['image'].'" alt="'.$resultado['nom'].'">
              <h3>'.$resultado['nom'].'</h1>
            </article>';
          }
          ?>
          <!--<article class="articulo col-xs-6 col-sm-4 col-md-3">
            <img src="img/res/5.jpg" class="" alt="">
          </article>-->
        </div>
      </div>
    </div>
  </div>
</div>
