<?php
session_start();
include('../config.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}
// Membuat tampilan waktu realtime sesuai aktivitas terakhir kita bedasarkan session pada atribut username
$last = $_SESSION['username'];
$queryupdate = mysqli_query($koneksi,"UPDATE users SET last_activity=now() WHERE username='$last'");
?>
<!DOCTYPE html>
<html>
<?php
$user = $_SESSION['username'];
$query = mysqli_query($koneksi,"SELECT fullname,job_title,last_activity FROM users WHERE username='$user'");
$data = mysqli_fetch_array($query);
?>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Daftar File Terdekripsi Siap Download</title>
  
  <?php include('layout/header.php'); ?>

<!-- navbar -->
<?php include('layout/sidebar.php'); ?>
  <!-- start statistik -->
  <div class="container-fluid py-4">
      

      <!-- KETERANGAN -->
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Daftar File Terdekripsi Siap Download</h6>
              </div>
              <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active">Daftar File Terdekripsi Siap Download</li>
              </ol>
            </div>
            <div class="card-body px-3 pb-2">
                <hr class="dark horizontal my-0">
                  <div class="card-footer p-3">
                    
<!-- tabel -->
            <table id="tabelku" class="table table-bordered responsive display nowrap" width="80%">
              <thead class="bg-gradient-info text-white">
                        <tr>
                          <td width="5%"><strong>No</strong></td>
                          <td width="20%"><strong>Nama Sumber File</strong></td>
                          <td width="20%"><strong>Nama File Enkripsi</strong></td>
                          <td width="20%"><strong>Keterangan File</strong></td>
                          <td width="15%"><strong>Waktu Dekripsi (detik)</strong></td>
                          <td width="15%"><strong>Status File</strong></td>
                          <td width="10%"><strong>Opsi</strong></td>
                        </tr>
                      </thead>
                        <tbody>
                        <?php
                        // Menampilkan data memakai perulangan while dari tabel file
                          $i = 1;
                          $query = mysqli_query($koneksi,"SELECT * FROM file");
                          while ($data = mysqli_fetch_array($query)) { 
                          $namafile     = $data['file_name_finish'];
                          $namabrks     = $data['file_name_source'];
                          $keterangan      = $data['keterangan'];
                          $status       = $data['status'];
                          $decrypt_time = $data ['decrypt_time'];
                          $donlud       = '<a href="download.php?file='.$namabrks.'" class="btn btn-success">Download</a>';
                          ?>
                          <?php if ($status == 2) { ?>
                          <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $namabrks ?></td>
                            <td><?php echo $namafile ?></td>
                            <td><?php echo $keterangan ?></td>
                            <td><?php echo $decrypt_time ?></td>
                            <td>Terdekripsi Siap Download</td>
                            <td><?php echo $donlud ?></td>
                          </tr>
                          <?php $i++; } ?>
                          <?php } ?>
                        </tbody>
              </table>
              </div>
              </div>
            </div>
          </div>
        </div>
<!-- KETERANGAN -->
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Tips !</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2 pt-2">
                  <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>- Untuk mendownload file, silahkan klik tombol download pada file yang diinginkan. <br>- Batas download file adalah 1 kali download</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
      <!-- END KETERANGAN -->
      <!-- footer -->
<?php include('layout/footer.php'); ?>
  