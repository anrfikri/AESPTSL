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
  <title>Daftar User</title>
  
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
                <h6 class="text-white text-capitalize ps-3">Daftar Pengguna Aplikasi</h6>
              </div>
              <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active">Daftar Pengguna Aplikasi</li>
              </ol>
            </div>
            <div class="card-body px-3 pb-2">
              <a type="button" class="btn btn-success mb-2" href="tambah_user.php" >
                    <div class="fas fa-plus"></div> Tambah Pengguna
                    </a>
                <hr class="dark horizontal my-0">
                  <div class="card-footer p-3">
                    
<!-- tabel -->
            <table id="tabelku" class="table table-bordered responsive display nowrap" width="80%">
              <thead class="bg-gradient-info text-white">
                <tr>
                  <td><strong>No</strong></td>
                  <td><strong>Username</strong></td>
                  <td><strong>Nama Lengkap</strong></td>
                  <td><strong>Pekerjaan</strong></td>
                  <td><strong>Tanggal Bergabung</strong></td>
                  <td><strong>Aktivitas Terakhir</strong></td>
                  <td><strong>Status</strong></td>
                  <td><strong>Opsi</strong></td>
                </tr>
              </thead>

               <tbody>
                        <?php
                        // Menampilkan data memakai perulangan while dari tabel file
                          $i = 1;
                          $query = mysqli_query($koneksi,"SELECT * FROM users");
                          while ($data = mysqli_fetch_array($query)) { ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['fullname']; ?></td>
                            <td><?php echo $data['job_title']; ?></td>
                            <td><?php echo $data['join_date']; ?></td>
                            <td><?php echo $data['last_activity']; ?></td>
                            <td><?php echo $data['status']; ?></td>
                            <td>
                              <?php
                              $a = $data['id_user'];
                              echo '<a href="ubah_user.php?id_user='.$a.'" class="btn bg-gradient-info">Ubah</a>';
                              echo '<a href="proses_hapus_user.php?id_user='.$a.'" class="btn bg-gradient-danger tombol-hapus ms-2">Hapus</a>';
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

      <!-- footer -->
<?php include('layout/footer.php'); ?>
  