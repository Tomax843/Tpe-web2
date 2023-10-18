<?php

class dateProductsView {
function showAddProduct($products){
        require_once 'templates/formAddProduct.phtml';
    }
    
    
    function showDates($products, $id_modificar = null){
        require_once 'templates/dateTableProducts.phtml';
    }
}