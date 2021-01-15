<?php


class Products extends Connection {
    
    private $SKU;
    private $name;
    private $price;
    private $type;
    
// SET METHODS --------------------------------   
    protected function setSKU(array $data){
        //CHECKING IS SKU SET ALREADY OR IT SHOULD BE GENERATED FOR NEW PRODUCT  
        if (isset($data['SKU'])){
            $this->SKU = $data['SKU'];
        }    
        else{
            //GENERATES UNIQUE ID FOR PRODUCT
            $id = uniqid('', true);

            //TAKES EVERYTHING OUT OF GENERATED ID EXCEPT NUMBERS
            $this->SKU = preg_replace("/[^0-9]/", "", $id);
        }
    }
    
    protected function setName($data){
        $this->name = $data["name"];
    }
    protected function setPrice($data){
        $this->price = $data["price"];
    }
    protected function setType($data){
        $this->type = $data["type"];
    }
    
// GET METHODS --------------------------------
    protected function getSKU(){
        return $this->SKU;
    }
    protected function getName(){
        return $this->name;
    }
    protected function getPrice(){
        return $this->price;
    }
    protected function getType(){
        return $this->type;
    }
    
//METHOD TO SET PRODUCT------------------------      
    protected function setProduct(array $data){
 
        $this->setSKU($data);
        $this->setName($data);
        $this->setPrice($data);
        $this->setType($data);
    }
    
//METHOD TO ADD PRODUCT------------------------       
    protected function addProduct($obj){
        $conn = new Connection();

    //CONVERTING OBJECT TO ARRAY
        $array = get_object_vars($this);

    //SEPARATING ARRAY KEYS AND VALUES FOR USE IN QUERY
        $columns = implode(", ", array_keys($array));
        $values = implode('", "', array_values($array));
    //PRODUCTS INSERT QUERY
        $query=('INSERT INTO product_list (' . $columns . ') VALUES ("' .   $values . '")');

    //QUERY EXECUTION
        $result = $conn->connect()->query($query);
    }

//METHOD TO DELETE PRODUCTS--------------------  
    protected function deleteProducts(array $data){

    //GETS THE ARRAY
        $tmp = $data['item'];
        
    //PUTTING VALUES TOGETHER SEPERATED BY COMMA
        $SKU = implode(',',$tmp);
        
    //DELETE QUERY
        $query = "DELETE FROM product_list WHERE SKU IN ({$SKU})";
        $result = $this->connect()->query($query);
    }
    
//QUERY TO FETCH DATA FROM DATABASE -----------
    protected function getProducts(){
        $query = "SELECT * FROM product_list";
        $results = $this->connect()->query($query);

        return $results;
    }  
}

//-------------------DVD-----------------------
class DVD extends Products {
    
    protected $size;
//SETS DVD INDIVIDUAL ATTRIBUTE  
    public function __construct(array $data){
        $this->size = $data["size"];
    }
    public function getSize(){
        return $this->size;
    }
}

//-------------------BOOK----------------------   
class BOOK extends Products {
    
    protected $weight;
//SETS BOOK INDIVIDUAL ATTRIBUTE      
    public function __construct(array $data){
        $this->weight = $data["weight"];
    }
    public function getWeight(){
        return $this->weight;
    }
}

//-------------------FURNITURE-----------------
class FURNITURE extends Products {
    
    protected $height;
    protected $width;
    protected $lenght;
//SETS FURNITURE INDIVIDUAL ATTRIBUTES       
    public function __construct(array $data){
        $this->height = $data["height"];
        $this->width = $data["width"];
        $this->lenght = $data["lenght"];
    }
    
    public function getHeight(){
        return $this->height;
    }
    public function getWidth(){
        return $this->width;
    }
    public function getLenght(){
        return $this->lenght;
    }
}
    
    
    
