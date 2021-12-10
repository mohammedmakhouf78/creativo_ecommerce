<?php
require_once "../../../vendor/autoload.php";

use app\core\AppSessionHandler;
use app\models\User;

$session = AppSessionHandler::getInstanse();
$session->start();
$user = new User();
$user->redirectIfAuth();
if (isset($session->registerErrors)) {
    foreach ($session->registerErrors as $key => $value) {
        $$key = $value;
    }
}
include "../layouts/head.php";
?>

<!-- contact section start -->
<div class="layout_padding contact_section">
    <div class="container">
        <h1 class="new_text"><strong>Register</strong></h1>
    </div>
    <div class="container-fluid ram">
        <div class="row">
            <div class="col-md-6">
                <div class="email_box">
                    <div class="input_main">
                        <div class="container">
                            <form id="userRegisterForm" action="../../../controllers/siteControllers/userControllers/RegisterController.php" method="POST">
                                <div class="form-group">
                                    <input type="text" class="email-bt" placeholder="Name" name="name" value="<?= isset($session->registerData['name']) ? $session->registerData['name'] : "" ?>">
                                    <p class="text-danger">
                                        <?= isset($name) ? $name : "" ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="email-bt" placeholder="Email" name="email" value="<?= isset($session->registerData['email']) ? $session->registerData['email'] : "" ?>">
                                    <p class="text-danger">
                                        <?= isset($email) ? $email : "" ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="email-bt" placeholder="Password" name="password">
                                    <p class="text-danger">
                                        <?= isset($password) ? $password : "" ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="email-bt" placeholder="Confirm Password" name="confirm_password">
                                    <p class="text-danger">
                                        <?= isset($confirm_password) ? $confirm_password : "" ?>
                                    </p>
                                    <p class="text-danger">
                                        <?= isset($password_match) ? $password_match : "" ?>
                                    </p>
                                </div>
                            </form>
                        </div>
                        <div class="send_btn">
                            <button class="main_bt" onclick="registerFormSubmit()">Send</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="shop_banner">
                    <div class="our_shop">
                        <button class="out_shop_bt">Our Shop</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact section end -->

<script>
    function registerFormSubmit() {
        document.getElementById("userRegisterForm").submit();
    }
</script>

<?php include "../layouts/head.php"; ?>