<?php

use app\models\Product;

require_once "../../../vendor/autoload.php";

$product = new Product();
$product->createRecord(
    ['name', 'price', 'count', 'description', 'category_id', 'brand_id'],
    "products/products.php",
    "products/createproduct.php"
);
