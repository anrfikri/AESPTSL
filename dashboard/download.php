<?php
session_start ();
include('../config.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}

if (isset($_GET['file'])) {
    $file_name = $_GET['file'];
    $file_path = 'file_decrypt/' . $file_name;
    if(!empty($file_name) && file_exists($file_path)){

        //update status menjadi 1 dan decrypt time menjadi kosong
        $query_update1 = mysqli_query($koneksi, "UPDATE file SET status = 1, decrypt_time = '' WHERE file_name_source = '$file_name'");

        //Download file dan redirect ke halaman decrypt.php
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_path));
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path); // download file
        unlink($file_path); // menghapus file setelah didownload
        //set session sukses_download
        $_SESSION["sukses_download"] = 'Download berhasil';
        header("Location: decrypt.php");
        exit;
    } else {
        //set session eror_download
        $_SESSION["eror_download"] = 'File tidak ditemukan atau telah terdownload';
        header("Location: decrypt.php");
        exit;
    }
}
?>
