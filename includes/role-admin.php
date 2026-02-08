<?php
if($_SESSION['role'] != 'admin'){
    echo "<script>alert('Akses ditolak!');history.back();</script>";
    exit;
}
?>