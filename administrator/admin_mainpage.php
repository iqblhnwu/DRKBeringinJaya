<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/backgroundadmin.css">
    <script src="../asset/js/jquery-3.7.1.min.js"></script>
    <title>Administrator</title>
    <script>
        $(document).ready(function(){
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
                }else{
                    alert("404");
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
            <h4>Admin</h4>
        </div>
        <div class="midnavmin">
            <div class="ddnav">
                <button class="snavmin a bmaktif" id="idP">Penyewa</button>
                <button class="snavmin b" id="idK">Kamar</button>
                <button class="snavmin c" id="idKn">Keuangan</button>
                <button class="snavmin d" id="idM">Masukan</button>
            </div>
        </div>
        <div class="rightnavmin">
            <div class="ddnav">
                <h4 class="lg" id="lout">Logout</h4>
            </div>
            <button class="navtog ntjs" id="na">&#9776;</button>
        </div>
    </div>
</body>
</html>