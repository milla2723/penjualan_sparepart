<div class="sidebar">
    <h2>VELOSPARE</h2>
    <p>Logged in as: <strong><?= $_SESSION['role']; ?></strong></p>

    <a href="/penjualan_sparepart/admin/dashboard-admin.php">Dashboard</a>

    <?php if($_SESSION['role'] == 'admin'): ?>
        <a href="/penjualan_sparepart/admin/barang/table-barang.php">Master Barang</a>
        <a href="/penjualan_sparepart/admin/laporan/data-penjualan.php">Laporan Penjualan</a>
    <?php endif; ?>

    <a href="../admin/users/table-users.php"> Kelola User</a>
    <a href="/penjualan_sparepart/auth/logout.php" style="margin-top: 50px; color:#ff7675;">
        Logout
    </a>
</div>
