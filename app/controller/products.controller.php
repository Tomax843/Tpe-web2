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

    
    public function detailOfProduct($itemId){
        $product = $this->model->getProductById($itemId);
        $this->view->showProductDetail($product);
    }

    public function addProduct(){
        $products = $this->model->getProducts();
        $this->view->showAddProduct($products);
        // VER SI TENGO QUE PONER isset() Para que no me tire error en la pagina
        $category = $_POST['category'];
        $description = $_POST['Descripcion'];
        $talla = $_POST['Talla'];
        $price = $_POST['Precio'];
        $name = $_POST['Nombre'];
        
        //validaciones
        if (empty($description) || empty($talla) || empty($price) || empty($name) || empty($category)) {
            // $this->view->showError("Debe completar todos los campos"); HACER EL SHOWERROR
            return;
        }
        $id = $this->model->insertProduct($category, $description, $talla, $price, $name);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            // $this->view->showError("Error al insertar la tarea");
        }

    }

    public function deleteProducts($productId){
        $this->model->deleteProduct($productId);
        header('Location: ' . BASE_URL);

    }

    // public function modifyProduct($productId){
    //     $productById = $this->model->getProductById($productId);
    //     $this->view->showFormModify($productId);
    //     if ((!empty($_POST['productId'])) && (!empty($_POST['category'])) && (!empty($_POST['description'])) && (!empty($_POST['talla'])) && (!empty($_POST['price'])) && (!empty($_POST['name']))){
    //         $productId= $_POST['productId'];
    //         $category = $_POST['category'];
    //         $description = $_POST['description'];
    //         $talla = $_POST['talla'];
    //         $price = $_POST['price'];
    //         $name = $_POST['name'];

    //         $productId = $this->model->updateProduct($productId, $category, $description, $talla, $price, $name);
    //         header("Location: " . BASE_URL);
    //     }
    // }
    
    function showDates(){
        //creo que en vez de hacer 2 lineas llamo a la de agarrar products y se lo paso como param a showDates
        $products = $this->model->getProducts();//aca creo que tengo que llamar a product model
        $this->view->showDates($products);
        
    }
    
    //parte de moderador
        function updateProduct($productId){
            if($_POST){
                // FIJARME QUE ACA ME TIRA EL ERROR, NO ME TOMA LOS NAME DE LOS INPUT DEL FORM
                $category = $_POST['category'];
                $description = $_POST['description'];
                $talla = $_POST['talla'];
                $price = $_POST['price'];
                $name = $_POST['name'];

                if ((isset($name) && !empty($name)) && (isset($category) && !empty($category)) && (isset($description) && !empty($description))&& (isset($talla)&& !empty($price)) && (isset($price)&& !empty($talla))) {
                    // $this->view->showError("Debe completar todos los campos");
                    $products = $this->model->getProducts();

                $this->model->updateProduct($category,$description,$talla,$price,$name,$productId);
                //$this->view->udapteProducts($modelMarca,$date,$id);
                header('Location: ' . BASE_URL . 'datosProductos');
            } else {
                echo "error";//sacar esto
            }
        }

    }

    function editProduct($id){
        $products = $this->model->getProducts();

        $this->view->showDates($products, $id);
    }
}