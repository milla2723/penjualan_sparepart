<?php
include '../../includes/auth.php'; 
include '../../config/koneksi.php'; 
include '../../includes/header.php';
include '../../includes/sidebar-admin.php';

// Ambil data dari tabel penjualan
$query = mysqli_query($koneksi, "SELECT * FROM penjualan ORDER BY id DESC");
?>

<div class="content">
    <div class="table-header">
        <h1>Laporan Penjualan</h1>
        <a href="../laporan/export-excel.php" class="btn-action" style="background: #27ae60; text-decoration: none; color: white; padding: 5px 10px; border-radius: 3px;">
   <i class="fa fa-file-excel"></i> Export Excel
</a>
    </div>

    <div class="glass-container">
        <table class="velo-table">
            <thead>
                <tr>
                    <th>No. Faktur</th>
                    <th>Tanggal</th>
                    <th>Konsumen</th>
                    <th>Total Bayar</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($query)): ?>
                <tr>
                    <td class="code-text"><?= $row['no_faktur']; ?></td>
                    <td><?= date('d/m/Y', strtotime($row['tanggal'])); ?></td>
                    <td><?= $row['nama_konsumen']; ?></td>
                    <td style="font-weight: bold; color: #f1c40f;">Rp <?= number_format($row['total'], 0, ',', '.'); ?></td>
                    <td class="text-center">
                        <div class="action-group">
                            <a href="detail.php?id=<?= $row['id']; ?>" class="btn-small btn-edit">Detail</a>
                            <a href="cetak-struk.php?id=<?= $row['id']; ?>" target="_blank" class="btn-small" style="background: #8e44ad;">Cetak</a>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>