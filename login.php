<?php
session_start();
require 'fungsi.php';

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // Cek username
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        // Cek password
        if (password_verify($password, $row["password"])) {
            // Set session
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
</head>
<body>
    <h2>Halaman Login</h2>
    
    <?php if(isset($error)) : ?>
        <p style="color: red; font-style: italic;">Username / Password salah!</p>
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
    <p>Belum punya akun? <a href="register.php">Register di sini</a></p>
</body>
</html>