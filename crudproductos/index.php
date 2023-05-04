<?php
include "../shared/dashboardlayout/header.php";
include "../shared/functions.php";
$productos = obtenerProductos();
?>

<div class="card p-5">
  <div class="card-body">
    <div class="d-flex align-items-center justify-content-between">
      <h1 class="card-title">Productos</h1>
      <div>
        <a class="btn btn-primary" href="vista_agregar_producto.php">Agregar producto</a>
      </div>
    </div>
    <div class="mt-4">
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
          <?php foreach ($productos as $producto) { ?>
            <tr>
              <td><?php echo $producto->nombre ?></td>
              <td><?php echo $producto->descripcion ?></td>
              <td>$<?php echo number_format($producto->precio, 2) ?></td>
              <td>
                <form action="eliminar_producto.php" method="post">
                  <input type="hidden" name="id_producto" value="<?php echo $producto->id ?>">
                  <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
              </td>
            <?php } ?>
            </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>

<?php include "../shared/dashboardlayout/footer.php" ?>