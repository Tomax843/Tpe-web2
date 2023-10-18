<?php
require_once 'app/model/model.php';
class dateProductsModel extends Model {
    
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


}