<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/conexion.php';
include_once '../clases/articuloDAO.php';


$database=new Conexion();
$db=$database->getConnection();
$articulo= new ArticuloDAO($db);


$data = json_decode(file_get_contents("php://input"));
$articulo->id=$data->id;


if($articulo->deleteArticulo())
      echo "Articulo de ropa eliminado satisfactoriamente";
      else
      echo "Error, no se pudo eliminar. Intente denuevo mas tarde";




