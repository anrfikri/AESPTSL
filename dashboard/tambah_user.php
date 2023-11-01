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
  <title>Tambah Pengguna</title>
  
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
                <h6 class="text-white text-capitalize ps-3">TAMBAH PENGGUNA</h6>
              </div>
              <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active"><a href="daftar_user.php">Daftar Pengguna Aplikasi</a></li>
                  <li class="breadcrumb-item active">Tambah Pengguna</li>
              </ol>
            </div>
            <div class="card-body px-3 pb-2">
                <hr class="dark horizontal my-0">
                <form role="form" class="text-start" method="post" action="proses_tambah_user.php">
                  <fieldset><!-- 
                    <input type="hidden" name="id_user" id="id_user"> -->
                  <div class="input-group input-group-static mb-4">
                    <label class="form-label" for="inputUser">Username</label>
                    <input type="text" class="form-control" id="inputUser" name="username" required>
                  </div>
                  <div class="input-group input-group-dynamic mb-4">
                    <label class="form-label" for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="pwdUser" required>
                  </div>
                  <div class="input-group input-group-dynamic mb-4">
                    <label class="form-label" for="inputNama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="inputNama" name="fullname" required>
                  </div>
                  <div class="input-group input-group-dynamic mb-4">
                    <label class="form-label" for="inputPekerjaan">Pekerjaan</label>
                    <input type="text" class="form-control" id="inputPekerjaan" name="pekerjaan" required>
                  </div>
                  <div class="input-group input-group-static mb-4 is-filled">
                    <label class="form-label"for="inputTgl">Tanggal Daftar</label>
                    <input type="date" class="form-control" id="inputTgl" type="text" placeholder="Tanggal" name="datenow" value="<?php echo date("Y-m-d");?>" disabled>
                  </div>
                  <div class="input-group input-group-static mb-4 is-filled">
                    <label class="form-label"for="lastAct">Aktivitas Terakhir</label>
                    <input type="date" class="form-control" id="lastAct" type="text" placeholder="Tanggal" name="lastact" value="<?php echo date("Y-m-d");?>" disabled>
                  </div>
                  <div class="input-group input-group-static mb-4">
                   <label for="inputStatus" class="ms-0">Status</label>
                   <select type="text" class="form-control" id="inputStatus" name="status" >
                     <option>admin</option>
                     <option>user</option>
                   </select>
                 </div>
                  <div class="text-start">
                    <input type="submit" name="submit_user" class="btn bg-gradient-info ">
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
