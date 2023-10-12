<?php

class btnCategories{
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=e-comerce;charset=utf8','root','');
    }
    function categories(){
        $query = $this->db->prepare('SELECT * FROM `categoria_producto`');
        $query->execute();

        $categories = $query->fetchAll  (PDO::FETCH_OBJ);
        return $categories;
    }


}
