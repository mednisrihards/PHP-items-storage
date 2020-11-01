<?php
require_once ( "includes/autoloader.inc.php");

//CHECK FOR FORM SUBMISSION AND DELETES MARKED ITEMS IF ANY OF THEM IS CHECKED
if (isset($_POST['submit'])){
    $product = new ProductsView();
    $product->productDeleteRequest($_POST);
    unset($_POST);
    header("Location: product_list.php");
};
//--------------------------------------------------------------------------------------------------      
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product list</title>
          <link rel="stylesheet" type="text/css" href="product_list.css">
</head>

<body>
    <form action="" method="post">
            <span >PRODUCT LIST</span>
            <div class="input">
                <input type="submit" formaction="product_add.php" value="Add items">
                <input type="submit" name="submit" value="Delete marked items">
            </div>
            
            <div class="items">
                <?php
                    // FUNCTION FOR LISTING ALL THE PRODUCTS
                    $product = new ProductsView();
                    $product->showProducts();
                ?>
            </div>
    </form>
    <p>Products LISTING, ADDING and DELETING using PHP OOP, Javascript, HTML and Scss. </p>
</body>
</html>
