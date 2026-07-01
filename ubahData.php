<?php
    require "fungsi.php";

    $id = $_GET["id"];

    $query = "SELECT * FROM mahasiswa WHERE id = $id";

    $mhs = tampildata($query)[0];

    var_dump($mhs["nama"]);

    if (isset($_POST["submit"])){
        if(ubahData($_POST, $id) > 0){
            echo "<script>
                    alert('Data berhasil diubah!');
                    document.location.href = 'Mahasiswa.php';
                 </script>";
        } else {
            echo "<script>
                    alert('Data gagal diubah!');
                    document.location.href = 'Mahasiswa.php';
                 </script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h2>Tambah Data Mahasiswa</h2>
    <form action="" method="post" enctype = "multipart/form-data">
        <table cellpadding="5px">
            <tr>
                <td> <label for="nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" id="nama" name="nama" required/></td>
            </tr>
            <tr>
                <td> <label for="nim">NIM</label></td>
                <td>:</td>
                <td><input type="number" id="nim" name="nim" required/></td>
            </tr>
            <tr>
                <td> <label for="jurusan">Jurusan</label></td>
                <td>:</td>
                <td><input type="text" id="jurusan" name="jurusan" required/></td>
            </tr>
            <tr>
                <td> <label for="email">Email</label></td>
                <td>:</td>
                <td><input type="email" id="email" name="email"/></td>
            </tr>
            <tr>
                <td> <label for="nohp">No.Hp</label></td>
                <td>:</td>
                <td><input type="number" id="nohp" name="no_hp"/></td>  <!-- name harus sama dengan yg ada di databases -->
            </tr>
            <tr>
                <td> <label for="foto">Foto</label></td>
                <td>:</td>
                <td><input type="file" id="foto" name="foto"/></td> 
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit" name="submit">Tambah</button>
                </td>
            </tr>
        </table>
    </form>
    <br>
    <hr>
    <!-- <form action="Mahasiswa.php" method="post">
        <table>
            <tr>
                <td> <label for="nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" id="nama" name="nama"/></td>
            </tr>
            <tr>
                <td> <label for="nim">NIM</label></td>
                <td>:</td>
                <td><input type="number" id="number" name="number"/></td>
            </tr>
            <tr>
                <td> <label for="pwsd">Password</label></td>
                <td>:</td>
                <td><input type="password" id="pwsd" name="pwsd"/></td>
            </tr>
            <tr>
                <td> <label for="email">Email</label></td>
                <td>:</td>
                <td><input type="email" id="email" name="email"/></td>
            </tr>
            <tr>
                <td> <label for="nohp">No HP</label></td>
                <td>:</td>
                <td><input type="tel" id="nohp" name="nohp"/></td>
            </tr>
            <tr>
                <td> <label for="wp">Website Pribadi</label></td>
                <td>:</td>
                <td><input type="url" id="wp" name="wp"/></td>
            </tr>
            <tr>
                <td> <label for="tgl_lahir">Tanggal Lahir</label></td>
                <td>:</td>
                <td><input type="date" id="tgl_lahir" name="tgl_lahir"/></td>
            </tr>
            <tr>
                <td> <label for="warna">Warna</label></td>
                <td>:</td>
                <td><input type="color" id="warna" name="warna"/></td>
            </tr>
            <tr>
                <td> <label for="tingkat_kp">Tingkat Kepuasan</label></td>
                <td>:</td>
                <td><input type="range" id="tingkat_kp" name="tingkat_kp"/></td>
            </tr>
            <tr>
                <td> <label for="gender">Jenis Kelamin</label></td>
                <td>:</td>
                <td><input type="radio" id="gender" name="gender" value="laki-laki"/>laki-laki</td>
                <td><input type="radio" id="gender" name="gender" value="laki-laki"/>Perempuan</td>
            </tr>
            <td> <label for="hobi">Hobi (minimal 3 pilihan)</label></td>
                <td>:</td>
                <td><input type="checkbox" id="hobi" name="hobi" value="Coding"/>Coding</td>
                <td><input type="checkbox" id="hobi" name="hobi" value="Membaca"/>Membaca</td>
                <td><input type="checkbox" id="hobi" name="hobi" value="Olahraga"/>Olahraga</td>
                <td><input type="checkbox" id="hobi" name="hobi" value="Bermain_game"/>Bermain Game</td>
            <tr >
                <td> <label for="foto">Input Foto</label></td>
                <td>:</td>
                <td><input type="file" id="foto" name="foto"/></td>
            </tr>
            <tr >
                <td> <label for="alamat">Alamat</label></td>
                <td>:</td>
                <td><textarea name="alamat" rows="4"></textarea></td>
            </tr>
            <tr >
                <td> <label for="jurusan">Jurusan</label></td>
                <td>:</td>
                <td><select name="jurusan" id="jurusan">
                        <option value="Informatika">Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Elektro">Teknik Elektro</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit">Tambah</button>
                </td>
            </tr>
        </table>
    </form> -->
</body>
</html>