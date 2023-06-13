<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://kit.fontawesome.com/9d4aef4753.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick.css"/>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick.min.js"></script>
    <script src="https://kit.fontawesome.com/9d4aef4753.js" crossorigin="anonymous"></script>
    <title>Anime Music Player</title>
</head>
<style>
    .main-container {
        display: flex;
        flex-wrap: wrap;
    }

    .playlists {
        width: 100%;
    }

    .list {
        display: flex;
        flex-wrap: wrap;
    }

    .item {
        width: 16.6667%;
        padding: 10px;
        box-sizing: border-box;
    }

    .list .item:nth-child(6n+1) {
        clear: left;
    }

</style>
<body>
    <div class="sidebar">
        <div class="logo">
            <a href="#">
                <img src="logo.jpg" alt="Logo" />
            </a>
        </div>

        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="fa fa-home"></span>
                        <span>Home</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="navigation">
            <ul>
                <li>
                    <a href="pageInputMusik/inputMusik.php">
                        <span class="fa fas fa-plus-square"></span>
                        <span>Upload Lagu</span>
                    </a>
                </li>
                <li>
                    <a href="pageAbout/about.php">
                        <span class="fa fas fa-heart"></span>
                        <span>About Us</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-container">
        <div class="playlists">
            <h2>Semua Lagu</h2>
            <div class="list">
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

                            echo '<div class="item">';
                            echo '<a href="playerMusik/player.php?song=' . $id . '&path=' . $path . '&displayName=' . urlencode($judul) . '&cover=' . urlencode($fotoAlbum) . '&artist=' . urlencode($artis) . '">';
                            echo "<img src='pageInputMusik/" . $fotoAlbum . "' alt='Foto Album'>";
                            echo '<div class="play">';
                            echo '<span class="fa fa-play"></span>';
                            echo '</div>';
                            echo "<h4>Judul: $judul</h4>";
                            echo "<p>Artis: $artis</p>";
                            echo '</a>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/23cecef777.js" crossorigin="anonymous"></script>
</body>
</html>