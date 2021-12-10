<?php
require_once "../../../vendor/autoload.php";

use app\core\AppSessionHandler;
use app\core\Helper;
use app\models\Admin;


$isAuth = (new Admin())->checkAuth();

if ($isAuth) {
    $session = AppSessionHandler::getInstanse();
    $session->start();
    $session->admin = [
        'email' => $_POST['email']
    ];
    Helper::redirect(Helper::$controllersPagesPath . 'home/index.php');
} else {
    Helper::redirect(Helper::$controllersPagesPath . 'users/login.php');
}
