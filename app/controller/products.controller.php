<?php

require_once 'app/model/products.model.php';
require_once 'app/view/products.view.php';

class productsController {

    private $model;
    private $view;
    
    public function __construct(){
        $this->model = new productsModel();
        $this->view = new productsView();
    }

    public function mostrarProducts(){
        $products = $this->model->getProducts();
        $this->view->showProducts($products);
    }
}
