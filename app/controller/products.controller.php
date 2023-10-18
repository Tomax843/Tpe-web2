<?php

require_once 'app/model/products.model.php';
require_once 'app/model/category.model.php';
require_once 'app/view/products.view.php';

class productsController {

    private $model;
    private $categoryModel;
    private $view;
    
    public function __construct(){
        $this->model = new productsModel();
        $this->categoryModel = new categoryModel();
        $this->view = new productsView();
    }

    
    public function detailOfProduct($itemId){
        $productById = $this->model->getProductById($itemId);
        $categoryById = $this->categoryModel->getCategoryByIdMostrar($productById->categoria);
        $this->view->showProductDetail($productById,$categoryById);
    }

    public function addProduct(){
        $products = $this->model->getProducts();
        $this->view->showAddProduct($products);
        // VER SI TENGO QUE PONER isset() Para que no me tire error en la pagina
        if((isset($name) && !empty($name)) && (isset($category) && !empty($category)) && (isset($description) && !empty($description))&& (isset($talla)&& !empty($price)) && (isset($price)&& !empty($talla))){
        $category = $_POST['category'];
        $description = $_POST['Descripcion'];
        $talla = $_POST['Talla'];
        $price = $_POST['Precio'];
        $name = $_POST['Nombre'];
        }else{
            $this->view->showError("Debe completar todos los campos");
        }
        //validaciones
        if (empty($description) || empty($talla) || empty($price) || empty($name) || empty($category)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }
        $id = $this->model->insertProduct($category, $description, $talla, $price, $name);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            // $this->view->showError("Error al insertar la tarea");
        }

    }
}