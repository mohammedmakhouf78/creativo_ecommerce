<?php

use app\core\AppSessionHandler;
use app\models\Brand;

require_once "../../../../vendor/autoload.php";

$myBrand = new Brand();

$brands = $myBrand->getAllRecords();
$session = AppSessionHandler::getInstanse();
$session->start();
if (isset($session->brandsSuccess)) {
    $successMsg = $session->brandsSuccess;
}

include "../../layouts/head.php";

?>



<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All the Brands</h6>
            <a class="btn btn-primary" href="./createBrand.php">Create</a>
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
                            <th>Brand</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Brand</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($brands as $brand) : ?>
                            <tr>
                                <td><?= $brand['id'] ?></td>
                                <td><?= $brand['brand'] ?></td>
                                <td>
                                    <form class="d-inline" action="./updateBrand.php" method="GET">
                                        <input type="hidden" name="id" value="<?= $brand['id'] ?>">
                                        <button type="submit" class="btn btn-success btn-circle">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </form>
                                    <a href="../../../../controllers/adminControllers/brandControllers/deleteController.php?id=<?= $brand['id'] ?>" class="btn btn-danger btn-circle">
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