<?php
require_once 'app/model/category.model.php';

require_once 'app/model/products.model.php';
require_once 'app/view/category.view.php';

class categoryController{

    private $model;
    private $modelCategory;
    private $view;
    
    public function __construct(){
        $this->model = new productsModel();
        $this->modelCategory = new categoryModel();
        $this->view = new categoryView();
    }
    public function category($categoryId){
        $products = $this->model->getProducts();
        $this->view->showCategoryId($products, $categoryId);
    }

    function showDatesCategories(){
        $categories = $this->modelCategory->categories();
        $this->view->showDates($categories);
        
    }

    function editCategory($id){
        $categories = $this->modelCategory->categories();

        $this->view->showDates($categories, $id);
    }
    
}