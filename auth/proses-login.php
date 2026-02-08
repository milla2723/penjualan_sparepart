<?php
session_start();
include '../config/koneksi.php';

$user = $_POST['user'];
$pass = $_POST['pass'];

$q = mysqli_query($koneksi,
    "SELECT * FROM users 
     WHERE username='$user' AND password='$pass'"
);

$data = mysqli_fetch_assoc($q);

if($data){
    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['role'];

    header("Location: loading.php");
}else{
    echo "<script>alert('Login gagal');location='login.php';</script>";
}
