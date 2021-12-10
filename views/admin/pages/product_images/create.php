<?php
require_once "../../../../vendor/autoload.php";

use app\core\AppSessionHandler;
use app\models\Admin;
use app\core\Helper;
use app\models\Brand;
use app\models\Category;
use app\models\Product;

$user = new Admin();
$user->redirectIfNotAuth();
$session = AppSessionHandler::getInstanse();
$session->start();
// if (isset($session->productsErrors)) {
//     foreach ($session->productsErrors as $key => $value) {
//         $$key = $value;
//     }
// }

$products = new Product();
$products = $products->getAllRecords();

include "../../layouts/head.php";
// var_dump($categories);
?>



<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <!-- ///////////////////////// -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create A Product</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="../../../../controllers/adminControllers/prodcutImagesControllers/createController.php" enctype="multipart/form-data">

                <?= Helper::formMultiImage('product_iamges', 'image', $session); ?>
                <?= Helper::formSelect('product_iamges', 'product_id', $session, $products, 'name'); ?>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

<?php include "../../layouts/footer.php"; ?>