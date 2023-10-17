<?php

class categoryView {

    function showCategoryId($products, $categoryId){
        require_once 'templates/categories.phtml';
    }
    
    function showDates($products, $id_modificar = null){
        require_once 'templates/dateTableCategories.phtml';
    }
}
