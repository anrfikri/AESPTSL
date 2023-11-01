<?php
session_start();
include "../config.php";   // Memasukkan koneksi

if (isset($_POST['encrypt_now'])) {
    // Mengambil inputan dari form isian file yaitu ada user, password file, dan deskripsi
    $user = $_SESSION['username'];
    $key = mysqli_escape_string($koneksi, substr(md5($_POST["pwdfile"]), 0, 16));
    $deskripsi = mysqli_escape_string($koneksi, $_POST['desc']);
    $file_tmpname = $_FILES['file']['tmp_name'];
    // Memberi angka random di depan nama file awal agar unik
    $file = rand(1000, 100000) . "-" . $_FILES['file']['name'];
    $new_file_name = strtolower($file);
    $final_file = str_replace(' ', '-', $new_file_name);
    // Memberi angka random di depan nama file yang terenkripsi agar unik
    $filename = rand(1000, 100000) . "-" . pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
    $new_filename = strtolower($filename);
    $finalfile = str_replace(' ', '-', $new_filename);
    $size = filesize($file_tmpname);
    $size2 = (filesize($file_tmpname)) / 1024;
    $info = pathinfo($final_file);
    $file_source = fopen($file_tmpname, 'rb');
    $ext = $info["extension"];

    if ($size2 > 3084) {
        $_SESSION["errsize"] = 'Maaf, file tidak bisa lebih besar dari 3MB.';
        header("Location: encrypt_file.php");
        exit();
    }

    if ($ext == "xls" || $ext == "xlsx" || $ext == "doc" || $ext == "docx") {

        // Query untuk memasukkan inputan file yang akan dienkripsi
        $query1 = mysqli_query($koneksi, "INSERT INTO file VALUES ('', '$user', '$final_file', '$finalfile.anrf', '', '$size2', '$key', now(), '1', '$deskripsi', '','')");

        $query2 = mysqli_query($koneksi, "SELECT * FROM file WHERE file_url =''");

        // File yang masuk akan dienkripsi dan diubah ekstensinya menjadi .anrf
        $url = $finalfile . ".anrf";
        $file_url = "file_encrypt/$url";

        // Diupdate nama file yang sudah dienkripsi tadi kedalam database
        $query3 = mysqli_query($koneksi, "UPDATE file SET file_url ='$file_url' WHERE file_url=''");

        $file_output = fopen($file_url, 'wb'); // Membuat file biner untuk menulis

        // Catat waktu mulai enkripsi
        $start_time = microtime(true);

        if (is_uploaded_file($file_tmpname)) {
            ini_set('max_execution_time', -1);
            ini_set('memory_limit', -1);

            $data = fread($file_source, $size); // Membaca seluruh data dari file sumber

            $cipher = openssl_encrypt($data, 'aes-128-ecb', $key, OPENSSL_RAW_DATA);

            fwrite($file_output, $cipher);

            // Catat waktu selesai enkripsi
            $end_time = microtime(true);
            // Hitung total waktu yang dibutuhkan untuk enkripsi
            $total_time = $end_time - $start_time;
            // Konversi total waktu ke format detik dengan 5 angka dibelakang koma
            $total_time_in_seconds = round($total_time, 5);

            // Update waktu enkripsi kedalam database
            $query4 = mysqli_query($koneksi, "UPDATE file SET encrypt_time ='$total_time_in_seconds' WHERE encrypt_time=''");

            fclose($file_source);
            fclose($file_output);

            // Notifikasi jika enkripsi berhasil dilakukan
            $_SESSION["sukses_encrypt"] = 'Enkripsi berhasil.';
            header("Location: daftar_file.php");
            exit;
        } else {
            // Notifikasi jika enkripsi gagal dilakukan
            $_SESSION["eror_encrypt"] = 'Enkripsi file mengalami masalah.';
            header("Location: daftar_file.php");
            exit;
        }
    } else {
        $_SESSION["errext"] = 'Maaf, file yang bisa dienkripsi hanya .xls, .xlsx, .doc, dan .docx';
        header("Location: encrypt_file.php");
        exit();
    }
}
?>
