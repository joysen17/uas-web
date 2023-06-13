<?php 
    $koneksi = new mysqli("localhost", "root", "", "database_music");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $judul = $_POST["judul"];
        $artis = $_POST["artis"];

        $namaFileAlbum = $_FILES["file_album"]["name"];
        $ukuranFileAlbum = $_FILES["file_album"]["size"];
        $namaSementaraAlbum = $_FILES["file_album"]["tmp_name"];
        $lokasiUploadAlbum = "album/" . $namaFileAlbum;
        move_uploaded_file($namaSementaraAlbum, $lokasiUploadAlbum);

        $namaFileMusik = $_FILES["file_musik"]["name"];
        $ukuranFileMusik = $_FILES["file_musik"]["size"];
        $namaSementaraMusik = $_FILES["file_musik"]["tmp_name"];
        $lokasiUploadMusik = "musik/" . $namaFileMusik;
        move_uploaded_file($namaSementaraMusik, $lokasiUploadMusik);

        $query = "INSERT INTO tabel_musik (judul, artis, music, foto_album) VALUES ('$judul', '$artis', '$lokasiUploadMusik', '$lokasiUploadAlbum')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo '<script>alert("Data berhasil disimpan!");</script>';
        } else {
            echo '<script>alert("Terjadi kesalahan saat menyimpan data: ' . mysqli_error($koneksi) . '");</script>';
        }
    }
?>
