<?php
include_once "../shared/functions.php";
if (!isset($_POST["id_producto"])) {
    throw new Exception("No hay id_producto");
}
quitarProductoDelCarrito($_POST["id_producto"]);
header("Location: index.php");