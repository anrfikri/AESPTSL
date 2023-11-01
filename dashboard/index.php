<?php
session_start();
include('../config.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}
$last = $_SESSION['username'];
$queryupdate = mysqli_query($koneksi,"UPDATE users SET last_activity=now() WHERE username='$last'");
?>
<!DOCTYPE html>
<html lang="en">
<?php
$user = $_SESSION['username'];
$query = mysqli_query($koneksi,"SELECT fullname,job_title,last_activity FROM users WHERE username='$user'");
$data = mysqli_fetch_array($query);
?>
  <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard AES PTSL</title>
  
  <?php include('layout/header.php'); ?>

<!-- navbar -->
<?php include('layout/sidebar.php'); ?>
  <!-- start statistik -->
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <?php
          // Menampilkan banyaknya totaluser dari table users
          $query = mysqli_query($koneksi,"SELECT count(*) totaluser FROM users");
          $datauser = mysqli_fetch_array($query);
          ?>
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Pengguna</p>
                <h4 class="mb-0"><?php echo $datauser['totaluser']; ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"></span>Jumlah pengguna</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <?php
                      $query = mysqli_query($koneksi,"SELECT count(*) totalencrypt FROM file WHERE status='1'");
                      $dataencrypt = mysqli_fetch_array($query);
                      ?>
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">description</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Jumlah Enkripsi</p>
                <h4 class="mb-0"><?php echo $dataencrypt['totalencrypt']; ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>File terenkripsi</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <?php
                        $query = mysqli_query($koneksi,"SELECT count(*) totaldecrypt FROM file WHERE status='2'");
                        $datadecrypt = mysqli_fetch_array($query);
                        ?>
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">download</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Jumlah Dekripsi</p>
                <h4 class="mb-0"><?php echo $datadecrypt['totaldecrypt']; ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>File terdekripsi dan siap diunduh</p>
            </div>
          </div>
        </div>
        
      </div>
        <!-- end statistik -->

      <!-- KETERANGAN -->
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Selamat datang di Dashboard AES PTSL Kedungsari !</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2 pt-2">
                <hr class="dark horizontal my-0">
                  <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>Merupakan website pengamanan sekaligus backup pada file Pendaftaran Tanah Sistematis Lengkap (PTSL) Desa Kedungsari dengan algoritma AES-128</p>
                  </div>
              </div>
              </div>
            </div>
          </div>
      <!-- END KETERANGAN -->
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
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>- Untuk melihat file terupload terdapat pada menu Daftar File Enkripsi Dekripsi <br>- Untuk mendownload atau melihat file yang siap didownload terdapat pada menu File Siap Download <br>----------- Semoga Harimu Menyenangkan :) ----------- </p>
                  </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      <!-- END KETERANGAN -->

<!-- footer -->
<?php include('layout/footer.php'); ?>
      

