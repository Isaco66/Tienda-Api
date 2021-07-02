<?php

class ArticuloDAO
{
    public $id;
    public $nombre;
    public $marca;
    public $precio_compra;
    public $precio_venta;
    public $talla;
    public $existencias;
    public $fecha_ingreso;
    public $proveedor;
    public $numero_proveedor;
    public $create_at;
    public $delete_at;

    private $conn;


    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function crearArticulo()
    {
        $sql = "INSERT INTO articulos  SET 
        nombre=:nombre, 
        marca=:marca, 
        precio_compra=:precio_compra, 
        precio_venta=:precio_venta, 
        talla=:talla, 
        existencias=:existencias,
        fecha_ingreso=:fecha_ingreso,
        proveedor=:proveedor, 
        numero_proveedor=:numero_proveedor";


        $statement = $this->conn->prepare($sql);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->marca = htmlspecialchars(strip_tags($this->marca));
        $this->precio_compra = htmlspecialchars(strip_tags($this->precio_compra));
        $this->precio_venta = htmlspecialchars(strip_tags($this->precio_venta));
        $this->talla = htmlspecialchars(strip_tags($this->talla));
        $this->existencias = htmlspecialchars(strip_tags($this->existencias));
        $this->fecha_ingreso = htmlspecialchars(strip_tags($this->fecha_ingreso));
        $this->proveedor = htmlspecialchars(strip_tags($this->proveedor));
        $this->numero_proveedor = htmlspecialchars(strip_tags($this->numero_proveedor));

        $statement->bindParam(":nombre", $this->nombre);
        $statement->bindParam(":marca", $this->marca);
        $statement->bindParam(":precio_compra", $this->precio_compra);
        $statement->bindParam(":precio_venta", $this->precio_venta);
        $statement->bindParam(":talla", $this->talla);
        $statement->bindParam(":existencias", $this->existencias);
        $statement->bindParam(":fecha_ingreso", $this->fecha_ingreso);
        $statement->bindParam(":proveedor", $this->proveedor);
        $statement->bindParam(":numero_proveedor", $this->numero_proveedor);


        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateArticulo()
    {
        $sql = "UPDATE articulos  SET 
        nombre=:nombre, 
        marca=:marca, 
        precio_compra=:precio_compra, 
        precio_venta=:precio_venta, 
        talla=:talla, 
        existencias=:existencias,
        fecha_ingreso=:fecha_ingreso,
        proveedor=:proveedor, 
        numero_proveedor=:numero_proveedor
        WHERE id=:id ";


        $statement = $this->conn->prepare($sql);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->marca = htmlspecialchars(strip_tags($this->marca));
        $this->precio_compra = htmlspecialchars(strip_tags($this->precio_compra));
        $this->precio_venta = htmlspecialchars(strip_tags($this->precio_venta));
        $this->talla = htmlspecialchars(strip_tags($this->talla));
        $this->existencias = htmlspecialchars(strip_tags($this->existencias));
        $this->fecha_ingreso = htmlspecialchars(strip_tags($this->fecha_ingreso));
        $this->proveedor = htmlspecialchars(strip_tags($this->proveedor));
        $this->numero_proveedor = htmlspecialchars(strip_tags($this->numero_proveedor));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $statement->bindParam(":nombre", $this->nombre);
        $statement->bindParam(":marca", $this->marca);
        $statement->bindParam(":precio_compra", $this->precio_compra);
        $statement->bindParam(":precio_venta", $this->precio_venta);
        $statement->bindParam(":talla", $this->talla);
        $statement->bindParam(":existencias", $this->existencias);
        $statement->bindParam(":fecha_ingreso", $this->fecha_ingreso);
        $statement->bindParam(":proveedor", $this->proveedor);
        $statement->bindParam(":numero_proveedor", $this->numero_proveedor);
        $statement->bindParam(":id", $this->id);


        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function deleteArticulo()
    {
        $sql = "DELETE FROM articulos WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->id);
        if ($stmt->execute())
            return true;
        else
            return false;
    }

    public function mostrarArticulos()
    {
        $sql = "SELECT * from articulos";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function mostrarArticulo()
    {
        $sqlQuery = "SELECT * FROM articulos  WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->nombre = $dataRow['nombre'];
        $this->marca = $dataRow['marca'];
        $this->precio_compra = $dataRow['precio_compra'];
        $this->precio_venta = $dataRow['precio_venta'];
        $this->talla = $dataRow['talla'];
        $this->existencias = $dataRow['existencias'];
        $this->fecha_ingreso = $dataRow['fecha_ingreso'];
        $this->proveedor = $dataRow['proveedor'];
        $this->numero_proveedor = $dataRow['numero_proveedor'];
        $this->create_at = $dataRow['create_at'];
        $this->delete_at = $dataRow['delete_at'];
    }
}
