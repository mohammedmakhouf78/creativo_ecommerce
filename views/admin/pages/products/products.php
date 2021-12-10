<?php

use app\core\AppSessionHandler;
use app\models\Brand;
use app\models\Category;
use app\models\Product;

require_once "../../../../vendor/autoload.php";

$myProduct = new Product();

$products = $myProduct->getAllRecords();
$session = AppSessionHandler::getInstanse();
$session->start();
if (isset($session->prodcutsSuccess)) {
    $successMsg = $session->productsSuccess;
}
$myCategory = new Category();
$myBrand = new Brand();
include "../../layouts/head.php";

?>



<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All the Products</h6>
            <a class="btn btn-primary" href="./createProduct.php">Create</a>
        </div>
        <p class="bg-gradient-success text-light text-center">
            <?= isset($successMsg) ? $successMsg : "" ?>
        </p>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>price</th>
                            <th>Description</th>
                            <th>Count</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>price</th>
                            <th>Description</th>
                            <th>Count</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td><?= $product['id'] ?></td>
                                <td><?= $product['name'] ?></td>
                                <td><?= $product['price'] ?></td>
                                <td><?= $product['description'] ?></td>
                                <td><?= $product['count'] ?></td>
                                <td><?= $myCategory->getByID($product['category_id'])['category'] ?></td>
                                <td><?= $myBrand->getByID($product['brand_id'])['brand'] ?></td>
                                <td>
                                    <form class="d-inline" action="./updateProduct.php" method="GET">
                                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                        <button type="submit" class="btn btn-success btn-circle">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </form>
                                    <a href="../../../../controllers/adminControllers/productControllers/deleteController.php?id=<?= $product['id'] ?>" class="btn btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

<?php include "../../layouts/footer.php"; ?>