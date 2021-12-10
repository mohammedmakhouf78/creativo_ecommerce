<?php

use app\models\Category;

require_once "../../../vendor/autoload.php";

$category = new Category();
$category->updateRecord(
    ['category'],
    $_POST['id'],
    "categories/categories.php",
    "categories/updateCategory.php"
);
