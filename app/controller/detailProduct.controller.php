<?php

require_once 'app/model/detailProduct.model.php';
require_once 'app/view/detailProduct.view.php';

class detailProductController {

    private $model;
    private $view;
    
    public function __construct(){
        $this->model = new productIdModel();
        $this->view = new productIdView();
    }

    public function detailOfProduct($itemId){
        $product = $this->model->getProductById($itemId);
        $this->view->showProductDetail($product);
    }
}