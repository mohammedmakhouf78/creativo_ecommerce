<?php
require_once "../../../../vendor/autoload.php";

use app\core\AppSessionHandler;
use app\core\Helper;
use app\models\Admin;
use app\models\Brand;

$user = new Admin();
$user->redirectIfNotAuth();
if (!isset($_GET['id'])) {
    Helper::redirect('./brands.php');
}
$session = AppSessionHandler::getInstanse();
$session->start();
if (isset($session->brandsErrors)) {
    foreach ($session->brandsErrors as $key => $value) {
        $$key = $value;
    }
}

$brandObj = new Brand();
$brandData = $brandObj->getById($_GET['id']);
include "../../layouts/head.php";

?>



<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- ///////////////////////// -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update A Brand</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="../../../../controllers/adminControllers/brandControllers/updateController.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Brand</label>
                    <input type="hidden" name="id" value="<?= $brandData['id'] ?>">
                    <input type="text" class="form-control" placeholder="Enter Brand Name" id="exampleInputEmail1" name="brand" value="<?= $brandData['brand'] ?>">
                    <p class="text-danger">
                        <?= isset($brand) ? $brand : "" ?>
                    </p>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

<?php include "../../layouts/footer.php"; ?>