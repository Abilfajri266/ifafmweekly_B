<?php
session_start();
require 'fungsi.php';

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = strtolower(stripslashes($_POST["username"]));
    $username = mysqli_real_escape_string($koneksi, $username);
    $password = $_POST["password"];

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["username"] = $username;
            
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="assets/login-style.css">
</head>
<body>
    <h2>Halaman Login</h2>
    
    <?php if(isset($_GET['pesan']) && $_GET['pesan'] == 'sukses') : ?>
        <p class="pesan-sukses">Registrasi berhasil! Silakan login.</p>
    <?php endif; ?>

    <?php if(isset($error)) : ?>
        <p class="pesan-error">Username / Password salah!</p>
    <?php endif; ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" required>
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
    <p class="link-bawah">Belum punya akun? <a href="register.php">Register di sini</a></p>
</body>
</html>