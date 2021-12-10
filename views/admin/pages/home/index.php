<?php
require_once "../../../../vendor/autoload.php";

use app\models\Admin;

$admin = new Admin();
$admin->redirectIfNotAuth();


// here do the redirect before icluding any html
include "../../layouts/head.php";

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

    </div>

</div>
<!-- /.container-fluid -->


<?php include "../../layouts/footer.php"; ?>