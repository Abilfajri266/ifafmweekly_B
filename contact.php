<?php
    session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>INFORMATIKA 2026</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td><a href="index.php">Home</a></td>
            <td><a href="profile.php">Profile</a></td>
            <td><a href="contact.php">Contact</a></td>
            <td><a href="Mahasiswa.php">Data Mahasiswa</a></td>
            <td><a href="logout.php" onclick="return confirm('Apakah kamu yakin ingin keluar?')">Logout</a></td>
        </tr>
    </table>
</body>
</html>

