<?php
include '../../includes/auth.php'; 
include '../../config/koneksi.php'; 


// Ambil ID dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query Hapus
    $query = mysqli_query($koneksi, "DELETE FROM barang WHERE kode_barang = '$id'");

    if ($query) {
        echo "<script>alert('Data Berhasil Dihapus!'); window.location='barang.php';</script>";
    } else {
        echo "<script>alert('Gagal Menghapus Data!'); window.location='barang.php';</script>";
    }
} else {
    // Jika tidak ada ID, kembalikan ke halaman barang
    header("Location: barang.php");
}
?>