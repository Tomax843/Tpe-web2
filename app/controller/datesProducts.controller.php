<?php

require_once 'app/model/dateProducts.model.php';
require_once 'app/model/Products.model.php';
require_once 'app/model/login.model.php';
require_once 'app/view/dateProducts.view.php';

class dateProductsController {
    private $model;
    private $modelProducts;
    private $view;
    
    public function __construct(){
        $this->modelProducts = new ProductsModel();
        $this->model = new dateProductsModel();
        $this->view = new dateProductsView();
         loginHelper::verifyAdmin();
    }
    
public function addProduct(){
    
        $products = $this->modelProducts->getProducts();
        $this->view->showAddProduct($products);
        $category = $_POST['category'];
        $description = $_POST['Descripcion'];
        $talla = $_POST['Talla'];
        $price = $_POST['Precio'];
        $name = $_POST['Nombre'];
        
        if (empty($description) || empty($talla) || empty($price) || empty($name) || empty($category)) {
            // $this->view->showError("Debe completar todos los campos"); HACER EL SHOWERROR
            return;
        }
        $id = $this->model->insertProduct($category, $description, $talla, $price, $name);
        if ($id) {
            header('Location: ' . BASE_URL . 'datosProductos');
        } else {
            // $this->view->showError("Error al insertar la tarea");
        }

    }

    public function deleteProducts($productId){
        $this->model->deleteProduct($productId);
        header('Location: ' . BASE_URL . 'datosProductos');

    }    



    function showDates(){
        $products = $this->modelProducts->getProducts();
        $this->view->showDates($products);
        
    }
    
        function updateProduct($productId){
            if($_POST){
                $category = $_POST['category'];
                $description = $_POST['description'];
                $talla = $_POST['talla'];
                $price = $_POST['price'];
                $name = $_POST['name'];

                if ((isset($name) && !empty($name)) && (isset($category) && !empty($category)) && (isset($description) && !empty($description))&& (isset($talla)&& !empty($price)) && (isset($price)&& !empty($talla))) {
                    // $this->view->showError("Debe completar todos los campos");
                    $products = $this->modelProducts->getProducts();

                $this->model->updateProduct($category,$description,$talla,$price,$name,$productId);
                //$this->view->udapteProducts($modelMarca,$date,$id);
                header('Location: ' . BASE_URL . 'datosProductos');
            }
        }
    }

    function editProduct($id){
        $products = $this->modelProducts->getProducts();

        $this->view->showDates($products, $id);
    }
}