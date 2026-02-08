<div class="sidebar">
    <h2>VELOSPARE</h2>
    <p>Logged in as: <strong><?= $_SESSION['role']; ?></strong></p>

    <a href="/penjualan_sparepart/kasir/dashboard-kasir.php">Dashboard</a>
    
    <a href="/penjualan_sparepart/kasir/master_penjualan/penjualan.php">Input Penjualan</a>
    <a href="/penjualan_sparepart/kasir/master_penjualan/riwayat.php">Riwayat Transaksi</a>

    <a href="/penjualan_sparepart/auth/logout.php" style="margin-top: 50px; color:#ff7675;">
        Logout
    </a>
</div>