<?php
if ( !isset($_FILES["fileToUpload"])  ||!isset($_POST["nombre"]) || !isset($_POST["descripcion"]) || !isset($_POST["precio"])) {
  throw new Exception("Faltan datos");
}
include "../shared/functions.php";
$portadaURL = "/assets/portadaproductos/".$_FILES["fileToUpload"]["name"];
guardarProducto($portadaURL,$_POST["nombre"],$_POST["descripcion"] ,$_POST["precio"]);
$tmp_name = $_FILES["fileToUpload"]["tmp_name"];
move_uploaded_file($tmp_name, $_SERVER["DOCUMENT_ROOT"].$portadaURL);
header("Location: index.php");