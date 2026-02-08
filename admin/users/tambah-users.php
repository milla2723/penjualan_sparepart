<?php
include '../../includes/auth.php'; 
include '../../config/koneksi.php'; 
include '../../includes/header.php';
include '../../includes/sidebar-admin.php';

if (isset($_POST['simpan'])) {
    // 1. Ambil data dan bersihkan dari karakter berbahaya
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama_user']);
    $user  = mysqli_real_escape_string($koneksi, $_POST['username']);
    $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password
    $role = mysqli_real_escape_string($koneksi, $_POST['lrole']);

    // 2. Query Insert ke kolom yang benar (nama_user dan level)
    $sql = mysqli_query($koneksi, "INSERT INTO users (nama_user, username, password, role) 
                                   VALUES ('$nama', '$user', '$pass', '$role')");

    if ($sql) {
        echo "<script>alert('User Berhasil Ditambah!'); window.location='table-users.php';</script>";
    } else {
        // Jika gagal, tampilkan pesan error spesifik dari MySQL
        echo "<script>alert('Gagal: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<div class="content">
    <div class="form-container glass-container">
        <div class="form-header">
            <h2><span class="icon"></span> Tambah Pengguna Baru</h2>
            <p>Berikan akses sistem kepada staf baru</p>
        </div>

        <form action="" method="POST" class="velo-form">
            <div class="input-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_user" placeholder="Nama Lengkap" required autofocus>
            </div>

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Minimal 6 karakter" required>
            </div>

            <div class="input-group">
                <label>Role</label>
                <select name="role" required>
                    <option value="" disabled selected>-- Pilih Akses --</option>
                    <option value="Kasir">Kasir </option>
                    <option value="Admin">Admin </option>
                </select>
            </div>

            <div class="form-actions" style="text-align: center; margin-top: 20px;">
                <button type="submit" name="simpan" class="btn-save" style="border:none; cursor:pointer; padding: 10px 25px;">
                    Simpan User
                </button>
                <a href="table-users.php" class="btn-cancel" style="text-decoration:none; margin-left: 10px;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>