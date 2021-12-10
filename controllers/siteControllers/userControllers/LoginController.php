<?php

use app\models\User;

require_once "../../../vendor/autoload.php";

$user = new User();
$user->login();
