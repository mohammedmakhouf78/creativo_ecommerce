<?php
require_once "../../../vendor/autoload.php";

use app\core\AppSessionHandler;
use app\models\User;

$session = AppSessionHandler::getInstanse();
$session->start();
$user = new User();
$user->redirectIfAuth();
if (isset($session->loginErrors)) {
    foreach ($session->loginErrors as $key => $value) {
        $$key = $value;
    }
}
include "../layouts/head.php";
?>

<!-- contact section start -->
<div class="layout_padding contact_section">
    <div class="container">
        <h1 class="new_text"><strong>Loin</strong></h1>
    </div>
    <div class="container-fluid ram">
        <div class="row">
            <div class="col-md-6">
                <div class="email_box">
                    <div class="input_main">
                        <div class="container">
                            <form id="userRegisterForm" action="../../../controllers/siteControllers/userControllers/LoginController.php" method="POST">
                                <div class="form-group">
                                    <input type="email" class="email-bt" placeholder="Email" name="email" value="<?= isset($session->loginData['email']) ? $session->loginData['email'] : "" ?>">
                                    <p class="text-danger">
                                        <?= isset($email) ? $email : "" ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="email-bt" placeholder="Password" name="password">
                                    <p class="text-danger">
                                        <?= isset($password) ? $password : "" ?>
                                    </p>
                                    <p class="text-danger">
                                        <?= isset($session->password_credintials) ? $session->password_credintials : "" ?>
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