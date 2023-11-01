<?php 
session_start ();
include('../config.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}
// Hanya admin yang dapat mengakses halaman ini
if($_SESSION['status'] !== 'admin') {
    header("location:./index.php");
}
  if(isset($_POST['submit_user'])){
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, md5($_POST['pwdUser']));
    $fullname = mysqli_real_escape_string($koneksi, $_POST['fullname']);
    $pekerjaan = mysqli_real_escape_string($koneksi, $_POST['pekerjaan']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);
    
     // validasi username unik
    $query_check_username = mysqli_query($koneksi,"SELECT * FROM users WHERE username='$username'");
    if(mysqli_num_rows($query_check_username) > 0) {
        // jika username sudah ada di database
        //set session user_dobel
        $_SESSION["user_dobel"] = 'Username sudah digunakan, silakan gunakan username lain.';
        header("Location: tambah_user.php");
        exit;
    } else {
        // jika username belum ada di database, lakukan INSERT

    $query = mysqli_query($koneksi,"INSERT INTO users (username,password,fullname,job_title,status,join_date,last_activity) VALUES ('$username', '$password', '$fullname','$pekerjaan', '$status', NOW(), NOW())");
    
    if($query){
        //set session sukses_adduser
        $_SESSION["sukses_adduser"] = 'Berhasil menambahkan pengguna';
        header("Location: daftar_user.php");
        exit;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
  }
} ?>