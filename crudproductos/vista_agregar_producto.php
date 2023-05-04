<?php include "../shared/dashboardlayout/header.php"; ?>


<div class="card p-5">
  <div class="card-body">
    <div class="d-flex align-items-center justify-content-between">
      <h1 class="card-title">Agregar Producto</h1>
      <div>
        <a class="btn btn-secondary" href="index.php">Regresar</a>
        <button class="btn btn-primary" type="submit" form="form">Agregar</a>
      </div>
    </div>
    <div class="mt-4">
      <form id="form" action="agregar_producto.php" method="post">
        <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input name="nombre" type="text" class="form-control" placeholder="Nombre" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Descripción</label>
          <textarea name="descripcion" class="form-control form-control-solid resize-none" rows="5" placeholder="Escriba una descripción" required></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Precio</label>
          <input name="precio" type="number" class="form-control" placeholder="100" required>
        </div>
      </form>
    </div>
  </div>

</div>

<?php include "../shared/dashboardlayout/footer.php" ?>