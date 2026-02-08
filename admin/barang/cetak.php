<?php
include '../config/koneksi.php';

// Perintah untuk mengunduh file sebagai Excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Barang_VeloSpare.xls");

// Ambil data dari database
$query = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY kode_barang ASC");
?>

<h2>Laporan Data Barang VeloSpare</h2>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Produk</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Satuan</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1;
        while($row = mysqli_fetch_assoc($query)): 
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['kode_barang']; ?></td>
            <td><?= $row['nama_barang']; ?></td>
            <td><?= $row['harga_beli']; ?></td>
            <td><?= $row['harga_jual']; ?></td>
            <td><?= $row['satuan']; ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>