<div class="main">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <?php
          $sql = "SELECT * from tbl_product";
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
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
