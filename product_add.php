<?php 
require_once ( "includes/autoloader.inc.php");

// CHECK FOR FORM SUBMISSION
if (isset($_POST['submit'])){
    $product = new ProductsView();
    $product->setProducts($_POST);
    header("Location: index.php");
};

?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
     <link rel="stylesheet" type="text/css" href="product_add.css">
     <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>
   <div class="header">
    <span>PRODUCT ADD</span>
       <input type="submit" onclick="window.location.href = 'index.php';" value="Product list">
    </div>
    <p>Products LISTING, ADDING and DELETING using PHP OOP, Javascript, HTML and Scss. </p>

 
<form action="" method="post">
<span>Item name: </span><input type="text" name="name" placeholder="Input item name">
<span>Item price: </span><input type="text" name="price" placeholder="Input item price">
<span>Item type: </span><select name = "type" id="type">
        <option value="DVD">DVD</option>
        <option value="BOOK">BOOK</option>
        <option value="FURNITURE">FURNITURE</option>
    </select>


    <div id="DVD" class="DVD input">
        <span>SIZE (MB): </span><input id="size" type="text" name="size" placeholder="Enter the size of DVD-Disc">
    </div>
    <div id="BOOK" class="BOOK input">
        <span>WEIGHT (KG): </span><input type="text" name="weight" placeholder="Enter the weight of a book">
    </div>
    <div id="FURNITURE" class="FURNITURE input">
        <span>HEIGHT (mm): </span><input type="text" name="height" placeholder="Enter the height of item">
        <span>WIDTH (mm): </span><input type="text" name="width" placeholder="Enter the width of item">
        <span>LENGTH (mm): </span><input type="text" name="lenght" placeholder="Enter the lenght of item">
    </div>

    <input type="submit" name="submit" class="btn left" value="Add item">
    
</form>
   
<!--SCRIPT TO CHANGE THE VISIABILITY OF NON NEEDED PARAMETER CONTAINERS-->
<script>
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".input").not("." + optionValue).hide();
                $("." + optionValue).show();
            }
            else{
                $(".box").hide();
            }
        });
    }).change();
});

</script>



</body>
</html>
