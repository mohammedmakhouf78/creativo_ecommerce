<?php

use app\models\Category;

require_once "../../../vendor/autoload.php";

$category = new Category();
$category->createRecord(
    ['category'],
    "categories/categories.php",
    "categories/createCategory.php"
);
