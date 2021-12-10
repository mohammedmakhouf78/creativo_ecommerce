<?php

use app\models\Category;

require_once "../../../vendor/autoload.php";

$category = new Category();
$category->deleteRecord(
    $_GET['id'],
    "categories/categories.php",
    "categories/categories.php"
);
