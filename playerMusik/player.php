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
    <script src="https://kit.fontawesome.com/9d4aef4753.js" crossorigin="anonymous"></script>
    <title>Anime Music Player</title>
</head>
<style>
    * {
    padding: 0;
    margin: 0;
    }

    body {
        background-color: #121212;
        font-family: 'League Spartan', sans-serif;
    }

    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        width: 196px;
        background-color: #000000;
        padding: 24px;
    }

    .sidebar .logo img {
        width: 150px;
        height: 130px;
        border-radius: 50%;
    }

    .sidebar .navigation ul {
        list-style: none;
        margin-top: 20px;
    }

    .sidebar .navigation ul li {
        padding: 10px 0px;
    }

    .sidebar .navigation ul li a {
        color: #b3b3b3;
        text-decoration: none;
        font-weight: bold;
        font-size: 13px;
    }

    .sidebar .navigation ul li a:hover,
    .sidebar .navigation ul li a:active,
    .sidebar .navigation ul li a:focus {
        color: #ffffff;
    }

    .sidebar .navigation ul li a:hover .fa,
    .sidebar .navigation ul li a:active .fa,
    .sidebar .navigation ul li a:focus .fa {
        color: #b3b3b3;
    }

    .sidebar .navigation ul li .fa {
        font-size: 20px;
        margin-right: 10px;
    }

    .sidebar .navigation ul li a:hover .fa:hover,
    .sidebar .navigation ul li a:hover .fa:active,
    .sidebar .navigation ul li a:hover .fa:focus {
        color: #ffffff;
    }

    .sidebar .policies {
        position: absolute;
        bottom: 100px;
    }

    .sidebar .policies ul {
        list-style: none;
    }

    .sidebar .policies ul li {
        padding-bottom: 5px;
    }

    .sidebar .policies ul li a {
        color: #b3b3b3;
        font-weight: 500;
        text-decoration: none;
        font-size: 10px;
    }

    .sidebar .policies ul li a:hover,
    .sidebar .policies ul li a:active,
    .sidebar .policies ul li a:focus {
        text-decoration: underline;
    }

    .main-container {
        margin-left: 245px;
        margin-top: 50px;
        margin-bottom: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .topbar {
        display: flex;
        justify-content: space-between;
        background-color: #101010;
        padding: 14px 30px;
    }

    .topbar .prev-next-buttons button {
        color: #7a7a7a;
        cursor: not-allowed;
        width: 34px;
        height: 34px;
        border-radius: 100%;
        font-size: 18px;
        border: 0px;
        background-color: #090909;
        margin-right: 10px;
    }

    .topbar .navbar {
        display: flex;
        align-items: center;
    }
    .topbar .navbar ul {
        list-style: none;
    }
    .topbar .navbar ul li {
        display: inline-block;
        margin: 0px 8px;
        width: 70px;
    }

    .topbar .navbar ul li a {
        color: #b3b3b3;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px;
        letter-spacing: 1px;
    }

    .topbar .navbar ul li a:hover,
    .topbar .navbar ul li a:active,
    .topbar .navbar ul li a:focus {
        color: #ffffff;
        font-size: 15px;
    }

    .topbar .navbar ul li.divider {
        color: #ffffff;
        font-size: 26px;
        margin: 0px 20px;
        width: auto;
    }

    .topbar .navbar button {
        background-color: #ffffff;
        color: #000000;
        font-size: 16px;
        font-weight: bold;
        padding: 14px 30px;
        border: 0px;
        border-radius: 40px;
        cursor: pointer;
        margin-left: 20px;
    }

    .topbar .navbar button:hover,
    .topbar .navbar button:active,
    .topbar .navbar button:focus {
        background-color: #f2f2f2;
    }

    .playlists {
        padding: 20px 40px;
    }

    .playlists h2 {
        color: #ffffff;
        font-size: 22px;
        margin-bottom: 20px;
    }

    .playlists .list {
        display: flex;
        gap: 20px;
        overflow: hidden;
    }

    .playlists .list .item {
        min-width: 140px;
        width: 160px;
        padding: 15px;
        background-color: #181818;
        border-radius: 6px;
        cursor: pointer;
        transition: all ease 0.4s;
    }

    .playlists .list .item:hover {
        background-color: #252525;
    }

    .playlists .list .item img {
        width: 100%;
        border-radius: 6px;
        margin-bottom: 10px;
    }

    .playlists .list .item .play {
        position: relative;
    }

    .playlists .list .item .play .fa {
        position: absolute;
        right: 10px;
        top: -60px;
        padding: 18px;
        background-color: #1db954;
        border-radius: 100%;
        opacity: 0;
        transition: all ease 0.4s;
    }

    .playlists .list .item:hover .play .fa {
        opacity: 1;
        transform: translateY(-20px);
    }

    .playlists .list .item h4 {
        color: #ffffff;
        font-size: 14px;
        margin-bottom: 10px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .playlists .list .item p {
        color: #989898;
        font-size: 12px;
        line-height: 20px;
        font-weight: 600;
    }

    .playlists .list .item a {
        text-decoration: none;
    }

    .playlists hr {
        margin: 70px 0px 0px;
        border-color: #636363;
    }

    .preview {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to right, #ae2896, #509bf5);
        padding: 15px 40px;
        display: flex;
        justify-content: space-between;
    }

    .preview h6 {
        color: #ffffff;
        text-transform: uppercase;
        font-weight: 400;
        font-size: 12px;
        margin-bottom: 10px;
    }

    .preview p {
        color: #ffffff;
        font-size: 14px;
        font-weight: 500;
    }

    .preview button {
        background-color: #ffffff;
        color: #000000;
        font-size: 16px;
        font-weight: bold;
        padding: 14px 30px;
        border: 0px;
        border-radius: 40px;
        cursor: pointer;
    }

    .main-container .container{
        max-width: 350px;
        background-color: #fff;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding: 25px;
    }
</style>
<body>
    <div class="sidebar">
        <div class="logo">
            <a href="#">
                <img src="../logo.jpg" alt="Logo" />
            </a>
        </div>

        <div class="navigation">
            <ul>
                <li>
                    <a href="../index.php">
                        <span class="fa fa-home"></span>
                        <span>Home</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="navigation">
            <ul>
                <li>
                    <a href="../pageInputMusik/inputMusik.php">
                        <span class="fa fas fa-plus-square"></span>
                        <span>Upload Lagu</span>
                    </a>
                </li>
                <li>
                    <a href="../pageAbout/about.php">
                        <span class="fa fas fa-heart"></span>
                        <span>About Us</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-container">
        <?php
            // $koneksi = new mysqli("localhost", "root", "", "database_music");

            // if ($koneksi->connect_error) {
            //     die("Koneksi gagal: " . $koneksi->connect_error);
            // }

            // $songId = $_GET['song'];

            // $query = "SELECT * FROM tabel_musik WHERE id = $songId";
            // $result = $koneksi->query($query);

            // if ($result->num_rows > 0) {
            //     $row = $result->fetch_assoc();
            //     $songPath = $row['music'];
            //     $displayName = $row['judul'];
            //     $cover = $row['foto_album'];
            //     $artist = $row['artis'];
            //     echo "<img src='../pageInputMusik/$cover' alt='Foto Album'>";
            //     echo "<h2>Judul: $displayName</h2>";
            //     echo "<p>Artis: $artist</p>";

            //     echo "<audio controls>
            //             <source src='../pageInputMusik/$songPath' type='audio/mpeg'>
            //             Your browser does not support the audio element.
            //         </audio>";
            // } else {
            //     echo "Lagu tidak ditemukan.";
            // }

            // $koneksi->close();
        ?>
        <div class="container">
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
                    echo "<img src='../pageInputMusik/$cover' alt='Foto Album'>";
                    echo "<h2>Judul: $displayName</h2>";
                    echo "<p>Artis: $artist</p>";

                    echo "<audio controls>
                            <source src='../pageInputMusik/$songPath' type='audio/mpeg'>
                            Your browser does not support the audio element.
                        </audio>";
                } else {
                    echo "Lagu tidak ditemukan.";
                }

                $koneksi->close();
            ?>
        </div>


    </div>

    <script src="https://kit.fontawesome.com/23cecef777.js" crossorigin="anonymous"></script>
</body>
</html>