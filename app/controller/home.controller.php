<?php
require_once 'app/view/home.view.php';
require_once 'app/model/products.model.php';
require_once 'app/model/category.model.php';

class homeController {

    private $view;
    private $productModel;
    private $categoriesModel;
    
    public function __construct(){
        $this->view = new homeView();
        $this->productModel = new productsModel();
        $this->categoriesModel = new categoryModel();
        
    }

    public function mostrarHome(){
            //llamar al metodo session start
        $products = $this->productModel->getProducts();
        $categories = $this->categoriesModel->categories();
        $this->view->showHome($products, $categories);   

    }
}