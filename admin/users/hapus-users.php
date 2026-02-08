<?php
include '../../includes/auth.php';
include '../../config/koneksi.php';

// Pastikan ada ID yang dikirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Gunakan prepared statement untuk keamanan (mencegah SQL Injection)
    $stmt = mysqli_prepare($koneksi, "DELETE FROM users WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        // Jika berhasil, arahkan kembali ke tabel dengan status sukses
        echo "<script>
                alert('Data pengguna berhasil dihapus!');
                window.location.href = 'table-users.php';
              </script>";
    } else {
        // Jika gagal, tampilkan pesan error
        echo "<script>
                alert('Gagal menghapus data: " . mysqli_error($koneksi) . "');
                window.location.href = 'table-users.php';
              </script>";
    }

    mysqli_stmt_close($stmt);
} else {
    // Jika tidak ada ID, langsung balikkan ke halaman utama
    header("Location: table-users.php");
    exit();
}
?>