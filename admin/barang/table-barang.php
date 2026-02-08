<?php
include '../../includes/auth.php'; 
include '../../config/koneksi.php'; 
include '../../includes/header.php';
include '../../includes/sidebar-admin.php';
$query = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY kode_barang ASC");
?>

<div class="content">
    <div class="table-header">
        <h1>Master Barang</h1>
        <a href="tambah-barang.php" class="btn-action btn-tambah">
            <span class="icon">+</span> Tambah Barang Baru
        </a>
        <a href="cetak.php" class="btn-action btn-excel" style="background: #27ae60; border-color: #219150;">
            <span class="icon"></span> Cetak Excel
        </a>
    </div>

    <div class="glass-container">
        <table class="velo-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Produk</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Satuan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                while($row = mysqli_fetch_assoc($query)): 
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td class="code-text"><?= $row['kode_barang']; ?></td>
                    <td class="name-text"><?= $row['nama_barang']; ?></td>
                    <td>Rp <?= number_format($row['harga_beli'], 0, ',', '.'); ?></td>
                    <td>Rp <?= number_format($row['harga_jual'], 0, ',', '.'); ?></td>
                    <td><span class="badge"><?= $row['satuan']; ?></span></td>
                    <td>
                        <div class="action-group">
                            <a href="edit-barang.php?id=<?= $row['kode_barang']; ?>" class="btn-small btn-edit">Edit</a>
                            <a href="hapus-barang.php?id=<?= $row['kode_barang']; ?>" class="btn-small btn-delete" onclick="return confirm('Hapus barang ini?')">Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>