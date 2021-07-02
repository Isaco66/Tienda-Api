<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/conexion.php';
include_once '../clases/articuloDAO.php';


$database=new Conexion();
$db=$database->getConnection();
$articulo= new ArticuloDAO($db);


$stmt = $articulo->mostrarArticulos();
$itemCount = $stmt->rowCount();


    echo json_encode($itemCount);

    if($itemCount > 0){
        
        $arrayArticulo = array();
        $arrayArticulo["body"] = array();
        $arrayArticulo["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "nombre" => $nombre,
                "marca" => $marca,
                "precio_compra" => $precio_compra,
                "precio_venta" => $precio_venta,
                "talla" => $talla,
                "existencias" => $existencias,
                "fecha_ingreso" => $fecha_ingreso,
                "proveedor" => $proveedor,
                "numero_proveedor" => $numero_proveedor,
                "update_at"=>$create_at,
                "delete_at"=>$delete_at  
                
            );

            array_push($arrayArticulo["body"], $e);
        }
        echo json_encode($arrayArticulo);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No se pudo obtener la informacion.")
        );
    }




