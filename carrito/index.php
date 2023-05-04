<?php
include "../shared/frontlayout/header.php";
include "../shared/functions.php";
$productos = obtenerProductosEnCarrito();
?>

<h1>Carrito</h1>

<div class="mt-4">


  <?php if (count($productos) == 0) { ?>

    <p>Sin productos </p>
    <p>Visita la tienda, para empezar a comprar</p>
    <a href="/" class="mt-1 btn btn-primary">Visitar tienda</a>

  <?php } else { ?>

    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $total = 0;
          foreach ($productos as $producto) {
            $total += $producto->precio;
          ?>
            <tr>
              <td><?php echo $producto->nombre ?></td>
              <td><?php echo $producto->descripcion ?></td>
              <td>$<?php echo number_format($producto->precio, 2) ?></td>
              <td>
                <form action="eliminar_del_carrito.php" method="post">
                  <input type="hidden" name="id_producto" value="<?php echo $producto->id ?>">
                  <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
              </td>
            <?php } ?>
            </tr>
        </tbody>
        <tfoot>
          <tr class="fs-5">
            <td class="border-bottom-0 text-end" colspan="2"><strong>Total</strong></td>
            <td class="border-bottom-0" colspan="2">
              $<?php echo number_format($total, 2) ?>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>


    <a href="proceder_pago.php" class="btn btn-primary">Proceder al Pago</a>


  <?php } ?>





</div>



<?php include "../shared/frontlayout/footer.php" ?>