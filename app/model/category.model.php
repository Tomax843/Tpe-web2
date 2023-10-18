
<?php
require_once 'app/model/model.php';
class categoryModel extends Model {


    function getCategoryById($id){
        $query = $this->db->prepare('SELECT * FROM categoria_producto WHERE id_categoria = ?');
        $query->execute([$id]);

        $categories = $query->fetchAll(PDO::FETCH_OBJ);
        return $categories;
    }

    function getCategoryByIdMostrar($id){
        $query = $this->db->prepare('SELECT * FROM categoria_producto WHERE id_categoria = ?');
        $query->execute([$id]);

        $categories = $query->fetch(PDO::FETCH_OBJ);
        return $categories;
    }


    function categories(){
        $query = $this->db->prepare('SELECT * FROM `categoria_producto`');
        $query->execute();

        $categories = $query->fetchAll  (PDO::FETCH_OBJ);
        return $categories;
    }


}