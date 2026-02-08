<?php
include '../includes/auth.php'; 
include '../config/koneksi.php'; 
include '../includes/header.php';
include '../includes/sidebar-admin.php';

$barang = mysqli_fetch_row(mysqli_query($koneksi,"SELECT COUNT(*) FROM barang"))[0];
$transaksi = mysqli_fetch_row(mysqli_query($koneksi,"SELECT COUNT(*) FROM penjualan"))[0];
$total = mysqli_fetch_row(mysqli_query($koneksi,"SELECT SUM(total) FROM penjualan"))[0];
$query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM barang");

?>

<div class="content">
    <h1>Dashboard VeloSpare</h1>
    <div class="card-container">
        <div class="card">
            <span>Total Barang</span>
            <b><?= $barang ?></b>
        </div>
        <div class="card">
            <span>Total Transaksi</span>
            <b><?= $transaksi ?></b>
        </div>
        <div class="card">
            <span>Total Pendapatan</span>
            <b>Rp <?= number_format($total, 0, ',', '.') ?></b>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
