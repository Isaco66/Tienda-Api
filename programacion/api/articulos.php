<?php

header("Content-Type: application/json");
include("../clases/clase_php_articulo.php");

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        $articulo = new Articulo(
            $_POST["id"],
            $_POST["nombre"],
            $_POST["marca"],
            $_POST["precio_compra"],
            $_POST["precio_venta"],
            $_POST["talla"],
            $_POST["existencias"],
            $_POST["fecha_ingreso"],
            $_POST["proveedor"],
            $_POST["numero_proveedor"]
        );
        $articulo->guardarArchivo();
        $resultado['mensaje'] = "Guardar:".json_encode($_POST);
        echo json_encode($resultado);
        break;        
    case 'GET':
        if (isset($_GET['id'])) {
            Articulo::obtenerArticulo($_GET['id']);
        } else {
            Articulo::obtenerArticulos();
        }
        break;
    case 'PUT':
        $_PUT = json_decode(file_get_contents('php://input'), true);
        $articulo = new Articulo(
            $_PUT["id"],
            $_PUT["nombre"],
            $_PUT["marca"],
            $_PUT["precio_compra"],
            $_PUT["precio_venta"],
            $_PUT["talla"],
            $_PUT["existencias"],
            $_PUT["fecha_ingreso"],
            $_PUT["proveedor"],
            $_PUT["numero_proveedor"]
        );

        $articulo->modificar($_GET['id']);
        echo "Modificado satisfactoriamente";
        
        break;
    case 'DELETE':
        Articulo::eliminar($_GET['id']);
        echo 'Eliminado correctamente';
        break;
}
