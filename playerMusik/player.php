<!-- File: playerMusik/player.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Musik</title>
</head>

<body>
    <h1>Player Musik</h1>

    <?php
    $koneksi = new mysqli("localhost", "root", "", "database_music");

    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    $songId = $_GET['song'];

    $query = "SELECT * FROM tabel_musik WHERE id = $songId";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $songPath = $row['music'];
        $displayName = $row['judul'];
        $cover = $row['foto_album'];
        $artist = $row['artis'];

        echo "<h2>Judul: $displayName</h2>";
        echo "<p>Artis: $artist</p>";
        echo "<img src='pageInputMusik/$cover' alt='Foto Album'>";

        // Embed music player using HTML5 audio tag
        echo "<audio controls>
                  <source src='../pageInputMusik/$songPath' type='audio/mpeg'>
                  Your browser does not support the audio element.
              </audio>";
    } else {
        echo "Lagu tidak ditemukan.";
    }

    // Tutup koneksi
    $koneksi->close();
    ?>
</body>

</html>
