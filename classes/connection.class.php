<?php

class Connection {
    //CONNECTION TO DATABASE
    private $host = "localhost";
    private $user = "root";
    private $pw = "root";
    private $dbname = "products";
    
    protected function connect(){
            $connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pw);    
        return $connection;
   
    }
}
    
    
