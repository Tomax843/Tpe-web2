<?php
require_once './app/view/login.view.php';
require_once './app/model/login.model.php';
require_once './app/helpers/login.helper.php';

class loginController {
    private $view;
    private $model;

    function __construct() {
        $this->model = new loginModel();
        $this->view = new LoginView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    function login()
    {
        $userPost = $_POST['userId'];
        $passwordPost = $_POST['passwordId'];

        if (empty($userPost) || empty($passwordPost)) {
            // IMPORTANTE
            $this->view->showLogin('Faltan completar datos'); //hacer un html de error por si estan vacios los campos
            return;
        }

        // Hashear la contraseña
        $userAdmin = $this->model->getAdmin();
        if ($userPost == $userAdmin->usuarios && password_verify($passwordPost, $userAdmin->pass)) {
            loginHelper::login($userAdmin);
            header('Location: ' . BASE_URL . 'datosMarcas');
        } else {
            $this->view->showLogin('Usuario inválido');
        }
    }


    public function logout() {
        loginHelper::logout();
        header('Location: ' . HOME_URL);    
    }
}

//  verifico logueado 
//public function __construct() { 
    //loginHelper::verify();