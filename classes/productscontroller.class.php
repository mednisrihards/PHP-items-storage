<?php

class ProductsController extends Products {

    //METHOD TO ADD PRODUCT    
        public function addProducts(array $array){
            $type = $array['type'];
            $product = new $type($array);
            $product->setProduct($array);
            $product->addProduct($product);
        }

    //METHOD TO REQUEST DELETION OF PRODUCTS-----------------------------------    
        public function deleteProducts(array $array){
            $this->deleteProducts($array);
        }

}