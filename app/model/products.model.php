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

    function getProductById($id){
        $query = $this->db->prepare('SELECT * FROM productos WHERE id_producto = ?');
        $query->execute([$id]);

        $product = $query->fetch(PDO::FETCH_OBJ);
        return $product;
    }

    function insertProduct($category, $description, $talla, $price, $name) {
        $query = $this->db->prepare('INSERT INTO `productos`(`categoria`, `descripcion`, `talla`, `precio`, `nombre`) VALUES(?,?,?,?,?)');
        $query->execute([$category, $description, $talla, $price, $name]);

        return $this->db->lastInsertId();
    }

    function deleteProduct($productId) {
        $query = $this->db->prepare('DELETE FROM productos WHERE id_producto = ?');
        $query->execute([$productId]);
    }

    function updateProduct($category,$description,$talla,$price,$name,$productId) {
        $query = $this->db->prepare('UPDATE productos SET categoria = ?, descripcion = ?, talla = ?, precio = ?, nombre = ? WHERE id_producto = ?');
        $query->execute([$category, $description, $talla, $price, $name, $productId]);
    }


    // public function updateProduct($category, $description, $talla, $price, $name, $productId) {
    //     $query = $this->getProductById($productId);
    //     $query = $this->db->prepare('UPDATE productos SET categoria=? ,descripcion=? ,talla=? ,precio=?, nombre=? WHERE ID_producto=?');
    //     $query->execute([$category, $description, $talla, $price, $name, $productId]);
    // }


}

