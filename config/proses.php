<?php
session_start();
include "konfigurasi.php";
$conf = $_POST['konf'];

if($conf == "login"){
    $user = addslashes($_POST['vUser']);
    $pass = addslashes($_POST['vPass']);
    if(is_numeric($user)){
        $sql = "SELECT * FROM daftarkamar WHERE `no_kamar` = '$user' AND `passmd5`= MD5('$pass')";
    }else{
        $sql = "SELECT * FROM akun WHERE nama='$user' AND passmd5=MD5('$pass')";
    }
    $query = mysqli_query($koneksi, $sql);

    if(mysqli_num_rows($query) >= 1){
        if(is_numeric($user)){
            $data = mysqli_fetch_assoc($query);
            $_SESSION['lvl'] = $data['no_kamar'];
            echo $data['no_kamar'];
        }else{       
            $data = mysqli_fetch_assoc($query);
            $_SESSION['lvl'] = $data['peran'];
            echo $data['peran'];
        }
    }else{
        echo "Username atau Password Anda Salah";
    }
}else if($conf == "daftar"){
    $idref = addslashes($_POST['vRef']);
    $nokar = addslashes($_POST['vKar']);
    $naleng = addslashes($_POST['vNama']);
    $asdes = addslashes($_POST['vAsdes']);
    $nohp = addslashes($_POST['vNohp']);
    $nhortu = addslashes($_POST['vNhortu']);
    $poin = addslashes($_POST['vTj']);

    $sql = "INSERT INTO `daftarpenyewa`(`nama`, `asal_daerah`, `nohp`, `nohp_ortu`, `tujuan`) VALUES ('$naleng','$asdes','$nohp','$nhortu','$poin')";

    $query = mysqli_query($koneksi, $sql);
    if($query){
        $id_penyewa = mysqli_insert_id($koneksi);
        $pass = generatorRankar(6);
        $passmd5 = md5($pass);
        $biaya = 400000;
        $sqlkamar = "UPDATE `daftarkamar` SET `penghuni`='$id_penyewa',`pass`='$pass',`passmd5`='$passmd5',`biaya`='$biaya' WHERE `no_kamar`='$nokar' AND `ref`='$idref'";
        $querykamar = mysqli_query($koneksi,$sqlkamar);
        if($querykamar){
            echo "Success|".$pass;
        }else{
            echo "Ada yang salah dikamar" . mysqli_error($koneksi);
        }
    }else{
        echo "Ada yang salah di penghuni" . mysqli_error($koneksi);
    }
}



function generatorRankar($length){
    $karakter = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $pjkarakter = strlen($karakter);
    $rankar = '';
    for($i = 0; $i < $length; $i++){
        $rankar .= $karakter[random_int(0, $pjkarakter - 1)];
    }
    return $rankar;
}
?>

