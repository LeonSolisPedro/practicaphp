<?php
include_once "shared/functions.php";
if (!isset($_POST["id_producto"])) {
    exit("No hay id_producto");
}
agregarProductoAlCarrito($_POST["id_producto"]);
header("Location: index.php");