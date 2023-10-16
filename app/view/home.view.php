<?php
require_once 'app/controller/products.controller.php';
class homeView {
    
    function showHome($products, $categories){
        require_once 'templates/header.phtml';
        require_once 'templates/home.phtml';
        
        require_once 'templates/products.phtml';
        require_once 'templates/footer.phtml';
    }
}
