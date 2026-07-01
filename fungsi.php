<?php

    $koneksi = mysqli_connect("localhost","root","","ifafmweeklyB");

    function tampildata($query)
    {
        global $koneksi;
        $result = mysqli_query($koneksi,$query);

        $rows = [];
        while($row = mysqli_fetch_assoc($result))
            {
                $rows[] = $row;
            }
        return $rows;
    }

    function tambahdata($data, $files) {
        global $koneksi;
        $nama = htmlspecialchars($data["nama"]);
        $nim = htmlspecialchars($data["nim"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $email = htmlspecialchars($data["email"]);
        $no_hp = htmlspecialchars($data["no_hp"]);

        $namafoto = $files["name"];
        $tmpfoto = $files["tmp_name"];
        $date = date('dmY_his');

        $newnamefoto = $date . $namafoto ;

        $path = "Image/ . $newnamefoto";

        if (move_uploaded_file($tmpfoto, $path))
        {

        $query = "INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto) VALUES
        ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$newnamefoto')";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
        }

    }

    function hapusData($id) {
        global $koneksi;
        $query = "DELETE FROM mahasiswa WHERE id=$id";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }
    
    function ubahData($data, $id) {
        global $koneksi;
        $nama = htmlspecialchars($data["nama"]);
        $nim = htmlspecialchars($data["nim"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $email = htmlspecialchars($data["email"]);
        $no_hp = htmlspecialchars($data["no_hp"]);
        $foto = $data["foto"];

        $query = "UPDATE mahasiswa SET
                    nama ='$nama', 
                    nim = '$nim',
                    jurusan = '$jurusan', 
                    email = '$email',
                    no_hp = '$no_hp', 
                    foto = '$foto'
                    where id = $id
                    ";


        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);

    }



?>