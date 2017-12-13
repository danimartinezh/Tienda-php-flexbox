<div class="main">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <?php
          $sql = "SELECT idProduct,qtt,price FROM tbl_carrito WHERE propietari='".$_COOKIE['nombre']."'";
          $result = mysqli_query($conexion,$sql);
          $suma=0;
          echo '
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
              </tr>
            </thead>';
          while($resultado=mysqli_fetch_assoc($result)){
            echo '<tbody>
            <tr>
            <th scope="row">'.$resultado['idProduct'].'</th>
            <td>'.$resultado['qtt'].'</td>
            <td>'.$resultado['price'].'</td>';
            $suma=$resultado['price']*$resultado['qtt'];
          }
          echo '<tbody><th scope="row"></th>
          <td></td>
          <td>'.$suma.'</td></tr></tbody>';
          echo '</table>';
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
