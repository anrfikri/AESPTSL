<?php
session_start();
include('../config.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}
// Memanggil status dari tabel users
$user = $_SESSION['username'];
$query = mysqli_query($koneksi, "SELECT status FROM users WHERE username='$user'");
$data = mysqli_fetch_array($query);

// Menyimpan status pada session
$_SESSION['status'] = $data['status'];

// Hanya admin yang dapat mengakses halaman ini
if($_SESSION['status'] !== 'admin') {
    header("location:./index.php");
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
  <title>Enkripsi File</title>
  
  <?php include('layout/header.php'); ?>

<!-- navbar -->
<?php include('layout/sidebar.php'); ?>


<div class="container-fluid py-4">
      

      <!-- KETERANGAN -->
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">ENKRIPSI FILE</h6>
              </div>
              <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active"><a href="daftar_file.php">Daftar File Terenkripsi dan Terdekripsi</a></li>
                  <li class="breadcrumb-item active">Enkripsi File</li>
              </ol>
            </div>
            <div class="card-body px-3 pb-2">
                <hr class="dark horizontal my-0">
                <form role="form" class="text-start" method="post" action="proses_encrypt.php" enctype="multipart/form-data">
                  <fieldset>
                  <div class="input-group input-group-static mb-4 is-filled">
                    <label class="form-label"for="inputTgl">Tanggal</label>
                    <input type="date" class="form-control" id="inputTgl" placeholder="Tanggal" name="datenow" value="<?php echo date("Y-m-d");?>" disabled>
                  </div>
                  <div class="input-group input-group-static mb-4 is-filled">
                    <label class="form-label" for="inputFile">Berkas</label>
                    <input type="file" class="form-control" id="inputFile"  name="file" required>
                  </div>
                  <div class="input-group input-group-dynamic mb-4">
                    <label class="form-label" for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="pwdfile" required>
                  </div>
                  <div class="input-group input-group-dynamic mb-4">
                    <label class="form-label" for="textArea">Keterangan</label>
                    <input type="text" class="form-control" id="textArea" rows="2" name="desc" ></input>
                  </div>
                  <div class="text-start">
                    <input type="submit" name="encrypt_now" value="Enkripsi File" class="btn bg-gradient-info ">
                  </input>
                  </div>
                  </fieldset>
                </form>
                  <div class="card-footer p-1">

                  </div>
              
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END KETERANGAN -->

            <!-- footer -->
<?php include('layout/footer.php'); ?>
