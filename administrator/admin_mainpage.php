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
    <link rel="stylesheet" href="../asset/css/bgmainpageadmin.css">
    <script src="../asset/js/jquery-3.7.1.min.js"></script>
    <title>Administrator</title>
    <script>
        $(document).ready(function(){
            $('#con').load('page_responsive.php');
            
            $('.navresmin').on('click',function(e){
                e.preventDefault();
                const nv = $(this).attr('id');
                if(nv == "responmin"){
                    $(".navbarmin").addClass("resp");
                    $(".navresmin").prop("id", "aktif");
                    
                }else{
                    $(".navbarmin").removeClass("resp");
                    $(".navresmin").prop("id","responmin");
                }
            })
        })
    </script>
</head>
<body>
    
    <div class="navbarmin">
        <h4>Admin</h4>
        <button id="navP">Penyewa</button>
        <button id="navD">Daftar</button>
        <button id="navK">Keuangan</button>
        <button id="navM">Masukan</button>
        <h4 type="button">Logout</h4>
        <button class="navresmin hamburger non" id="responmin">
            &#9776;  <!-- simbol hamburger -->
        </button>
    </div>
    <div class="fill">
        <div id="con"></div>
    </div>
    <div class="footermin">asd</div>
</body>

</html>