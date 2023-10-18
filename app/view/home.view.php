<?php
require_once 'app/controller/products.controller.php';
class homeView {
    
    function showHome($products, $categories){

        require_once 'templates/home.phtml';
        
    }
}
