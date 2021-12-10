<?php

use app\models\Brand;

require_once "../../../vendor/autoload.php";

$brand = new Brand();
$brand->createRecord(
    ['brand'],
    "brands/brands.php",
    "brands/createBrand.php"
);
