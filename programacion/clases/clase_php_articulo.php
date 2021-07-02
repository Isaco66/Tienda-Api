<?php

class Articulo
{

    private $id;
    private $nombre;
    private $marca;
    private $precio_compra;
    private $precio_venta;
    private $talla;
    private $existencias;
    private $fecha_ingreso;
    private $proveedor;
    private $numero_proveedor;
    private $create_at;
    private $delete_at;

    public function __construct($id, $nombre, $marca, $precio_compra, $precio_venta, $talla, $existencias, $fecha_ingreso, $proveedor, $numero_proveedor)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->marca = $marca;
        $this->precio_compra = $precio_compra;
        $this->precio_venta = $precio_venta;
        $this->talla = $talla;
        $this->existencias = $existencias;
        $this->fecha_ingreso = $fecha_ingreso;
        $this->proveedor = $proveedor;
        $this->numero_proveedor = $numero_proveedor;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getMarca()
    {
        return $this->marca;
    }
    public function getPrecio_compra()
    {
        return $this->precio_compra;
    }
    public function getPrecio_venta()
    {
        return $this->precio_venta;
    }
    public function getTalla()
    {
        return $this->talla;
    }
    public function getExistencias()
    {
        return $this->existencias;
    }
    public function getFecha_ingreso()
    {
        return $this->fecha_ingreso;
    }
    public function getProveedor()
    {
        return $this->proveedor;
    }
    public function getNumero_proveedor()
    {
        return $this->numero_proveedor;
    }
    public function getCreate_at()
    {
        return $this->create_at;
    }
    public function getDelete_at()
    {
        return $this->delete_at;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }
    public function setPrecio_compra($precio_compra)
    {
        $this->precio_compra = $precio_compra;
    }
    public function setPrecio_venta($precio_venta)
    {
        $this->precio_venta = $precio_venta;
    }
    public function setTalla($talla)
    {
        $this->talla = $talla;
    }
    public function setExistencias($existencias)
    {
        $this->existencias = $existencias;
    }
    public function setFecha_ingreso($fecha_ingreso)
    {
        $this->fecha_ingreso = $fecha_ingreso;
    }
    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;
    }
    public function setNumero_proveedor($numero_proveedor)
    {
        $this->numero_proveedor = $numero_proveedor;
    }
    public function setCreate_at($create_at)
    {
        $this->create_at = $create_at;
    }
    public function setDelete_at($delete_at)
    {
        $this->delete_at = $delete_at;
    }

    public function guardarArchivo()
    {
        $contenidoArchivo = file_get_contents("../data/articulos.json");
        $articulos = json_decode($contenidoArchivo, true);
        $articulos[] = array(
            "id" => $this->id,
            "nombre" => $this->nombre,
            "marca" => $this->marca,
            "precio_compra" => $this->precio_compra,
            "precio_venta" => $this->precio_venta,
            "talla" => $this->talla,
            "existencias" => $this->existencias,
            "fecha_ingreso" => $this->fecha_ingreso,
            "proveedor" => $this->proveedor,
            "numero_proveedor" => $this->numero_proveedor
        );
        $archivo = fopen("../data/articulos.json", "w");
        fwrite($archivo, json_encode($articulos));
        fclose($archivo);
    }
     
    public function modificar($indiceArreglo)
    {
        $contenidoArchivo = file_get_contents("../data/articulos.json");
        $articulos = json_decode($contenidoArchivo, true);
        $articulo[]=array(
            "id" => $this->id,
            "nombre" => $this->nombre,
            "marca" => $this->marca,
            "precio_compra" => $this->precio_compra,
            "precio_venta" => $this->precio_venta,
            "talla" => $this->talla,
            "existencias" => $this->existencias,
            "fecha_ingreso" => $this->fecha_ingreso,
            "proveedor" => $this->proveedor,
            "numero_proveedor" => $this->numero_proveedor
        );
        $articulos[$indiceArreglo]=$articulo;


        $archivo = fopen("../data/articulos.json", "w");
        fwrite($archivo, json_encode($articulos));
        fclose($archivo);
    }


    public static function eliminar($indiceArreglo)
    {
        $contenidoArchivo = file_get_contents("../data/articulos.json");
        $articulos = json_decode($contenidoArchivo, true);
        array_splice($articulos,$indiceArreglo,1);
        
        $archivo = fopen("../data/articulos.json", "w");
        fwrite($archivo, json_encode($articulos));
        fclose($archivo);
    }

    public static function obtenerArticulos()
    {
        $contenidoArchivo = file_get_contents("../data/articulos.json");
        echo $contenidoArchivo;
    }

    public static function obtenerArticulo($indiceArreglo)
    {
        $contenidoArchivo = file_get_contents("../data/articulos.json");
        $articulos = json_decode($contenidoArchivo, true);
        echo json_encode($articulos[$indiceArreglo]);
    }
}
