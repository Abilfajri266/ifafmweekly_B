<?php
require 'fungsi.php'; 
if (isset($_POST["register"])) {
    $username = strtolower(stripslashes($_POST["username"]));
    $username = strtolower(stripslashes($_POST["username"]));
    $password_mentah = $_POST["password"];
    $password = password_hash($password_mentah, PASSWORD_DEFAULT);
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar!');
              </script>";
    } else {

        mysqli_query($koneksi, "INSERT INTO user (username, password) VALUES ('$username', '$password')");

        if (mysqli_affected_rows($koneksi) > 0) {
            header("Location: login.php?pesan=sukses");
            exit;
        } else {
            echo mysqli_error($koneksi);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="assets/login-style.css">
    
</head>
<body>
    <h2>Halaman Registrasi</h2>
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
                <button type="submit" name="register">Register!</button>
            </li>
        </ul>
    </form>
</body>
</html>