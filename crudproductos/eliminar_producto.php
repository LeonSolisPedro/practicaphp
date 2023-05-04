<?php
if (!isset($_POST["id_producto"])) {
  throw new Exception("No hay datos");
}
include "../shared/functions.php";
eliminarProducto($_POST["id_producto"]);
header("Location: index.php");