<?php

class loginModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=e-comerce;charset=utf8','root','');
    }

    
    public function getByuser($usuario) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuarios = ?');
        $query->execute([$usuario]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getAdmin(){
        $userAdmin = 'webadmin';
        $query = $this->db->prepare('SELECT * FROM usuario WHERE usuarios  = ?');
        $query->execute([$userAdmin]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
    
}