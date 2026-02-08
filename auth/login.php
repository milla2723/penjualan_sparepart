<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body class="login-body">

    <div class="login-box">
        <h2>Masuk VeloSpare</h2>

        <form method="POST" action="proses-login.php" onsubmit="return handleLogin()">
            <input type="text" name="user" placeholder="Username" required>
            <input type="password" name="pass" placeholder="Password" required>

            <select name="role" required>
                <option value="">Pilih Akses</option>
                <option value="admin">Admin</option>
                <option value="kasir">Kasir</option>
            </select>

            <button type="submit">Login</button>
        </form>

        <p class="footer-text">© 2024 VeloSpare Indonesia</p>
    </div>
</body>
</html>
