<?php 
session_start();

if(!isset($_SESSION['lvl'])){
    header('location: ../index.php');
}else{
    include '../config/konfigurasi.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../asset/js/jquery-3.7.1.min.js"></script>
    <title>Administrator</title>
    <script>
        $(document).ready(function(){

        })
    </script>
</head>
<body>
    <h3>Kamar <?= $_SESSION['lvl']?></h3>
</body>
</html>