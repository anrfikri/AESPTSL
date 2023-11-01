<?php 
session_start();
include('../config.php');

if(empty($_SESSION['username'])){
  header("location:../index.php");
}


if(isset($_GET['id_user'])){
  $id_user = mysqli_real_escape_string($koneksi, $_GET['id_user']);
  
  $query = mysqli_query($koneksi, "DELETE FROM users WHERE id_user='$id_user'");
  
  if($query){
    //set session sukses_hapususer
    $_SESSION["sukses_hapususer"] = 'Berhasil menghapus pengguna';
    header("Location: daftar_user.php");
    exit;
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    exit;
  }
}
?>
