<!-- ============================================================== -->
<!-- Cek Session -->
<!-- ============================================================== -->
<?php
    session_start(); // resume session
    if (!isset($_SESSION['kode'])) {
        header('Location: ../login.php');
    }
?>
<!-- ============================================================== -->
<!-- Require Header -->
<!-- ============================================================== -->
<?php require_once "lib/header.php"; ?>
<!-- ============================================================== -->
<!-- Require Bar -->
<!-- ============================================================== -->
<?php require_once "lib/topbar.php"; ?>
<?php require_once "lib/sidebar.php"; ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" class="form-horizontal form-material d-print-none">
                            <div class="form-row pb-2">
                                <div class="form-group col-3">
                                    <label for="tanggal-awal">Dari Tanggal</label>
                                    <input type="date" name="tanggal-awal" id="tanggal-awal" class="form-control form-control-line">
                                </div>
                                <div class="col-1"></div>
                                <div class="form-group col-3">
                                    <label for="tanggal-awal">Sampai Tanggal</label>
                                    <input type="date" name="tanggal-awal" id="tanggal-awal" class="form-control form-control-line">
                                </div>
                                <div class="col-1"></div>
                                <div class="col-3">
                                    <div class="dropright">
                                        <button type="button" class="btn btn-info dropdown-toggle" id="export-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Export</button>
                                        <div class="dropdown-menu" arialabelledby="export-btn">
                                            <button type="button" class="dropdown-item" onclick="window.print()">PDF</button>
                                            <button type="button" class="dropdown-item" onclick="">Excel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">
        © 2021 PKL UNDIP PT Penerbit Erlangga Semarang
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Require Footer -->
<!-- ============================================================== -->
<?php require_once 'lib/footer.php'; ?>