<?php

class ProductsView extends Products {
    
    const BR = '<br/><br/>';

//FETCHING THROUGH GIVEN RECORDS FROM DB USING WHILE LOOP AND VIEWING THEM 
     public function showProducts() {

         $results = $this->getProducts();

                while($obj = $results->fetch(PDO::FETCH_OBJ)){
                    //CONVERTING OBJECT TO ARRAY--------------------------
                        $array = get_object_vars($obj);
                        $type = $array['type'];
                    //CREATES OBJECT BASED ON ITS TYPE--------------------
                        $product = new $type($array);
                    //SETS THE BASE PRODUCT ATTRIBUTES--------------------
                        $product->setProduct($array);
                    
                        echo '<div class="container">';
                        echo '<input type="checkbox" name = "item[]" value="'.$product->getSKU().'"></input><br/>';
                        echo '<div class="details">';
                        echo '<div class="sku">' . $product->getSKU() . '</div>';
                        echo '<div class="name">' . $product->getName() . '</div>';
                        echo '<div class="price">' . $product->getPrice() . '</div>';

                    //TEST FOR PRODUCTS NULL ATTRIBUTES--------------------           
                         if ($product->getType() == "DVD"){
                            echo '<div class="size">' . $product->getSize() . '</div>';
                            }
                            else if ($product->getType() == "BOOK"){
                            echo '<div class="weight">' . $product->getWeight() . '</div>';
                            }
                            else if ($product->getType() == "FURNITURE"){
                            echo '<div class="dimensions">' . $product->getHeight(). ' x ' . $product->getWidth() . ' x ' . $product->getLenght() . '</div>';
                            }

                        echo '</div></div>';
                    };
        }
    
//REQUESTING CONTROLLER TO ADD PRODUCT--------------------------------------    
     public function setProducts(array $array){
         $product = new ProductsController();
         $product->addProducts($array);
     }

//REQUESTING CONTROLLER TO DELETE PRODUCTS----------------------------------    
    public function productDeleteRequest(array $data){
        $this->deleteProducts($data);
    }



}

