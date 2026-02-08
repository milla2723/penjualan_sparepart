<?php
include '../../config/koneksi.php';

if(isset($_POST['proses'])) {
   $tgl    = date('Y-m-d H:i:s');
    $faktur = $_POST['no_faktur'];
    $nama   = $_POST['nama_konsumen'];
    $kode   = $_POST['kode_barang'];
    $qty    = $_POST['jumlah'];
    $hrg    = $_POST['harga_satuan'];
    $total  = $_POST['total'];
    $bayar  = $_POST['bayar'];
    $sql = mysqli_query($koneksi, "INSERT INTO penjualan (tanggal, no_faktur, nama_konsumen, kode_barang, jumlah, harga_satuan, total, bayar) 
            VALUES ('$tgl', '$faktur', '$nama', '$kode', '$qty', '$hrg', '$total', '$bayar')");
    if($sql) {
        $id_baru = mysqli_insert_id($koneksi);
        
        // Gunakan JavaScript agar bisa membuka TAB BARU untuk struk, 
        // sementara halaman input kembali ke form atau daftar transaksi
        echo "<script>
            window.open('cetak-struk.php?id=$id_baru', '_blank');
            window.location.href = 'penjualan.php'; // Arahkan kembali ke form input
        </script>";
    } else {
        echo "<script>alert('Gagal simpan!'); window.history.back();</script>";
    }
}
?>