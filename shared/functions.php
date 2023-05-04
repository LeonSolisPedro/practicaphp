<?php

//CRUD productos

function obtenerProductos()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT id, nombre, descripcion, precio FROM productos");
    return $sentencia->fetchAll();
}

function guardarProducto($nombre, $descripcion ,$precio)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO productos(nombre, descripcion, precio) VALUES(?, ?, ?)");
    return $sentencia->execute([$nombre, $descripcion, $precio]);
}

function eliminarProducto($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM productos WHERE id = ?");
    return $sentencia->execute([$id]);
}

//Carrito


function obtenerProductosEnCarrito()
{
    $bd = obtenerConexion();
    getSession();
    $sentencia = $bd->prepare("SELECT productos.id, productos.nombre, productos.descripcion, productos.precio
     FROM productos
     INNER JOIN carrito_usuarios
     ON productos.id = carrito_usuarios.id_producto
     WHERE carrito_usuarios.id_sesion = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll();
}


function productoYaEstaEnCarrito($idProducto)
{
    $bd = obtenerConexion();
    getSession();
    $idSesion = session_id();
    $sentencia = $bd->prepare("SELECT * FROM carrito_usuarios WHERE id_sesion = ? AND id_producto = ?");
    $sentencia->execute([$idSesion, $idProducto]);
    if($sentencia->fetchColumn()) return true;
    return false;
}

function agregarProductoAlCarrito($idProducto)
{
    $bd = obtenerConexion();
    getSession();
    $idSesion = session_id();
    $sentencia = $bd->prepare("INSERT INTO carrito_usuarios(id_sesion, id_producto) VALUES (?, ?)");
    return $sentencia->execute([$idSesion, $idProducto]);
}

function quitarProductoDelCarrito($idProducto)
{
    $bd = obtenerConexion();
    getSession();
    $idSesion = session_id();
    $sentencia = $bd->prepare("DELETE FROM carrito_usuarios WHERE id_sesion = ? AND id_producto = ?");
    return $sentencia->execute([$idSesion, $idProducto]);
}


function getSession()
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

function obtenerConexion()
{
    $user = "root";
    $password = "";
    $dbName = "carrito";
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}
