<?php

use app\models\Admin;

require_once "../../../vendor/autoload.php";

$admin = new Admin();

$admin->logout();
