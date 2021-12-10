<?php

use app\models\Brand;

require_once "../../../vendor/autoload.php";

$brand = new Brand();
$brand->updateRecord(
    ['brand'],
    $_POST['id'],
    "brands/brands.php",
    "brands/updateBrand.php"
);
