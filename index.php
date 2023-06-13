<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Musik</title>
</head>

<body>
    <h1>Daftar Lagu</h1>

    <?php
    $koneksi = new mysqli("localhost", "root", "", "database_music");

    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    $query = "SELECT * FROM tabel_musik";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $path = $row['music'];
            $judul = $row['judul'];
            $fotoAlbum = $row['foto_album'];
            $artis = $row['artis'];

            echo '<a href="playerMusik/player.php?song=' . $id . '&path=' . $path . '&displayName=' . urlencode($judul) . '&cover=' . urlencode($fotoAlbum) . '&artist=' . urlencode($artis) . '">';
            echo "<h2>Judul: $judul</h2>";
            echo "<p>Artis: $artis</p>";
            echo "<img src='pageInputMusik/" . $fotoAlbum . "' alt='Foto Album'>";
            echo '</a><br>';

        }
    } else {
        echo "Tidak ada lagu yang ditemukan.";
    }

    // Tutup koneksi
    $koneksi->close();
    ?>
</body>

</html>
