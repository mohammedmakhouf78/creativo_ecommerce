<?php
require_once "../../../vendor/autoload.php";

use app\core\AppSessionHandler;
use app\models\User;

$session = AppSessionHandler::getInstanse();
$session->start();
$isAuth = isset($session->userEmail);
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="index.html">Home</a>
            <a class="nav-item nav-link" href="collection.html">Collection</a>
            <a class="nav-item nav-link" href="shoes.html">Shoes</a>
            <!-- <a class="nav-item nav-link" href="racing boots.html">Racing Boots</a> -->
            <!-- <a class="nav-item nav-link" href="contact.html">Contact</a> -->
            <?php if (!$isAuth) : ?>
                <a class="nav-item nav-link" href="register.php">Register</a>
                <a class="nav-item nav-link" href="login.php">Login</a>
            <?php else : ?>
                <a class="nav-item nav-link" href="../../../controllers/siteControllers/userControllers/LogoutController.php">Logout</a>
            <?php endif ?>
            <a class="nav-item nav-link last" href="#"><img src="../../../assets/images/search_icon.png"></a>
            <a class="nav-item nav-link last" href="contact.html"><img src="../../../assets/images/shop_icon.png"></a>
        </div>
    </div>
</nav>