<?php
include '../../includes/auth.php'; 
include '../../config/koneksi.php'; 
include '../../includes/header.php';
include '../../includes/sidebar-admin.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);
?>

<div class="content">
    <div class="table-header">
        <h1>Detail Transaksi</h1>
        <a href="penjualan.php" class="btn-action">Kembali</a>
    </div>

    <div class="glass-container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
            <div>
                <p style="opacity: 0.7;">No. Faktur:</p>
                <h3 class="code-text"><?= $data['no_faktur']; ?></h3>
            </div>
            <div style="text-align: right;">
                <p style="opacity: 0.7;">Nama Konsumen:</p>
                <h3><?= $data['nama_konsumen']; ?></h3>
            </div>
        </div>

        <table class="velo-table">
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $data['kode_barang']; ?></td>
                    <td>Rp <?= number_format($data['harga_satuan'], 0, ',', '.'); ?></td>
                    <td><?= $data['jumlah']; ?></td>
                    <td style="color: #f1c40f; font-weight: bold;">Rp <?= number_format($data['total'], 0, ',', '.'); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>