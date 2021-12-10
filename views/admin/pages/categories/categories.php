<?php

use app\core\AppSessionHandler;
use app\models\Category;

require_once "../../../../vendor/autoload.php";

$category = new Category();

$categories = $category->getAllRecords();
$session = AppSessionHandler::getInstanse();
$session->start();
if (isset($session->categoriesSuccess)) {
    $successMsg = $session->categoriesSuccess;
}

include "../../layouts/head.php";

?>



<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All the Categories</h6>
            <a class="btn btn-primary" href="./createCategory.php">Create</a>
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
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($categories as $category) : ?>
                            <tr>
                                <td><?= $category['id'] ?></td>
                                <td><?= $category['category'] ?></td>
                                <td>
                                    <form class="d-inline" action="./updateCategory.php" method="GET">
                                        <input type="hidden" name="id" value="<?= $category['id'] ?>">
                                        <button type="submit" class="btn btn-success btn-circle">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </form>
                                    <a href="../../../../controllers/adminControllers/categoryControllers/deleteController.php?id=<?= $category['id'] ?>" class="btn btn-danger btn-circle">
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