<?php
include '../../includes/auth.php'; 
include '../../config/koneksi.php'; 
include '../../includes/header.php';
include '../../includes/sidebar-admin.php';

// Ambil data
$query = mysqli_query($koneksi, "SELECT * FROM users ORDER BY id DESC");
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="content">
    <div class="table-header">
        <h1 style="color: white; font-family: 'Orbitron', sans-serif; letter-spacing: 2px;">KELOLA AKUN PENGGUNA</h1>
        <a href="tambah-users.php" class="btn-save" style="text-decoration: none; background: #3498db; padding: 10px 20px; border-radius: 5px; color: white; display: inline-block; font-weight: bold; margin-bottom: 20px;">+ TAMBAH USER</a>
    </div>
    
    <div class="glass-container" style="background: rgba(255, 255, 255, 0.1); padding: 25px; border-radius: 15px; border: 1px solid rgba(255,255,255,0.2); overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; color: white;">
            <thead>
                <tr style="background: rgba(0,0,0,0.5); text-align: left;">
                    <th style="padding: 15px; border-bottom: 2px solid #3498db;">No</th>
                    <th style="padding: 15px; border-bottom: 2px solid #3498db;">Nama Lengkap</th>
                    <th style="padding: 15px; border-bottom: 2px solid #3498db;">Username</th>
                    <th style="padding: 15px; border-bottom: 2px solid #3498db; width: 150px;">Role</th>
                    <th style="padding: 15px; border-bottom: 2px solid #3498db; text-align: center; width: 120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                if (mysqli_num_rows($query) > 0) {
                    while($row = mysqli_fetch_assoc($query)): 
                        $role = $row['level'] ?? '';
                        $bgColor = (strcasecmp($role, 'Admin') == 0) ? '#e74c3c' : '#3498db';
                        $roleDisplay = (!empty($role)) ? strtoupper($role) : 'BELUM DIATUR';
                ?>
                <tr style="border-bottom: 1px solid rgba(255,255,255,0.1); transition: 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.05)'" onmouseout="this.style.background='transparent'">
                    <td style="padding: 15px;"><?= $no++; ?></td>
                    <td style="padding: 15px;"><?= !empty($row['nama_user']) ? $row['nama_user'] : '-'; ?></td>
                    <td style="padding: 15px;"><?= $row['username']; ?></td>
                    <td style="padding: 15px;">
                        <span style="background: <?= $bgColor ?>; padding: 5px 10px; border-radius: 4px; font-size: 11px; font-weight: bold; display: inline-block; width: 100px; text-align: center;">
                            <?= $roleDisplay ?>
                        </span>
                    </td>
                    <td style="padding: 15px; text-align: center; white-space: nowrap;">
                        <a href="hapus-users.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus user ini?')" style="color: #e74c3c; font-size: 1.2rem; text-decoration: none;">
        <i class="fas fa-trash"></i>
    </a>
                    </td>
                </tr>
                <?php 
                    endwhile; 
                } else {
                    echo "<tr><td colspan='5' style='text-align:center; padding: 40px; color: #ccc;'>Data pengguna tidak ditemukan.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>