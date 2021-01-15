<?php

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

class Connection {
    private $host;
    private $user;
    private $pw;
    private $dbname;

    function __construct(){
        $this->host = $_ENV['MYSQL_HOST'];
        $this->user = $_ENV['MYSQL_USER'] ;
        $this->pw = $_ENV['MYSQL_PASSWORD'] ;
        $this->dbname = $_ENV['MYSQL_DB'] ;
    }

    protected function connect() {
            $connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pw);    
        return $connection;
    }
}