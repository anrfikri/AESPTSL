<?php
session_start();
include "../config.php";

// Mengambil hasil inputan file yang ingin di dekripsi dan dikelola lalu, dicocokan dengan password yang pernah kita buat
$idfile = mysqli_escape_string($koneksi, $_POST['fileid']);
$pwdfile = mysqli_escape_string($koneksi, substr(md5($_POST["pwdfile"]), 0, 16));
$query = "SELECT password, file_url, file_name_source, file_size FROM file WHERE id_file='$idfile' AND password='$pwdfile'";
$sql = mysqli_query($koneksi, $query);

// Jika memang benar maka akan diproses dekripsi filenya
if (mysqli_num_rows($sql) > 0) {
    $sql1 = mysqli_query($koneksi, "SELECT * FROM file WHERE id_file='$idfile'");
    $data = mysqli_fetch_assoc($sql1);

    $file_path = $data["file_url"];
    $key = $data["password"];
    $file_name = $data["file_name_source"];
    $size = $data["file_size"];

    $file_size = filesize($file_path);

    $file_source = fopen($file_path, 'rb');

    // Query untuk mengupdate file yang statusnya menjadi 2 nilainya
    $query2 = "UPDATE file SET status='2' WHERE id_file='$idfile'";
    $sql2 = mysqli_query($koneksi, $query2);

    $cache = "file_decrypt/$file_name";

    $file_output = fopen($cache, 'wb');

    // Catat waktu mulai dekripsi
    $start_time = microtime(true);

    // Membaca seluruh data dari file sumber
    $data = fread($file_source, $file_size);

    // Dekripsi menggunakan OpenSSL
    $decipher = openssl_decrypt($data, 'aes-128-ecb', $key, OPENSSL_RAW_DATA);

    // Menulis hasil dekripsi ke file
    fwrite($file_output, $decipher);

    // Catat waktu selesai dekripsi
    $end_time = microtime(true);
    // Hitung total waktu yang dibutuhkan untuk dekripsi
    $total_time = $end_time - $start_time;
    // Konversi total waktu ke format detik dengan 5 angka di belakang koma
    $total_time_in_seconds = round($total_time, 5);

    // Update waktu dekripsi ke dalam database
    $query3 = mysqli_query($koneksi, "UPDATE file SET decrypt_time ='$total_time_in_seconds' WHERE file_name_source = '$file_name'");

    fclose($file_source);
    fclose($file_output);

    // Set session sukses_decrypt
    $_SESSION["sukses_decrypt"] = 'Berhasil mendekripsi file, silahkan download file anda.';
    header("Location: decrypt.php");
    exit;
} else {
    // Set session eror_decrypt
    $_SESSION["eror_decrypt"] = 'Maaf, Password tidak sesuai.';
    header("Location: decrypt-file.php?id_file=$idfile");
    exit;
}
?>
