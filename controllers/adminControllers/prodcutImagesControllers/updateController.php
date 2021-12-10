<?php

use app\models\Product;

require_once "../../../vendor/autoload.php";

$product = new Product();
$product->updateRecord(
    ['name', 'price', 'count', 'description', 'category_id', 'brand_id'],
    $_POST['id'],
    "products/products.php",
    "products/updateproduct.php"
);
