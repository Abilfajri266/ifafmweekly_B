<?php

    require "fungsi.php";

    $qmahasiswa = "SELECT * FROM mahasiswa";

   $mahasiswas =  tampildata($qmahasiswa);

   var_dump($mhs);
   //die;

    /// ambil data (fetch) dari lemari mahasiswa
    /// mysqli_fetch_row  array numeric (index)
    /// mysqli_fetch_assoc
    /// mysqli_fetch_object
    /// mysqli_fetch_array

    // while ($mhs = mysqli_fetch_row($result));
    // {
    //      var_dump($result[1]);
    // }
    
    // while ($mhs = mysqli_fetch_assoc($result))
    // {
    //      var_dump($mhs["nama"]);
    //      echo $mhs[1];
    // }

    // while ($mhs = mysqli_fetch_object($result));
    // {
    //      var_dump($mhs->nama);
    // }


    /// echo $mhs[1];



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
        </tr>
    </table>
    <br>
    <hr/>
    <h2>Data Mahasiswa</h2>
    <a href="Tambahdata.php">
        <button>Tambah Data</button>
    </a>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>No. HP</th>
            <th>foto</th>
            <th>Aksi</th>
        </tr>
        <?php
           $i = 1; 
            foreach($mahasiswas as $mhs) /// array mahasiswa data mhs
            {
        ?>

        <tr>
            <td align="center"><?= $i ?></td>
            <td><?= $mhs["nama"] ?></td>
            <td><?= $mhs["nim"] ?></td>
            <td><?= $mhs["jurusan"] ?></td>
            <td><?= $mhs["email"] ?></td>
            <td><?= $mhs["no_hp"] ?></td>
            <td><img src="Image/<?= $mhs["foto"] ?>" alt="abil.jpg" width="60px"></td>
            <td>
                <a href="editdata.php"><button>Edit</button></a> | 
                <a href="deletedata.php"><button>Delete</button></a>
            </td>
        </tr>
        
        <?php
            $i++;
            }
        ?>
    </table>
    <br>
    <hr>
    <table border="1" cellpadding="20">
        <tr>
            <th align="center">1,1</th>
            <th align="center">1,2</th>
            <th align="center">1,3</th>
            <th align="center">1,4</th>
        </tr>
        <tr>
            <th align="center">2,1</th>
            <th colspan="2" rowspan="2"></th>
            <th align="center">2,4</th>
        </tr>
        <tr>
            <th align="center">3,1</th>
            <th align="center">3,4</th>
        </tr>
            <th align="center">4,1</th>
            <th align="center">4,2</th>
            <th align="center">4,3</th>
            <th align="center">4,4</th>
    </table>
</body>
</html>