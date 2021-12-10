<?php

use app\models\Brand;

require_once "../../../vendor/autoload.php";

$brand = new Brand();

$brands = $brand->getBrands();

include "../layouts/head.php";

?>



<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All the Brands</h6>
            <a class="btn btn-primary" href="">Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Brand</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Brand</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($brands as $brand) : ?>
                            <tr>
                                <td><?= $brand['id'] ?></td>
                                <td><?= $brand['brand'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

<?php include "../layouts/footer.php"; ?>