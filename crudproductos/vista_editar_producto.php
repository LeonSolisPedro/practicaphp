<?php
include "../shared/dashboardlayout/header.php";
include "../shared/functions.php";
$id = $_GET["id"];
$producto = obtenerProducto($id);
?>


<div class="card p-5">
  <div class="card-body">
    <div class="d-flex align-items-center justify-content-between">
      <h1 class="card-title">Editar Producto</h1>
      <div>
        <a class="btn btn-secondary" href="index.php">Regresar</a>
        <button class="btn btn-primary" type="submit" form="form">Editar</a>
      </div>
    </div>
    <div class="mt-4">
      <form id="form" action="editar_producto.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $producto->id ?>">
        <div class="mb-3">
          <img width="300" src="<?php echo $producto->portadaURL  ?>">
        </div>
        <div class="mb-3">
          <label class="mb-2">Imagen de portada</label>
          <input type="file" name="fileToUpload" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input name="nombre" type="text" class="form-control" placeholder="Nombre" value="<?php echo $producto->nombre ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Descripción</label>
          <textarea name="descripcion" class="form-control form-control-solid resize-none" rows="5" placeholder="Escriba una descripción" required><?php echo $producto->descripcion ?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Precio</label>
          <input name="precio" type="number" class="form-control" placeholder="100" value="<?php echo $producto->precio ?>" required>
        </div>
      </form>
    </div>
  </div>

</div>

<?php include "../shared/dashboardlayout/footer.php" ?>