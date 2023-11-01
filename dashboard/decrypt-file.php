<?php
session_start();
include('../config.php');//memasukan koneksi
if(empty($_SESSION['username'])){//Mengecek apakah user sudah login atau belum, jika belum maka akan diarahkan kehalaman index
header("location:../index.php");
}
// Menampilkan username beserta waktu secara realtime
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
  <title>Dekripsi File</title>
  
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
                <h6 class="text-white text-capitalize ps-3">DEKRIPSI FILE</h6>
              </div>
              <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active"><a href="daftar_file.php">Daftar File Terenkripsi dan Terdekripsi</a></li>
                  <li class="breadcrumb-item active">Dekripsi File</li>
              </ol>
            </div>
            <div class="card-body px-3 pb-2">
                <hr class="dark horizontal my-0">
                <?php
                //Proses menampilkan data dari table file dimana akan ditampilkan bedasarkan id_file
                $id_file = $_GET['id_file'];
                $query = mysqli_query($koneksi,"SELECT * FROM file WHERE id_file='$id_file'");
                $data2 = mysqli_fetch_array($query);
                ?>
                <h3 align="center">Dekripsi FILE <i style="color:blue"><?php echo $data2['file_name_finish'] ?></i></h3><br>
                <form class="form-horizontal" method="post" action="proses_decrypt.php">
                <div class="table-responsive">
                  <table class="table striped">
                       <tr>
                         <td>Nama Sumber Berkas</td>
                         <td>:</td>
                         <td><?php echo $data2['file_name_source']; ?></td>
                       </tr>
                       <tr>
                         <td>Nama Berkas Enkripsi</td>
                         <td>:</td>
                         <td><?php echo $data2['file_name_finish']; ?></td>
                       </tr>
                       <tr>
                         <td>Ukuran Berkas</td>
                         <td>:</td>
                         <td><?php echo $data2['file_size']; ?> KB</td>
                       </tr>
                       <tr>
                         <td>Tanggal Enkripsi</td>
                         <td>:</td>
                         <td><?php echo $data2['tgl_upload']; ?></td>
                       </tr>
                       <tr>
                         <td>Keterangan</td>
                         <td>:</td>
                         <td><?php echo $data2['keterangan']; ?></td>
                       </tr>
                       <tr>
                         <td>Masukkan Password File Untuk Mendekripsi</td>
                         <td></td>
                         <td>
                           <div class="col-md-6">
                            <input type="hidden" name="fileid" value="<?php echo $data2['id_file'];?>">
                           <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="pwdfile" required><br>
                           <input type="submit" name="decrypt_now" value="Dekripsi File" class="form-control btn bg-gradient-info">
                         </div>
                       </td>
                       </tr>
                  </table>
                </div>
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
