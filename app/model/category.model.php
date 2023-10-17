
<?php

class categoryModel{
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=e-comerce;charset=utf8','root','');
    }

    function getCategoryById($id){
        $query = $this->db->prepare('SELECT * FROM categoria_producto WHERE id_categoria = ?');
        $query->execute([$id]);

        $categories = $query->fetchAll(PDO::FETCH_OBJ);
        return $categories;
    }

    function categories(){
        $query = $this->db->prepare('SELECT * FROM `categoria_producto`');
        $query->execute();

        $categories = $query->fetchAll  (PDO::FETCH_OBJ);
        return $categories;
    }


}