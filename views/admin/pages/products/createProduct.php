<?php
require_once "../../../../vendor/autoload.php";

use app\core\AppSessionHandler;
use app\models\Admin;
use app\core\Helper;
use app\models\Brand;
use app\models\Category;

$user = new Admin();
$user->redirectIfNotAuth();
$session = AppSessionHandler::getInstanse();
$session->start();
// if (isset($session->productsErrors)) {
//     foreach ($session->productsErrors as $key => $value) {
//         $$key = $value;
//     }
// }
$categories = new Category();
$categories = $categories->getAllRecords();
$brands = new Brand();
$brands = $brands->getAllRecords();

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
            <form method="POST" action="../../../../controllers/adminControllers/productControllers/createController.php">
                <?= Helper::formInput('products', 'name', $session); ?>
                <?= Helper::formInput('products', 'price', $session); ?>
                <?= Helper::formInput('products', 'count', $session); ?>
                <?= Helper::formTextArea('products', 'description', $session); ?>
                <?= Helper::formSelect('products', 'category_id', $session, $categories, "category"); ?>
                <?= Helper::formSelect('products', 'brand_id', $session, $brands, 'brand'); ?>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

<?php include "../../layouts/footer.php"; ?>