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
  <title>Daftar File Terenkripsi dan Terdekripsi</title>
  
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
                <h6 class="text-white text-capitalize ps-3">Daftar File Terenkripsi dan Terdekripsi</h6>
              </div>
              <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active">Daftar File Terenkripsi dan Terdekripsi</li>
              </ol>
            </div>
            <div class="card-body px-3 pb-2">
            <?php
            $v = $_SESSION['username'];
            $query = mysqli_query($koneksi,"SELECT * FROM users WHERE username='$v'");
            $users = mysqli_fetch_array($query);
            if ($users['status'] == 'admin') {
              echo '<a type="button" class="btn btn-success mb-2" href="encrypt_file.php" >
                    <div class="fas fa-plus"></div> Tambah File Enkripsi
                    </a>';
            }
             ?>
              
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
                          <td width="20%"><strong>Ukuran File Awal (KB)</strong></td>
                          <td width="15%"><strong>Waktu Enkripsi (detik)</strong></td>
                          <td width="15%"><strong>Tanggal Upload</strong></td>
                          <td width="15%"><strong>Status File</strong></td>
                          <td width="10%"><strong>Opsi</strong></td>
                        </tr>
                      </thead>
                        <tbody>
                        <?php
                        // Menampilkan data memakai perulangan while dari tabel file
                          $i = 1;
                          $query = mysqli_query($koneksi,"SELECT * FROM file");
                          while ($data = mysqli_fetch_array($query)) { ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data['file_name_source']; ?></td>
                            <td><?php echo $data['file_name_finish']; ?></td>
                            <td><?php echo $data['keterangan']; ?></td>
                            <td><?php echo $data['file_size']; ?></td>
                            <td><?php echo $data['encrypt_time']; ?></td>
                            <td><?php echo $data['tgl_upload']; ?></td>
                            <!-- Pengecekan Apakah Data Tersebut Statusnya sudah Terenkripsi atau Terdekripsi -->
                            <td><?php if ($data['status'] == 1) {
                              echo "Terenkripsi";
                            }elseif ($data['status'] == 2) {
                              echo "Terdekripsi Siap Download";
                            }else {
                              echo "Status Tidak Diketahui";
                            }
                             ?></td>
                            <td>
                              <?php
                              $a = $data['id_file'];
                              if ($data['status'] == 1) {
                                echo '<a href="decrypt-file.php?id_file='.$a.'" class="btn btn-info">Dekripsi File</a>';
                                      if ($users['status'] == 'admin') {
                                        echo '<a href="del_encrypt_file.php?id_file='.$a.'" class="btn btn-danger tombol-hapus ms-2">Hapus File</a>';
                                      }
                              }elseif ($data['status'] == 2) {
                                echo '<a href="decrypt.php" class="btn btn-warning">Beralih Ke Daftar File Terdekripsi</a>';
                              }else {
                                echo '<a href="decrypt.php" class="btn btn-danger">Data Tidak Diketahui</a>';
                              }
                               ?>

                             </td>
                          </tr>
                          <?php
                          $i++;
                        } ?>
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
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>
                      <?php
                          if ($users['status'] == 'admin') {
                            echo '- Untuk menambah file enkripsi silahkan tekan tombol tambah file enkripsi.<br>- Batas ukuran file yang diupload adalah 3MB. <br>- File yang bisa diupload adalah file dengan format XLS, XLSX, DOC, atau DOCX.<br>';
                          }?>
                           - Untuk mendekripsi file klik tombol dekripsi file pada file yang diinginkan. <br>- Apabila proses Dekripsi berhasil, maka otomatis akan diarahkan ke halaman download file.</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
      <!-- END KETERANGAN -->
      <!-- footer -->
<?php include('layout/footer.php'); ?>
  