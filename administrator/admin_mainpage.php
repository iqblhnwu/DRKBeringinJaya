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
    <link rel="stylesheet" href="../asset/css/bgn.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="../asset/js/jquery-3.7.1.min.js"></script>
    <title>Administrator</title>
    <script>
        $(document).ready(function(){
            $('.loading_mode').addClass('show');
            setTimeout(() => {
                $('.loading_mode').removeClass('show')
                $('.contentadmin').load('page_penyewa.php');
            }, 500);
            $('.snavmin').on('click',function(e){
                e.preventDefault();
                const n = $(this).attr('id');
                if(n == "idP"){
                    if($('.ntjs').attr('id') === "ak"){
                        $(".a").addClass("bmaktif");
                        $(".b").removeClass("bmaktif");
                        $(".c").removeClass("bmaktif");
                        $(".d").removeClass("bmaktif");
                        $('.ddnav').removeClass('resp');
                        $('.ntjs').prop('id', 'na');
                    }else{
                        $(".a").addClass("bmaktif");
                        $(".b").removeClass("bmaktif");
                        $(".c").removeClass("bmaktif");
                        $(".d").removeClass("bmaktif");
                    }
                    $('.loading_mode').addClass('show');
                    $('.contentadmin').addClass('hide');
                    $('.contentadmin').load('page_penyewa.php');
                    setTimeout(() => {
                        $('.loading_mode').removeClass('show');
                         $('.contentadmin').removeClass('hide');
                    }, 200);
                }else if(n == "idK"){
                    if($('.ntjs').attr('id') === "ak"){
                        $(".a").removeClass("bmaktif");
                        $(".b").addClass("bmaktif");
                        $(".c").removeClass("bmaktif");
                        $(".d").removeClass("bmaktif");
                        $('.ddnav').removeClass('resp');
                        $('.ntjs').prop('id', 'na');
                    }else{
                        $(".a").removeClass("bmaktif");
                        $(".b").addClass("bmaktif");
                        $(".c").removeClass("bmaktif");
                        $(".d").removeClass("bmaktif");
                    }
                    $('.loading_mode').addClass('show');
                    $('.contentadmin').addClass('hide');
                    $('.contentadmin').load('page_kamar.php');
                    setTimeout(() => {
                        $('.loading_mode').removeClass('show');
                         $('.contentadmin').removeClass('hide');
                    }, 200);
                }else if(n == "idKn"){
                    if($('.ntjs').attr('id') === "ak"){
                        $(".a").removeClass("bmaktif");
                        $(".b").removeClass("bmaktif");
                        $(".c").addClass("bmaktif");
                        $(".d").removeClass("bmaktif");
                        $('.ddnav').removeClass('resp');
                        $('.ntjs').prop('id', 'na');
                    }else{
                        $(".a").removeClass("bmaktif");
                        $(".b").removeClass("bmaktif");
                        $(".c").addClass("bmaktif");
                        $(".d").removeClass("bmaktif");
                    }
                    $('.loading_mode').addClass('show');
                    $('.contentadmin').addClass('hide');
                    $('.contentadmin').load('page_keuangan.php');
                    setTimeout(() => {
                        $('.loading_mode').removeClass('show');
                         $('.contentadmin').removeClass('hide');
                    }, 200);
                }else if(n == "idM"){
                    if($('.ntjs').attr('id') === "ak"){
                        $(".a").removeClass("bmaktif");
                        $(".b").removeClass("bmaktif");
                        $(".c").removeClass("bmaktif");
                        $(".d").addClass("bmaktif");
                        $('.ddnav').removeClass('resp');
                        $('.ntjs').prop('id', 'na');
                    }else{
                        $(".a").removeClass("bmaktif");
                        $(".b").removeClass("bmaktif");
                        $(".c").removeClass("bmaktif");
                        $(".d").addClass("bmaktif");
                    }
                    $('.loading_mode').addClass('show');
                    $('.contentadmin').addClass('hide');
                    $('.contentadmin').load('page_masukan.php');
                    setTimeout(() => {
                        $('.loading_mode').removeClass('show');
                         $('.contentadmin').removeClass('hide');
                    }, 200);
                }else if(n == "lout"){
                    window.location.href = '../index.php'
                }else{
                    alert('404')
                }
            })
            $('.ntjs').on('click',function(e){
                e.preventDefault();
                const t = $(this).attr('id');
                if(t == 'na'){
                    $('.ddnav').addClass('resp');
                    $('.ntjs').prop('id', 'ak');
                }else{
                    $('.ddnav').removeClass('resp');
                    $('.ntjs').prop('id', 'na');
                }
            })
        })
    </script>
</head>
<body>
    <div class="navadmin">
        <div class="leftnavmin">
            <h4><?= $_SESSION['lvl']?></h4>
        </div>
        <div class="midnavmin">
            <div class="ddnav">
                <button class="snavmin a bmaktif" id="idP">Penyewa</button>
                <button class="snavmin b" id="idK">Kamar</button>
                <button class="snavmin c" id="idKn">Keuangan</button>
                <button class="snavmin d" id="idM">Masukan</button>
                <button class="snavmin lg" id="lout">Logout</button>
            </div>
        </div>
        <div class="rightnavmin">
            <div class="ddnav">
                <h4 class="snavmin lg" id="lout">Logout</h4>
            </div>
            <button class="navtog ntjs" id="na">&#9776;</button>
        </div>
    </div>
    <div class="fill">
        <div class="loading_mode">
            <div class="loader"></div>
            <h4>Loading...</h4>
        </div>
        <div class="contentadmin"></div>
    </div>
</body>
</html>