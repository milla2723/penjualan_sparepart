<?php
include '../../config/koneksi.php';

// Perintah agar file didownload sebagai Excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Penjualan_Velospare.xls");
?>

<h2>Laporan Penjualan Velospare</h2>

<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>No. Faktur</th>
            <th>Konsumen</th>
            <th>Kode Barang</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Total</th>
            <th>Bayar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        // Ambil data dari database
        $query = mysqli_query($koneksi, "SELECT * FROM penjualan ORDER BY tanggal DESC");
        while($row = mysqli_fetch_assoc($query)){
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td><?= $row['no_faktur']; ?></td>
            <td><?= $row['nama_konsumen']; ?></td>
            <td><?= $row['kode_barang']; ?></td>
            <td><?= $row['jumlah']; ?></td>
            <td><?= $row['harga_satuan']; ?></td>
            <td><?= $row['total']; ?></td>
            <td><?= $row['bayar']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>