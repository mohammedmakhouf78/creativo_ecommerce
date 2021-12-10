<?php

use app\core\AppSessionHandler;
use app\models\Brand;
use app\models\Category;
use app\models\Product;
use app\models\ProductImages;

require_once "../../../../vendor/autoload.php";

$myImages = new ProductImages();

$images = $myImages->getAllRecords();
$session = AppSessionHandler::getInstanse();
$session->start();
if (isset($session->product_iamgesSuccess)) {
    $successMsg = $session->product_iamgesSuccess;
}
$myProduct = new Product();
include "../../layouts/head.php";

?>



<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All the Product Images</h6>
            <a class="btn btn-primary" href="./create.php">Create</a>
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
                            <th>Product</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($images as $image) : ?>
                            <tr>
                                <td><?= $image['id'] ?></td>
                                <td><?= $myProduct->getByID($image['product_id'])['name'] ?></td>
                                <td><img style="width: 200px;" src="<?= assets("images/products/{$image['image']}") ?>" alt=""></td>
                                <td>
                                    <a href="../../../../controllers/adminControllers/prodcutImagesControllers/deleteController.php?id=<?= $image['id'] ?>" class="btn btn-danger btn-circle">
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