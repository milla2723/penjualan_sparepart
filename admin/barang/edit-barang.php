<?php
include '../../includes/auth.php'; 
include '../../config/koneksi.php'; 
include '../../includes/header.php';
include '../../includes/sidebar-admin.php';

// Ambil ID dari URL
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM barang WHERE kode_barang = '$id'");
$row = mysqli_fetch_assoc($data);

// Logika Update Data
if (isset($_POST['update'])) {
    $kode   = mysqli_real_escape_string($koneksi, $_POST['kode_barang']);
    $nama   = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
    $beli   = $_POST['harga_beli'];
    $jual   = $_POST['harga_jual'];
    $satuan = $_POST['satuan'];

    $query = mysqli_query($koneksi, "UPDATE barang SET 
              nama_barang = '$nama', 
              harga_beli = '$beli', 
              harga_jual = '$jual', 
              satuan = '$satuan' 
              WHERE kode_barang = '$kode'");

    if ($query) {
        echo "<script>alert('Data Berhasil Diperbarui!'); window.location='barang.php';</script>";
    } else {
        echo "<script>alert('Gagal Memperbarui Data!');</script>";
    }
}
?>

<div class="content">
    <div class="form-container glass-container">
        <div class="form-header">
            <h2><span class="icon">📝</span> Edit Data Barang</h2>
            <p>Ubah informasi untuk kode barang: <b><?= $id; ?></b></p>
        </div>

        <form action="" method="POST" class="velo-form">
            <div class="input-group">
                <label>Kode Barang</label>
                <input type="text" name="kode_barang" value="<?= $row['kode_barang']; ?>" readonly style="background: rgba(255,255,255,0.1); color: #aaa;">
            </div>

            <div class="input-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" value="<?= $row['nama_barang']; ?>" required>
            </div>

            <div class="input-row">
                <div class="input-group">
                    <label>Harga Beli (Rp)</label>
                    <input type="text" name="harga_beli" value="<?= $row['harga_beli']; ?>" required>
                </div>
                <div class="input-group">
                    <label>Harga Jual (Rp)</label>
                    <input type="text" name="harga_jual" value="<?= $row['harga_jual']; ?>" required>
                </div>
            </div>

            <div class="input-group">
                <label>Satuan</label>
                <select name="satuan" required>
                    <option value="Pcs" <?= $row['satuan'] == 'Pcs' ? 'selected' : ''; ?>>Pcs</option>
                    <option value="Unit" <?= $row['satuan'] == 'Unit' ? 'selected' : ''; ?>>Unit</option>
                    <option value="Set" <?= $row['satuan'] == 'Set' ? 'selected' : ''; ?>>Set</option>
                    <option value="Botol" <?= $row['satuan'] == 'Botol' ? 'selected' : ''; ?>>Botol</option>
                </select>
            </div>

            <div class="form-actions">
                <a href="../barang/table-barang.php" type="submit" class="btn-save" style="text-decoration: none; border: none; cursor: pointer; text-align:center " >Simpan Barang</a>
                <a href="../barang/table-barang.php" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>