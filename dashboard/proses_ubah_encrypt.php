<?php 
session_start();
include('../config.php');

if(empty($_SESSION['username'])){
  header("location:../index.php");
}

// Hanya admin yang dapat mengakses halaman ini
if($_SESSION['status'] !== 'admin') {
    header("location:./index.php");
}

  $id_file = mysqli_real_escape_string($koneksi, $_POST['fileid']);
  $username = mysqli_real_escape_string($koneksi, $_POST['username']);
  $password = (!empty($_POST['pwdFile'])) ? mysqli_real_escape_string($koneksi, md5($_POST['pwdFile'])) : null;
  $fullname = mysqli_real_escape_string($koneksi, $_POST['fullname']);
  $pekerjaan = mysqli_real_escape_string($koneksi, $_POST['pekerjaan']);
  $status = mysqli_real_escape_string($koneksi, $_POST['status']);

  // validasi username unik
  $query_check_username = mysqli_query($koneksi,"SELECT * FROM users WHERE username='$username' AND id_user != '$id_user'");
  if(mysqli_num_rows($query_check_username) > 0) {
    // jika username sudah ada di database
    //set session user_dobel
    $_SESSION["user_dobel1"] = 'Username sudah digunakan, silakan gunakan username lain.';
    header("Location: ubah_user.php?id_user=$id_user");
    exit;
  } else {
    // jika username belum ada di database, lakukan UPDATE
    $query = mysqli_query($koneksi, "UPDATE users SET username='$username', password=" . ($password === null ? "password" : "'$password'") . ", fullname='$fullname', job_title='$pekerjaan', status='$status' WHERE id_user='$id_user'");

    if($query){
      //set session sukses_ubahuser
      $_SESSION["sukses_ubahuser"] = 'Berhasil mengubah pengguna';
      header("Location: daftar_user.php");
      exit;
    } else {
      echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
      exit;
    }
  }
?>
