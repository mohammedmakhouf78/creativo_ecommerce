<?php

use app\models\Product;

require_once "../../../vendor/autoload.php";

$product = new Product();

$products = $product->getProducts();

include "../layouts/head.php";

?>



<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All the Products</h6>
            <a class="btn btn-primary" href="">Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Count</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Brand</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Count</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Brand</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td><?= $product['id'] ?></td>
                                <td><?= $product['name'] ?></td>
                                <td><?= $product['price'] ?></td>
                                <td><?= $product['count'] ?></td>
                                <td><?= $product['description'] ?></td>
                                <td><?= $product['category'] ?></td>
                                <td><?= $product['brand'] ?></td>
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