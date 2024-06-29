<?php

session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = ($_POST['password']);
$cek = mysqli_query($koneksi, "select * from tbl_pengguna 
WHERE username='$username' AND password='$password'");
if (mysqli_num_rows($cek) > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['status'] = "login";
    if ($cookie == 1) {

    }
    header("location:admin/masuk.php");
} else {
    header("location:login.php?pesan=gagal");
}
?>