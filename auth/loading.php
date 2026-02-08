<?php
session_start();

// Cek apakah user sudah login, jika belum kembalikan ke login
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit;
}

$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memproses... - SIAKAD</title>
    <link rel="stylesheet" href="../assets/css/loading.css">
</head>
<body>
    <div class="loading-content">
        <div class="spinner-box">
            <div class="loader"></div>
        </div>
        <h2 style="margin-top: 20px; opacity: 0.8;">Menyiapkan halaman dashboard anda...</h2>
    </div>

    <script>
    // Deteksi role dan arahkan ke folder masing-masing
    const role = "<?php echo $role; ?>";
    
    setTimeout(function() {
        if (role === 'admin') {
            // Ditambah ../ agar keluar dari folder auth ke folder utama
            window.location.href = "../admin/dashboard-admin.php"; 
        } else if (role === 'kasir') {
            // Ditambah ../ agar keluar dari folder auth ke folder utama
            window.location.href = "../kasir/dashboard-kasir.php";
        } else {
            // Jika tidak ada role, tetap di login.php (satu folder)
            window.location.href = "login.php";
        }
    }, 2000); // Delay 2 detik agar keren
</script>
</body>
</html>