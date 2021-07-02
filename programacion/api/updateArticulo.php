<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/conexion.php';
include_once '../clases/articuloDAO.php';


$database=new Conexion();
$db=$database->getConnection();
$articulo= new ArticuloDAO($db);


$data = json_decode(file_get_contents("php://input"));
$articulo->id=$data->id;
$articulo->nombre=$data->nombre;
$articulo->marca=$data->marca;
$articulo->precio_compra=$data->precio_compra;
$articulo->precio_venta=$data->precio_venta;
$articulo->talla=$data->talla;
$articulo->existencias=$data->existencias;
$articulo->fecha_ingreso=$data->fecha_ingreso;
$articulo->proveedor=$data->proveedor;
$articulo->numero_proveedor=$data->numero_proveedor;

if($articulo->updateArticulo())
      echo "Articulo de ropa actualizado satisfactoriamente";
      else
      echo "Error, no se pudo actualizar. Intente denuevo mas tarde";




