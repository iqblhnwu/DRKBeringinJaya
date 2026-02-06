<?php 
session_start();
session_unset();
session_destroy();

include "config/konfigurasi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="asset/css/bindex.css">
    <script src="asset/js/jquery-3.7.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asrama Beringin Jaya</title>
</head>
<body>
    <div class="flower f1">❀</div>
    <div class="flower f2">❀</div>
    <div class="flower f3">❀</div>
    <div class="flower f4">❀</div>
    <div class="kontener">
        <h1>Asrama Putri Beringin Jaya</h1>
        <div class="kartu">
            <h2>Login</h2>
            <h4>Username</h4>
            <input type="text">
            <h4>Password</h4>
            <input type="password">
            <button >Login</button>
        </div>
    </div>
</body>
</html>