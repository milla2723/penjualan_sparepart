<?php
include '../../includes/auth.php'; 
include '../../config/koneksi.php'; 
include '../../includes/header.php';
include '../../includes/sidebar-kasir.php';

$query = mysqli_query($koneksi, "SELECT * FROM penjualan ORDER BY id DESC");
?>

<div class="content">
    <div class="table-header">
        <h1>Riwayat Penjualan</h1>
    </div>
    <div class="glass-container">
        <table class="velo-table">
            <thead>
                <tr>
                    <th>Faktur</th>
                    <th>Konsumen</th>
                    <th>Total</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
    <?php while($row = mysqli_fetch_assoc($query)): ?>
    <tr>
        <td><?= $row['no_faktur']; ?></td>
        <td><?= $row['nama_konsumen']; ?></td>
        <td>Rp <?= number_format($row['total'], 0, ',', '.'); ?></td>
        <td>
           <a href="/penjualan_sparepart/admin/laporan/cetak-struk.php?id=<?= $row['id']; ?>" 
   target="_blank" 
   class="btn-small" 
   style="background:#8e44ad; color:white; padding: 5px 10px; border-radius:3px; text-decoration:none;">
   <i class="fa fa-print"></i> Struk
</a>
        </td>
    </tr>
    <?php endwhile; ?>
</tbody>
        </table>
    </div>
</div>
<?php include '../../includes/footer.php'; ?>