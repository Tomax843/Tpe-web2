<?php

class productsView {

    function showProductDetail($productById, $categoryById) {
        require_once 'templates/detailProduct.phtml';
    }
    function showFormModify($productId){
        require_once 'templates/formModifyProduct.phtml';
    }

    function showAddProduct($products){
        require_once 'templates/formAddProduct.phtml';
    }
    
    
    function showDates($products, $id_modificar = null){
        require_once 'templates/dateTableProducts.phtml';
    }
    
    function showError($errors, $id_modificar = null){
        require_once 'templates/errores.phtml';
    }
    

}
