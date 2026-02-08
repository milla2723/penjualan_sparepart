<?php
include '../../includes/auth.php'; 
include '../../config/koneksi.php'; 
include '../../includes/header.php';
include '../../includes/sidebar-kasir.php';

// Auto-faktur
$tgl = date('Ymd');
$q_f = mysqli_query($koneksi, "SELECT max(no_faktur) as maxK FROM penjualan WHERE no_faktur LIKE 'INV-$tgl%'");
$d_f = mysqli_fetch_array($q_f);
$no = (int) substr($d_f['maxK'] ?? '', 13, 3);
$faktur = "INV-" . $tgl . "-" . sprintf("%03s", ++$no);
?>

<div class="content">
    <div class="table-header">
        <h1>Input Penjualan</h1>
    </div>
    <div class="glass-container">
        <form action="simpan.php" method="POST" class="velo-form">
            <div class="input-row">
                <div class="input-group">
                    <label>No. Faktur</label>
                    <input type="text" name="no_faktur" value="<?= $faktur; ?>" readonly>
                </div>
                <div class="input-group">
                    <label>Nama Konsumen</label>
                    <input type="text" name="nama_konsumen" required placeholder="Nama Pembeli">
                </div>
            </div>
            <div class="input-row">
                <div class="input-group">
                    <label>Barang</label>
                    <select name="kode_barang" id="pilih_barang" required onchange="updateHarga()">
                        <option value="">-- Pilih Barang --</option>
                        <?php
                        $brg = mysqli_query($koneksi, "SELECT * FROM barang");
                        while($b = mysqli_fetch_assoc($brg)) {
                            echo "<option value='".$b['kode_barang']."' data-harga='".$b['harga_jual']."'>".$b['nama_barang']."</option>";
                        }
                        ?>
                    </select>
                </div>
                 <div class="input-group">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" min="1" value="1" oninput="hitung()">
                </div>
                <div class="input-group">
        <label>Uang Bayar</label>
        <input type="text" name="bayar" id="bayar" required placeholder="0" oninput="hitungKembali()">
    </div>
    <div class="input-group">
        <label>Kembalian</label>
        <input type="number" id="kembali" readonly style="color: #2ecc71; background: rgba(0,0,0,0.2);">
    </div>

            </div>
            
            <div class="input-group">
                <label>Total Bayar</label>
                <input type="hidden" name="harga_satuan" id="harga_satuan">
                <input type="number" name="total" id="total" readonly style="font-size: 20px; color: #f1c40f; background: rgba(0,0,0,0.2);">
            </div>
            <button type="submit" name="proses" class="btn-save">Simpan & Cetak Struk</button>
        </form>
    </div>
</div>

<script>
function updateHarga() {
    const sel = document.getElementById('pilih_barang');
    const hrg = sel.options[sel.selectedIndex].getAttribute('data-harga');
    document.getElementById('harga_satuan').value = hrg;
    hitung();
}

function hitung() {
    const hrg = document.getElementById('harga_satuan').value || 0;
    const qty = document.getElementById('jumlah').value || 0;
    const total = hrg * qty;
    document.getElementById('total').value = total;
    hitungKembali(); // Update kembali saat total berubah
}

function hitungKembali() {
    const total = document.getElementById('total').value || 0;
    const bayar = document.getElementById('bayar').value || 0;
    const kembali = bayar - total;
    document.getElementById('kembali').value = kembali;
}
</script>
<?php include '../../includes/footer.php'; ?>