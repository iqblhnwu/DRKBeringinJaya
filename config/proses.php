<?php
session_start();
include "konfigurasi.php";
$conf = $_POST['konf'];

if($conf == "login"){
    $user = addslashes($_POST['vUser']);
    $pass = addslashes($_POST['vPass']);
    $sql = "SELECT * FROM akun WHERE nama='$user' AND passmd5=MD5('$pass')";
    $query = mysqli_query($koneksi, $sql);

    if(mysqli_num_rows($query) >= 1){
        $data = mysqli_fetch_assoc($query);
        if($data['peran'] == "Administrator"){
            $_SESSION['lvl'] = $data['peran'];
            echo $data['peran'];
        }else if($data['peran'] == "Penyewa" ){
            $_SESSION['lvl'] = $data['peran'];
            echo $data['peran'];
        }else{
            echo "404";
        }
    }else{
        echo $query;
    }
}
?>

