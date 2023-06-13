<?php 
    require "../php/fungsi_inputMusik.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Lagu</title>
</head>

<body>
    <h1>Input Data Lagu</h1>

    <form method="POST" action="" enctype="multipart/form-data">
        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul" required>
        <br>

        <label for="artis">Artis:</label>
        <input type="text" name="artis" id="artis" required>
        <br>

        <label for="file_album">Foto Album:</label>
        <input type="file" name="file_album" id="file_album" required>
        <br>

        <label for="file_musik">File Musik:</label>
        <input type="file" name="file_musik" id="file_musik" required>
        <br>

        <input type="submit" value="Simpan">
    </form>
</body>

</html>
