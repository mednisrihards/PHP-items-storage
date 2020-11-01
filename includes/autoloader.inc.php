<?php
spl_autoload_register('autoLoader');

function autoLoader($className){

$path = "classes/" . $className . ".class.php";

include_once $path;
}