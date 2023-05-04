<?php
if (!isset($_POST["nombre"]) || !isset($_POST["descripcion"]) || !isset($_POST["precio"])) {
  throw new Exception("Faltan datos");
}
include "../shared/functions.php";
guardarProducto($_POST["nombre"],$_POST["descripcion"] ,$_POST["precio"]);
header("Location: index.php");