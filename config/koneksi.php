<?php
$koneksi = mysqli_connect("localhost", "root", "", "sparepart_db");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>