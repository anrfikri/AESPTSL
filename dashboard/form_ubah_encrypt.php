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
  <title>Ubah Enkripsi File</title>
  
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
                <h6 class="text-white text-capitalize ps-3">UBAH ENKRIPSI FILE</h6>
              </div>
            </div>
            <div class="card-body px-3 pb-2">
                <hr class="dark horizontal my-0">
                <?php
                //Proses menampilkan data dari table file dimana akan ditampilkan bedasarkan id_file
                $id_file = $_GET['id_file'];
                $query = mysqli_query($koneksi,"SELECT * FROM file WHERE id_file='$id_file'");
                $data2 = mysqli_fetch_array($query);
                ?>
                <h3 align="center">Ubah Enkripsi File <i style="color:blue"><?php echo $data2['file_name_source'] ?></i></h3><br>
                <form role="form" class="text-start" method="post" action="proses_ubah_encrypt.php">
                  <fieldset>
                  <div class="input-group input-group-static mb-4 is-filled">
                    <label class="form-label" for="berkasSumber">Nama Sumber Berkas</label>
                    <input type="text" class="form-control" id="berkasSumber" name="berkasSumber" value="<?php echo $data2['file_name_source']; ?>" disabled>
                  </div>
                  <div class="input-group input-group-static mb-4 is-filled">
                    <label class="form-label" for="berkasEnkripsi">Nama Berkas Enkripsi</label>
                    <input type="text" class="form-control" id="berkasEnkripsi" name="berkasEnkripsi" value="<?php echo $data2['file_name_finish']; ?>" disabled>
                  </div>
                  <div class="input-group input-group-static mb-4 is-filled">
                    <label class="form-label" for="ukuranBerkas">Ukuran Berkas</label>
                    <input type="text" class="form-control" id="ukuranBerkas" name="ukuranBerkas" value="<?php echo $data2['file_size']; ?> KB" disabled>
                  </div>
                  <div class="input-group input-group-static mb-4 is-filled">
                    <label class="form-label" for="tglUpload">Tanggal Upload</label>
                    <input type="text" class="form-control" id="tglUpload" name="tglUpload" value="<?php echo $data2['tgl_upload']; ?>" disabled>
                  </div>
                  <div class="input-group input-group-dynamic mb-4 is-filled">
                    <label class="form-label" for="keterangan">Keterangan File</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $data2['keterangan']; ?>" required>
                  </div>
                  <div class="input-group input-group-dynamic mb-4 is-filled">
                    <label class="form-label" for="inputPassword">Password</label>
                    <input type="hidden" name="fileid" value="<?php echo $data2['id_file'];?>">
                    <input type="password" class="form-control" id="inputPassword" name="pwdFile" placeholder="Kosongkan jika tidak merubah password">
                  </div>
                  <div class="text-start">
                    <input type="submit" name="ubah_enkripsi" class="btn bg-gradient-info" value="UBAH">
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
