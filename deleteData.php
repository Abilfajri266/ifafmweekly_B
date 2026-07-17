<?php
    session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    require "fungsi.php";

    $id = $_GET["id"];

    if (hapusData($id) > 0) {
        echo "<script>
                alert ('Data berhasil dihapus')
                window.location.href = 'Mahasiswa.php';
             </script>";
    }else {
        echo "<script>
                alert ('Data gagal dihapus')
                window.location.href = 'Mahasiswa.php';
             </script>";
    }
?>