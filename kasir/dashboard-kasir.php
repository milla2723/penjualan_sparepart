<?php
include '../includes/auth.php'; 
include '../config/koneksi.php'; 
include '../includes/header.php';
include '../includes/sidebar-kasir.php'; // Sesuaikan jika ada sidebar khusus kasir

// Mengambil total transaksi hari ini
$tgl_hari_ini = date('Y-m-d');
$query_sales = mysqli_query($koneksi, "SELECT SUM(total) as omzet FROM penjualan WHERE tanggal = '$tgl_hari_ini'");
$data_sales = mysqli_fetch_assoc($query_sales);
?>

<div class="content">
    <div class="table-header">
        <h1>Dashboard Kasir</h1>
        <p>Selamat datang, <b><?= $_SESSION['username']; ?></b></p>
    </div>

    <div class="glass-container" style="display: flex; gap: 20px;">
        <div class="stat-card" style="background: rgba(46, 204, 113, 0.2); padding: 20px; border-radius: 10px; flex: 1; border: 1px solid #2ecc71;">
            <h3>Omzet Hari Ini</h3>
            <h2 style="color: #2ecc71;">Rp <?= number_format($data_sales['omzet'] ?? 0, 0, ',', '.'); ?></h2>
        </div>
        <div class="stat-card" style="background: rgba(52, 152, 219, 0.2); padding: 20px; border-radius: 10px; flex: 1; border: 1px solid #3498db;">
            <a href="../kasir/master_penjualan/penjualan.php"
   style="text-decoration:none; color:inherit; display:block; position:relative; z-index:10;">
                <h3>Transaksi Baru</h3>
                <p>Klik untuk buka kasir</p>
            </a>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>