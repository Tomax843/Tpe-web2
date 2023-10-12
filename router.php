<?php
require_once './app/controller/home.controller.php';
require_once './app/controller/products.controller.php';
require_once './app/controller/detailProduct.controller.php';
require_once './app/controller/category.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);


switch ($params[0]) {
    case 'home':
        $homeController = new homeController();
        $homeController->mostrarHome();
        break;
    case 'detalle':
        $itemId = $params[1];

        $detailProductController = new detailProductController();
        $detailProductController->detailOfProduct($itemId);
        break;
        
    case 'categoria':
        $categoryId = $params[1];
        //categorias
        $categoryController = new categoryController();
        $categoryController->category($categoryId);
        break;


    default: 
        // show404(); 
        break;
}
?>