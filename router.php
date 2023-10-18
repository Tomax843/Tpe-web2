<?php
require_once './app/controller/home.controller.php';
require_once './app/controller/products.controller.php';
require_once './app/controller/datesProducts.controller.php';
require_once './app/controller/category.controller.php';
require_once './app/controller/login.controller.php';

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
        $productsController = new dateProductsController();
        $productsController->showDates();
        break;  
        
    case 'datosCategorias':
        $productsController = new categoryController();
        $productsController->showDatesCategories();
        break;  

    case 'detalle':
        $itemId = $params[1];

        $productsController = new productsController();
        $productsController->detailOfProduct($itemId);
        break;
        
    case 'categoria':
        $categoryId = $params[1];
        $categoryController = new categoryController();
        $categoryController->category($categoryId);
        break;
    case 'agregar':
        $productsController = new DateProductsController();
        $productsController->addProduct();
        break;

    case 'eliminar':
        $productId = $params[1];
        
        $productsController = new dateProductsController();
        $productsController->deleteProducts($productId);
        break;

    case 'update-producto':
        $productId = $params[1];

        $controller = new dateProductsController();
        $controller->updateProduct($productId);
        break;

    case 'modificar-producto':
        $productId = $params[1];

        $controller = new dateProductsController();
        $controller->editProduct($productId);
        break;

        
    case 'modificar-categoria':
        $productId = $params[1];
        $controller = new categoryController();
        $controller->editCategory($productId);
        break;

    case 'login':
        $controller = new loginController();
        $controller->showLogin(); 
        break;
    case 'auth':
        $controller = new loginController();
        $controller->login();
        break;

    case 'logout':
        $controller = new loginController();
        $controller->logout();
        break;
    default: 
        // show404(); 
        break;
}
?>