<?php
include "shared/frontlayout/header.php";
include "shared/functions.php";
$productos = obtenerProductos();
?>

<h1>Productos</h1>


<div class="row mt-2 g-4">


  <?php foreach ($productos as $producto) { ?>


    <div class="col-xl-3">
      <div class="card">
       <img src="<?php echo $producto->portadaURL ?>" class="card-img-top">
        <div class="card-body">
          <h4 class="card-title mb-4"><?php echo $producto->nombre ?></h4>
          <p class="card-text"><?php echo $producto->descripcion ?></p>
          <h3 class="mb-4 fw-light text-center">$<?php echo number_format($producto->precio, 2) ?></h3>
          <div class="text-center">
            <?php if (!productoYaEstaEnCarrito($producto->id)) { ?>

              <form action="agregar_al_carrito.php" method="post">
                <input type="hidden" name="id_producto" value="<?php echo $producto->id ?>">
                <button type="sumbit" class="btn btn-sm btn-secondary card-link">Agregar al carrito</button>
              </form>

            <?php } else { ?>

              <form action="eliminar_del_carrito.php" method="post">
                <input type="hidden" name="id_producto" value="<?php echo $producto->id ?>">
                <button type="sumbit" class="btn btn-sm btn-danger card-link">Quitar del carrito</button>
              </form>

            <?php } ?>
          </div>
        </div>
      </div>
    </div>

  <?php } ?>

</div>




<?php include "shared/frontlayout/footer.php" ?>