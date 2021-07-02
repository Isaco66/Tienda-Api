<?php

class Conexion
{
    private $host = "localhost";
    private $db = "tienda";
    private $user = "root";
    private $password = "";

    public $conn;


    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ";" . "dbname=" . $this->db, $this->user, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $ex) {
            echo "Error al conectarse :" . $ex->getMessage();
        }
        return $this->conn;
    }
}
