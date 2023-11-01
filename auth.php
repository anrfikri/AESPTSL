<?php
session_start();
include 'config.php';

$error='';
if (isset($_POST['login'])){
if	(empty($_POST['username']) || empty($_POST['password'])) {
	$error = "Username or Password Tidak Valid!";

}else{

$user = mysqli_real_escape_string($koneksi,$_POST['username']);
$pass = mysqli_real_escape_string($koneksi,$_POST['password']);
$sql = mysqli_query($koneksi,"SELECT username,password FROM users WHERE username='$user' AND password=md5('$pass')");
$rows = mysqli_fetch_array($sql);
	if ($rows) {
		$_SESSION['username']=$user;
		header("location: dashboard/index.php");
} else {
		$_SESSION["eror_login"] = 'Maaf, Username atau Password Salah!';
          header("Location: index.php");
          exit;
		}
	}
}

?>
