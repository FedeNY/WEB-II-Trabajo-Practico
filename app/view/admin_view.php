<?php 


class AdminView {





function showAdminView($product, $brand) {

   // Crea un array con la cantidad de productos por marca

    $arrBrand = [];

    foreach ($brand as $element) {
        $arrBrand[$element->brand] = 0; 
    }
    

    foreach ($brand as $element) {
        foreach ($product as $pos) {
  
            if ($pos->brand == $element->brand) {
   
                $arrBrand[$element->brand]++;
            }
        }
    }

require 'template/admin.phtml';

}


}