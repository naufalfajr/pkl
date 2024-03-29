<!-- ============================================================== -->
<!-- Cek Session -->
<!-- ============================================================== -->
<?php
  session_start(); // resume session
  if (!isset($_SESSION['kode'])) { // cek session
    header('Location: ../login.php');
  }else {
    if($_SESSION['role'] == 'PIC'){
      header('Location: ../');
    }
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
    <div class="row"> <!-- Alert setelah add, edit & delete -->
      <div class="col-sm-12">
        <?php
        if (isset($_GET['success'])) {
          switch ($_GET['success']) {
            case '1':
              echo '<div class="alert alert-success alert-dismissible fade show">
                    <strong>Sukses!</strong> Barang berhasil ditambahkan.<br>';
              break; 
            case '-1':
              echo '<div class="alert alert-danger alert-dismissible fade show">
                    <strong>Gagal!</strong> Barang gagal ditambahkan.<br>';
              break;
            case '2':
              echo '<div class="alert alert-success alert-dismissible fade show">
                    <strong>Sukses!</strong> Data Barang berhasil diedit.<br>';
              break;
            case '-2':
              echo '<div class="alert alert-danger alert-dismissible fade show">
                    <strong>Gagal!</strong> Data Barang gagal diedit.<br>';
              break;
            case '3':
              echo '<div class="alert alert-success alert-dismissible fade show">
                    <strong>Sukses!</strong> Data Barang berhasil dihapus.<br>';
              break;
            case '-3':
              echo '<div class="alert alert-danger alert-dismissible fade show">
                    <strong>Gagal!</strong> Data Barang gagal dihapus.<br>';
              break;
            case '4':
              echo '<div class="alert alert-success alert-dismissible fade show">
                    <strong>Sukses!</strong> Data Barang berhasil diimpor.<br>';
              break;
            case '-41':
              echo '<div class="alert alert-danger alert-dismissible fade show">
                    <strong>Gagal!</strong> Data Barang gagal diimpor. <strong>Error</strong> Data Barang sudah ada.<br>';
              break;
            case '-42':
              echo '<div class="alert alert-danger alert-dismissible fade show">
                    <strong>Gagal!</strong> Data Barang gagal diimpor. <strong>Error</strong> Format file salah.<br>';
              break;
          }  
          echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
        } ?>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6">
            <form action="lib/import.php" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
              <div class="form-group d-inline">
                <button type="submit" class="btn btn-primary mr-1" style="font-size: 110%"><i class="fas fa-upload"></i>&nbsp;Import File</button>
                <input type="file" class="form-control-input mb-2" name="myfile" id="myfile" required/>
              </div>
            </form>
          </div>
          <div class="col-sm-6">
            <a href="add-barang.php" type="button" class="btn btn-primary float-right d-inline-block" style="font-size: 110%"><i class="fas fa-plus"></i>&nbsp;Tambah Peralatan</a>
          </div>
        </div>
        <h4 class="card-title text-center d-block mt-4" style="font-size: 200%;">Tabel Peralatan Logistik</h4>
        <div class="table-responsive-sm">
          <table class="table user-table" id="tabel-barang" style="table-layout: auto;">
            <thead>
              <tr>
                <th class="border-top-0">Kode Peralatan</th>
                <th class="border-top-0">Jenis Barang</th>
                <th class="border-top-0">Nama Barang</th>
                <th class="border-top-0">Tahun</th>
                <th class="border-top-0">Lokasi</th>
                <th class="border-top-0">PIC</th>
                <th class="border-top-0">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $query = " SELECT * FROM barang ORDER BY jenis_brg DESC ";
              $result = $db->query($query);
              if (!$result) {
                  die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
              }
              while ($row = $result->fetch_object()) { 
                print_r('<tr>');
                  echo '<td>'.$row->kode_brg.'</td>';
                  echo '<td>'.$row->jenis_brg.'</td>';
                  echo '<td>'.$row->nama_brg.'</td>';
                  echo '<td>'.$row->tahun.'</td>';
                  echo '<td>'.$row->lokasi.'</td>';
                  echo '<td>'.$row->pic.'</td>';
                  echo '<td>
                          <div class="btn-group">
                            <a href="edit-barang.php?kode_brg='.$row->kode_brg.'" type="button" class="btn btn-warning text-white ">Edit</a>
                            <button type="button" class="btn btn-danger text-white" data-toggle="modal" data-target="#hapusModalBarang" data-whatever="'.$row->kode_brg.'">Hapus</button>
                          </div>
                        </td>';
                print_r('</tr>');
              }
              $result->free();
              $db->close();
            ?>
            </tbody>
          </table>
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
  <!-- Modal hapus -->
  <!-- ============================================================== -->
  <div class="modal fade" id="hapusModalBarang" tabindex="-1" role="dialog" aria-labelledby="hapusModalBarangLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body p-5">
          <p class="text-center mb-4" style="font-size: 140%;"><strong>Apakah anda yakin ingin menghapusnya?</strong></p>
          <a href="" type="button" class="btn btn-danger d-inline-block float-right">Hapus</a>
          <button type="button" class="btn btn-secondary d-inline-block float-right mr-2" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- End Modal hapus -->
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