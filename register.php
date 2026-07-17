<?php
require 'fungsi.php'; 
if (isset($_POST["register"])) {
    $username = strtolower(stripslashes($_POST["username"]));
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Cek apakah username sudah ada
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar!');
              </script>";
    } else {

        $password = password_hash($password, PASSWORD_DEFAULT);

        // Tambahkan user baru ke database
        mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");

        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>
                    alert('Registrasi berhasil! Silakan login.');
                    window.location.href = 'login.php';
                  </script>";
        } else {
            echo mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Registrasi</title>
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