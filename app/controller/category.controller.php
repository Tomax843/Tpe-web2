<?php

require_once 'app/model/products.model.php';
require_once 'app/view/category.view.php';

class categoryController{

    private $model;
    private $view;
    
    public function __construct(){
        $this->model = new productsModel();
        $this->view = new categoryView();
    }

    public function category($categoryId){
        $products = $this->model->getProducts();
        $this->view->showCategoryId($products, $categoryId);
    }
}