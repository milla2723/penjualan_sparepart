<?php
include '../../includes/auth.php'; 
include '../../config/koneksi.php'; 

// 1. Validasi ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ID Transaksi tidak ditemukan!'); window.close();</script>";
    exit;
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

// 2. Ambil data transaksi (Gunakan JOIN jika ingin nama barang muncul)
$query = mysqli_query($koneksi, "SELECT penjualan.*, barang.nama_barang 
                                 FROM penjualan 
                                 LEFT JOIN barang ON penjualan.kode_barang = barang.kode_barang 
                                 WHERE penjualan.id = '$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Data tidak ditemukan di database!'); window.close();</script>";
    exit;
}

// 3. Variabel Bayar & Kembali
$total   = $data['total'];
$bayar   = isset($data['bayar']) ? $data['bayar'] : 0;
$kembali = $bayar - $total;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk - <?= $data['no_faktur']; ?></title>
    <style>
        body { 
            font-family: 'Courier New', Courier, monospace; 
            width: 70mm; 
            margin: 0 auto; 
            padding: 5px;
            color: #000;
            font-size: 12px;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        hr { border: none; border-top: 1px dashed #000; margin: 8px 0; }
        table { width: 100%; border-collapse: collapse; }
        .footer { font-size: 10px; margin-top: 15px; line-height: 1.2; }
        
        /* Menghilangkan header/footer browser saat print */
        @media print {
            @page { margin: 0; }
            body { margin: 5mm; }
        }
    </style>
</head>
<body onload="window.print();">

    <div class="text-center">
        <h2 style="margin:0; font-size: 16px;">VELOSPARE</h2>
        <p style="margin: 2px 0;">Spesialis Sparepart Motor<br>Jl. Balap No. 99, Indonesia</p>
    </div>

    <hr>

    <table>
        <tr>
            <td>Nota</td>
            <td>: <?= $data['no_faktur']; ?></td>
        </tr>
        <tr>
            <td>Tgl</td>
            <td>: <?= date('d/m/y H:i', strtotime($data['tanggal'])); ?></td>
        </tr>
        <tr>
            <td>Kasir</td>
            <td>: <?= $_SESSION['nama_user'] ?? 'Staff'; ?></td>
        </tr>
    </table>

    <hr>

    <table>
        <thead>
            <tr>
                <th align="left">Item</th>
                <th align="center">Qty</th>
                <th align="right">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding-top: 5px;">
                    <?= $data['nama_barang'] ?? $data['kode_barang']; ?>
                </td>
                <td align="center"><?= $data['jumlah']; ?></td>
                <td align="right"><?= number_format($total, 0, ',', '.'); ?></td>
            </tr>
        </tbody>
    </table>

    <hr>

    <table style="font-weight: bold;">
        <tr>
            <td align="right">TOTAL :</td>
            <td align="right" style="width: 40%;">Rp <?= number_format($total, 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td align="right">BAYAR :</td>
            <td align="right">Rp <?= number_format($bayar, 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td align="right">KEMBALI:</td>
            <td align="right">Rp <?= number_format($kembali, 0, ',', '.'); ?></td>
        </tr>
    </table>

    <hr>

    <div class="text-center footer">
        <p>Terima kasih atas kunjungan Anda!</p>
        <p>-- Layanan: 0812-3456-789 --</p>
        <p style="font-style: italic; margin-top:5px;">Barang yang sudah dibeli tidak dapat ditukar/dikembalikan.</p>
    </div>

</body>
</html>