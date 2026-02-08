<?php
include '../../includes/auth.php'; 
include '../../config/koneksi.php'; 
include '../../includes/header.php';
include '../../includes/sidebar-admin.php';

// Logika Simpan Data
if (isset($_POST['simpan'])) {
    $kode   = mysqli_real_escape_string($koneksi, $_POST['kode_barang']);
    $nama   = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
    $beli   = $_POST['harga_beli'];
    $jual   = $_POST['harga_jual'];
    $satuan = $_POST['satuan'];

    $query = mysqli_query($koneksi, "INSERT INTO barang VALUES ('$kode', '$nama', '$beli', '$jual', '$satuan')");

    if ($query) {
        echo "<script>alert('Data Berhasil Ditambah!'); window.location='barang.php';</script>";
    } else {
        echo "<script>alert('Gagal Menambah Data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<div class="content">
    <div class="form-container glass-container">
        <div class="form-header">
            <h2><span class="icon">➕</span> Tambah Stok Barang</h2>
            <p>Masukkan detail sparepart baru ke dalam sistem</p>
        </div>

        <form action="" method="POST" class="velo-form">
            <div class="input-group">
                <label>Kode Barang</label>
                <input type="text" name="kode_barang" placeholder="Contoh: BRG001" required autofocus>
            </div>

            <div class="input-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" placeholder="Nama Sparepart" required>
            </div>

            <div class="input-row">
                <div class="input-group">
                    <label>Harga Beli (Rp)</label>
                    <input type="text" name="harga_beli" placeholder="0" required>
                </div>
                <div class="input-group">
                    <label>Harga Jual (Rp)</label>
                    <input type="text" name="harga_jual" placeholder="0" required>
                </div>
            </div>

            <div class="input-group">
                <label>Satuan</label>
                <select name="satuan" required>
                    <option value="" disabled selected>Pilih Satuan</option>
                    <option value="Pcs">Pcs</option>
                    <option value="Unit">Unit</option>
                    <option value="Set">Set</option>
                    <option value="Botol">Botol</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" name="simpan" class="btn-save">Simpan Barang</button>
                <a href="../barang/table-barang.php" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>