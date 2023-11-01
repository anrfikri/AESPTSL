<?php 
session_start();
include('../config.php');

if(empty($_SESSION['username'])){
  header("location:../index.php");
}

if(isset($_GET['id_file'])){

  $id_file = mysqli_real_escape_string($koneksi, $_GET['id_file']);
  
  $query = mysqli_query($koneksi, "SELECT file_name_finish FROM file WHERE id_file='$id_file'");
  
  if(mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_array($query);
    $namafile = $data['file_name_finish'];
    $file_path = 'file_encrypt/' . $namafile;
    
    if(!empty($namafile) && file_exists($file_path)){
      unlink($file_path); // menghapus file di dalam folder file_encrypt
    }
  }

  $query = mysqli_query($koneksi, "DELETE FROM file WHERE id_file='$id_file'");

  if($query){
    //set session sukses_hapusfile
    $_SESSION["sukses_hapusfile"] = 'Berhasil menghapus file';
    header("Location: daftar_file.php");
    exit;
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    exit;
  }
}
?>
