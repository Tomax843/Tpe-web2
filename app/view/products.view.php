<?php

class productsView {

    function showProductDetail($product){
        require_once 'templates/detailProduct.phtml';
    }

    function showAddProduct($products){
        require_once 'templates/formAddProduct.phtml';
    }
    
    function showFormModify($productId){
        require_once 'templates/formModifyProduct.phtml';
    }
    
    function showDates($products, $id_modificar = null){
        require_once 'templates/dateTableProducts.phtml';
    }
    

}
