<?php

use app\models\Product;

require_once "../../../vendor/autoload.php";

$product = new Product();
$product->deleteRecord(
    $_GET['id'],
    "products/products.php",
    "products/products.php"
);
