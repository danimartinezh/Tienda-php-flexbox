<div class="main">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <?php
          $sql = "SELECT * from tbl_product where category='".$categoria."'";
          $result = mysqli_query($conexion,$sql);
          while ($resultado=mysqli_fetch_assoc($result)) {
            echo '<article class="articulo col-xs-6 col-sm-4 col-md-3">';
            //$imagen = $RUTA.$resultado['image'];
            $imagen = "img/imgarticulos/".$resultado['image'];
            if(!is_file($imagen)){
              $imagen = "https://upload.wikimedia.org/wikipedia/en/2/26/Disctemp-x.png";
            }
              echo '<img src="'.$imagen.'" alt="'.$resultado['nom'].'">
              <h3>'.$resultado['nom'].'</h1>
              <button type="button" class="btn btn-outline-info">Añadir al carrito</button>
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
