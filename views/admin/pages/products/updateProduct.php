<?php
require_once "../../../../vendor/autoload.php";

use app\core\AppSessionHandler;
use app\core\Helper;
use app\models\Admin;
use app\models\Brand;
use app\models\Category;
use app\models\Product;

$user = new Admin();
$user->redirectIfNotAuth();
if (!isset($_GET['id'])) {
    Helper::redirect('./prodcuts.php');
}
$session = AppSessionHandler::getInstanse();
$session->start();
if (isset($session->productsErrors)) {
    foreach ($session->productsErrors as $key => $value) {
        $$key = $value;
    }
}

$productObj = new Product();
$productData = $productObj->getById($_GET['id']);
$categories = new Category();
$categories = $categories->getAllRecords();
$brands = new Brand();
$brands = $brands->getAllRecords();
include "../../layouts/head.php";

?>



<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- ///////////////////////// -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update A Product</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="../../../../controllers/adminControllers/productControllers/updateController.php">
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <?= Helper::formInputUpdate('products', 'name', $session, $productData['name']) ?>
                <?= Helper::formInputUpdate('products', 'price', $session, $productData['price']) ?>
                <?= Helper::formInputUpdate('products', 'count', $session, $productData['count']) ?>
                <?= Helper::formTextAreaUpdate('products', 'description', $session, $productData['description']) ?>
                <?= Helper::formSelectUpdate('products', 'category_id', $session, $categories, "category", $productData['category_id']) ?>
                <?= Helper::formSelectUpdate('products', 'brand_id', $session, $brands, "brand", $productData['brand_id']) ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

<?php include "../../layouts/footer.php"; ?>