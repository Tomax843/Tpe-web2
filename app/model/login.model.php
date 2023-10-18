<?php
require_once 'app/model/model.php';
class loginModel extends Model{
    
    public function getByuser($usuario) {
        $query = $this->db->prepare('SELECT * FROM usuario WHERE usuarios = ?');
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