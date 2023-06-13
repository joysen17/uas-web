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
    :root{
        --background-dark: #2d3548;
        --text-light: rgba(255,255,255,0.6);
        --text-lighter: rgba(255,255,255,0.9);
        --spacing-s: 8px;
        --spacing-m: 16px;
        --spacing-l: 24px;
        --spacing-xl: 32px;
        --spacing-xxl: 64px;
        --width-container: 1200px;
    }
    
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
        margin-bottom: 100px;
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
        border: 0;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        height: 100%;
    }

    .hero-section{
        align-items: flex-start;
        /* background-image: linear-gradient(15deg, #0f4667 0%, #2a6973 150%); */
        display: flex;
        min-height: 100%;
        justify-content: center;
        padding: var(--spacing-xxl) var(--spacing-l);
    }

    .card-grid{
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-column-gap: var(--spacing-l);
        grid-row-gap: var(--spacing-l);
        max-width: var(--width-container);
        width: 100%;
    }

    @media(min-width: 540px){
        .card-grid{
            grid-template-columns: repeat(2, 1fr); 
        }
    }

    @media(min-width: 960px){
        .card-grid{
            grid-template-columns: repeat(4, 1fr); 
        }
    }

    .card{
        list-style: none;
        position: relative;
    }

    .card:before{
        content: '';
        display: block;
        padding-bottom: 150%;
        width: 100%;
    }

    .card__background{
        background-size: cover;
        background-position: center;
        border-radius: var(--spacing-l);
        bottom: 0;
        filter: brightness(0.75) saturate(1.2) contrast(0.85);
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        transform-origin: center;
        trsnsform: scale(1) translateZ(0);
        transition: 
            filter 200ms linear,
            transform 200ms linear;
    }

    .card:hover .card__background{
        transform: scale(1.05) translateZ(0);
    }

    .card-grid:hover > .card:not(:hover) .card__background{
        filter: brightness(0.5) saturate(0) contrast(1.2) blur(20px);
    }

    .card__content{
        left: 0;
        padding: var(--spacing-l);
        position: absolute;
        top: 0;
    }

    .card__category{
        color: var(--text-light);
        font-size: 0.9rem;
        margin-bottom: var(--spacing-s);
        text-transform: uppercase;
    }
    .card__heading{
        color: var(--text-lighter);
        font-size: 1.9rem;
        text-shadow: 2px 2px 20px rgba(0,0,0,0.2);
        line-height: 1.4;
        word-spacing: 100vw;
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
                    <a href="about.php">
                        <span class="fa fas fa-heart"></span>
                        <span>About Us</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-container">
        <div class="container">
            <section class="hero-section">
                <div class="card-grid">
                    <a class="card" href="#">
                        <div class="card__background" style="background-image: url(image/putu.jpg)"></div>
                        <div class="card__content">
                            <p class="card__category">210211060093</p>
                            <h3 class="card__heading">I Putu Wijaya</h3>
                        </div>
                    </a>
                    <a class="card" href="#">
                        <div class="card__background" style="background-image: url(image/joysen.jpg)"></div>
                        <div class="card__content">
                            <p class="card__category">210211060000</p>
                            <h3 class="card__heading">Joysen Wiclif Mewengkang</h3>
                        </div>
                    </a>
                    <a class="card" href="#">
                        <div class="card__background" style="background-image: url(image/juan.jpg)"></div>
                        <div class="card__content">
                            <p class="card__category">Category</p>
                            <h3 class="card__heading">Juan Rindengan</h3>
                        </div>
                    </a>
            </section>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/23cecef777.js" crossorigin="anonymous"></script>
</body>
</html>