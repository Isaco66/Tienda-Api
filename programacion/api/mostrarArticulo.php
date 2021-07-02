<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/conexion.php';
include_once '../clases/articuloDAO.php';


$database = new Conexion();
$db = $database->getConnection();
$articulo = new ArticuloDAO($db);

$articulo->id = isset($_GET['id']) ? $_GET['id'] : die();

$articulo->mostrarArticulo();

if ($articulo->nombre != null) {
    $articulo_Arr = array(
        "id" =>  $articulo->id,
        "nombre" => $articulo->nombre,
        "marca" => $articulo->marca,
        "precio_compra" => $articulo->precio_compra,
        "precio_venta" => $articulo->precio_venta,
        "talla" => $articulo->talla,
        "existencias" => $articulo->existencias,
        "fecha_ingreso" => $articulo->fecha_ingreso,
        "proveedor" => $articulo->proveedor,
        "numero_proveedor" => $articulo->numero_proveedor,
        "create_at" => $articulo->create_at,
        "delete_at" => $articulo->delete_at

    );

    http_response_code(200);
    echo json_encode($articulo_Arr);
} else {
    http_response_code(404);
    echo json_encode("Articulo no encontrado.");
}
