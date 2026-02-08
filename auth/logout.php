<?php
// 1. Memulai session
session_start();

// 2. Menghapus semua data di session
session_unset(); // Opsional: mengosongkan variabel session
session_destroy(); // Menghapus file session di server

// 3. Langsung pindah ke halaman login menggunakan Header PHP (lebih cepat)
header("Location: ../auth/login.php");
exit();
?>