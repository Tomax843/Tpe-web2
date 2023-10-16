<?php
require_once './app/controller/home.controller.php';
require_once './app/controller/products.controller.php';
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
    case 'datosProductos':
        $productsController = new productsController();
        $productsController->showDates();
        break;  

    case 'detalle':
        $itemId = $params[1];

        $productsController = new productsController();
        $productsController->detailOfProduct($itemId);
        break;
        
    case 'categoria':
        $categoryId = $params[1];
        //categorias
        $categoryController = new categoryController();
        $categoryController->category($categoryId);
        break;
    case 'agregar':
        $productsController = new productsController();
        $productsController->addProduct();
        break;

    case 'eliminar':
        $productId = $params[1];
        
        $productsController = new productsController();
        $productsController->deleteProducts($productId);
        break;

    case 'update-producto':
        $productId = $params[1];

        $controller = new productsController();
        $controller->updateProduct($productId);
        break;

    case 'modificar-producto':
        $productId = $params[1];

        $controller = new productsController();
        $controller->editProduct($productId);
        break;
    

    default: 
        // show404(); 
        break;
}
?>