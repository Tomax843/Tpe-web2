<?php

class productsModel{
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=e-comerce;charset=utf8','root','');
    }
//ver el select si esta bien, como en las filminas
    public function getProducts(){
        $query = $this->db->prepare('SELECT p.*, cp.nombre_categoria FROM productos AS p INNER JOIN categoria_producto AS cp ON p.categoria = cp.id_categoria;');
        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }
}

