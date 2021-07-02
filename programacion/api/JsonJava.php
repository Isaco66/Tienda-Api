<?php
class Metodos
{
    public function callWebService()
    {
        return json_decode(file_get_contents('http://localhost:8080/TiendaRopa/articulos/jsonArticulos.htm'), true);;
    }
}

$new = new Metodos();

$resul = $new->callWebService();
$art = "";
foreach ($resul['articulos'] as $articulo) {
    $art .= '<p><b>Datos del articulo</b> ' .'<br>'. $articulo["id"].'<br>'.$articulo["nombre"].'<br>'.$articulo["marca"].'<br>'.$articulo["precio_compra"].'<br>'.$articulo["precio_venta"].'<br>'.$articulo["talla"].'<br>'.$articulo["existencias"].'<br>'.$articulo["fecha_ingreso"].'<br>'.$articulo["proveedor"].'<br>'.$articulo["numero_proveedor"].'</p>';
}
print_r($art);
