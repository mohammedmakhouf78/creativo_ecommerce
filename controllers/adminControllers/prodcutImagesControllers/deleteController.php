<?php

use app\models\Product;
use app\models\ProductImages;

require_once "../../../vendor/autoload.php";

$productImage = new ProductImages();
$productImage->deleteRecord(
    $_GET['id'],
    "product_images/all.php",
    "product_images/all.php"
);
