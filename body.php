<div class="main">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <?php
          $LIMITE_PRODUCTOS=8;
          $pagina=0;
          if(isset($_GET['pag'])){
              $pagina=$_GET['pag']*8;
          }
          $sql = "SELECT * from tbl_product LIMIT $pagina,$LIMITE_PRODUCTOS";
          $result = mysqli_query($conexion,$sql);
          while ($resultado=mysqli_fetch_assoc($result)) {
            echo '<article class="articulo col-xs-6 col-sm-4 col-md-3"><form action="validarcarrito.php" method="post">';
            //$imagen = $RUTA.$resultado['image'];
            $imagen = "img/imgarticulos/".$resultado['image'];
            if(!is_file($imagen)){
              $imagen = "https://upload.wikimedia.org/wikipedia/en/2/26/Disctemp-x.png";
            }
              echo '<img src="'.$imagen.'" alt="'.$resultado['nom'].'">
              <pre><h3>'.$resultado['nom'].'</h3><input type="hidden" name="precio" value="'.$resultado['precio'].'">Precio: '.$resultado['precio'].'</input></pre>

              <button type="submit" name="carrito" value="'.$resultado['ID'].'" class="btn btn-outline-info">Añadir al carrito</button>
            </form></article>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row middle-xs between-xs">
          <nav  class="col-xs-12 col-sm-4 center-xs start-sm">
            <ul class="pagination">
              <?php
              $sql = "SELECT count(*) from tbl_product";
              $result = mysqli_query($conexion,$sql);
              $resultado=mysqli_fetch_row($result);
              $numtotal=$resultado[0];
              $num=$numtotal/$LIMITE_PRODUCTOS;
              $num=round($num, 0, PHP_ROUND_HALF_UP);
              //echo $num.'|'.$pagina;
              if(isset($_GET['pag'])){
                for ($i=0; $i < $num; $i++) {
                  if($_GET['pag']==$i){
                    echo '<li class="page-item active"><a class="page-link" href="index.php?pag='.$i.'">'.($i+1).'</a></li>';
                  }else{
                    echo '<li class="page-item"><a class="page-link" href="index.php?pag='.$i.'">'.($i+1).'</a></li>';
                  }
                }
              }else{
                for ($i=0; $i < $num; $i++) {
                  if($i==0){
                    echo '<li class="page-item active"><a class="page-link" href="index.php?pag='.$i.'">'.($i+1).'</a></li>';
                  }else{
                    echo '<li class="page-item"><a class="page-link" href="index.php?pag='.$i.'">'.($i+1).'</a></li>';
                  }
                }
              }
              ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
