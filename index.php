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
    <link rel="stylesheet" href="asset/css/bgindex.css">
    <script src="asset/js/jquery-3.7.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asrama Beringin Jaya</title>
</head>

<body>
    <script>
        $(document).ready(function(){

            $('#log').on('click',function(e){
                e.preventDefault();
                var list_kamar = ['001','002','003'];
                let tUser = $('#user').val();
                let tPass = $('#pass').val();
                let konfirmasiL = "login";
                if(tUser == "" && tPass == ""){
                    $('#user').focus();
                }else if(tUser == ""){
                    $('#user').focus();
                }else if(tPass == ""){
                    $('#pass').focus();
                }else{
                    $.ajax({
                        url: "config/proses.php",
                        type: "POST",
                        dataType:'html',
                        data:{
                            vUser: tUser,
                            vPass: tPass,
                            konf: konfirmasiL
                        },
                        success: function(v){
                            const value = v.trim();
                            if(value == "Administrator"){
                                window.location.href = "administrator/admin_mainpage.php";
                                $('#user').val("");
                                $('#pass').val("");
                            }else if(list_kamar.includes(value)){
                                window.location.href = "user/user_mainpage.php";
                                $('#user').val("");
                                $('#pass').val("");
                            }else{
                                alert(value);
                                $('#user').val("");
                                $('#pass').val("");
                                $('#user').focus();
                            }
                        }
                    })
                }
            })
            $('.cbp').on('change',function(e){
                e.preventDefault();
                if(this.checked){
                    $('#pass').prop('type','text');
                }else{
                    $('#pass').prop('type','password')
                }
            })
        });
    </script>
    <div class="navbar"></div>
    <div class="kontener">
        <div class="flower f1">❀</div>
        <div class="flower f2">❀</div>
        <h1 class="judul">Asrama Putri Beringin Jaya</h1>
        <div class="flower f3">❀</div>
        <div class="flower f4">❀</div>
        <div class="card">
            <h2>Login</h2>
            <h4>Username</h4>
            <input type="text" id="user" placeholder="-">
            <h4>Password</h4>
            <input type="password" id="pass" placeholder="-">
            <div class="cb-r">
                <input type="checkbox" class="cbp" id="lihatpass">
                <label for="lihatpass">Show Password</label>
            </div>
            <button type="submit" id="log">Login</button>
        </div>
        
    </div>
</body>
<footer class="footer">
</footer>
</html>