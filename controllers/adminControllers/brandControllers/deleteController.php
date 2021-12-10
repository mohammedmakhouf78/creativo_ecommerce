<?php

use app\models\Brand;

require_once "../../../vendor/autoload.php";

$brand = new Brand();
$brand->deleteRecord(
    $_GET['id'],
    "brands/brands.php",
    "brands/brands.php"
);
