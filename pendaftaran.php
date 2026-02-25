<?php
include 'config/konfigurasi.php';

if(!isset($_GET['ref']) || empty($_GET['ref'])){
    die('404: Access Denied!');
}

$tk = $_GET['ref'];
$stmt = mysqli_prepare($koneksi, "SELECT * FROM daftarkamar WHERE `ref` = ?");
mysqli_stmt_bind_param($stmt, "s", $tk);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);


if(!$data){
    die('404: Link Invalid');
}else if($data['penghuni'] != ""){
    die('Kamar Terisi');
}

$nk = $data['no_kamar'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pendaftaran Kamar <?= $nk ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Nunito:wght@400;500;600&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="asset/css/bdaftar.css">
  <script src="asset/js/jquery-3.7.1.min.js"></script>
</head>
<body>
    <script>
        $(document).ready(function(){
            $('.loading_mode').addClass('show');
            setTimeout(() => {
                $('.loading_mode').removeClass('show');
                $('.form_mode').removeClass('hide')
            }, 500);
            
            $('#tbdaftar').on('click', function(e){
                let idref = '<?=$tk?>';
                let nokar = $('#n_kamar').val();
                let naleng = $('#nama').val();
                let asdes = $('#asal').val();
                let nohp = $('#hp').val();
                let nhortu = $('#ortu').val();
                let poin = $('#tujuan').val();
                let konfirmasiD = "daftar"

                if(naleng == ""){
                    $('#nama').focus();
                    $('#alert-warning').addClass('show');
                    $('#almg').html('Nama Lengkap Harap Di Isi!');
                }else if(asdes == ""){
                    $('#asal').focus();
                    $('#alert-warning').addClass('show');
                    $('#almg').html('Asal Daerah Harap Di isi!');
                }else if((nohp == "") || (nohp.length < 11)){
                    $('#hp').focus();
                    $('#alert-warning').addClass('show');
                    $('#almg').html('Nomor Hp Aktif Harap Di Isi Lengkap!');
                    
                }else if((nhortu == "") || (nhortu.length < 12)){
                    $('#ortu').focus();
                    $('#alert-warning').addClass('show');
                    $('#almg').html('Nomor Hp Aktif Ortu Harap Di Isi Lengkap!');
                }else if(poin == ""){
                    $('#tujuan').focus();
                    $('#alert-warning').addClass('show');
                    $('#almg').html('-');
                }else{
                    $('#tbdaftar').prop('disabled', true);
                    $('.loading_mode').addClass('show');
                    $('.form_mode').addClass('hide')
                    $.ajax({
                        url: "config/proses.php",
                        type: "POST",
                        dataType: 'html',
                        data:{
                            vRef: idref,
                            vKar: nokar,
                            vNama: naleng,
                            vAsdes: asdes,
                            vNohp: nohp,
                            vNhortu: nhortu,
                            vTj: poin,
                            konf: konfirmasiD
                        },
                        success:function(r){
                            const valdi = r.trim();
                            if(valdi.startsWith('Success')){
                                const bag = valdi.split('|');
                                const gPass = bag[1];
                                setTimeout(() => {
                                    $('#show_pass').text(gPass)
                                    $('.loading_mode').removeClass('show');
                                    $('.succes_mode').removeClass('hide')
                                }, 1000);
                            }else{
                                alert(valdi);
                                setTimeout(() => {
                                    $('.loading_mode').removeClass('show');
                                    $('.form_mode').removeClass('hide')
                                }, 1000);
                            }
                        }
                    })
                }
                
            })
            $('#nama, #asal, #hp, #ortu').on('input',function(e){
                e.preventDefault();
                if($(this).val().trim() != ''){
                    $('#alert-warning').removeClass('show');
                }
            })
            $('#hp').on('input', function() {
                // Remove any non-digit characters as they are entered
                this.value = this.value.replace(/\D/g, '');
            });
            $('#ortu').on('input', function() {
                this.value = this.value.replace(/\D/g, '');
            });
            
            $('.cb').on('change',function(e){
                e.preventDefault();
                if(this.checked){
                    $('#tbdaftar').prop('disabled',false);
                }else{
                    $('#tbdaftar').prop('disabled',true);
                }
            })
        })
    </script>
    <div class="card">
        <div class="form_mode hide">
            <!-- Header -->
            <div class="header">
            <div class="avatar-icon">
                <svg viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
            </div>
            <h1 class="header-title">Pendaftaran Asrama Putri Beringin Jaya</h1>
            <div class="avatar-icon">
                <svg viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
            </div>
            </div>
            <p class="subtitle">Kamar <?= $nk?></p>
    
            <div class="form-row">
                <input type="hidden" id="n_kamar" value="<?= $nk ?>">
                <label class="form-label" for="nama">Nama :</label>
                <div class="input-wrap">
                <input type="text" id="nama" placeholder="Nama Lengkap"/>
                </div>
            </div>
    
            <div class="form-row">
                <label class="form-label" for="asal">Asal Daerah :</label>
                <div class="input-wrap">
                <input type="text" id="asal" placeholder=""/>
                </div>
            </div>
    
            <div class="form-row">
                <label class="form-label" for="hp">Nomor Hp :</label>
                <div class="input-wrap">
                <input type="tel" id="hp" inputmode="numeric" placeholder="Nomor hp Aktif"/>
                </div>
            </div>
    
            <div class="form-row">
                <label class="form-label" for="ortu">Nomor Hp Ortu :</label>
                <div class="input-wrap">
                <input type="tel" id="ortu" placeholder="Nomor hp ibu / ayah"/>
                </div>
            </div>
    
            <div class="form-row">
                <label class="form-label" for="tujuan">Tujuan :</label>
                <div class="input-wrap">
                <textarea id="tujuan" placeholder="Tujuan Menyewa. Misal: kuliah, Sekolah Dll"></textarea>
                </div>
            </div>
    
            <!-- Notice -->
            <div class="notice">
                Asrama ini khusus Perempuan yang belum menikah. Bagi yang mendaftar harap memenuhi syarat ini. jika kedapatan anda sudah menikah, Maka harus bayar denda dan dikeluarkan.
            </div>
    
            <!-- Checkbox -->
            <div class="checkbox-row">
                <input type="checkbox" class="cb" id="setuju"/>
                <label for="setuju">Klik opsi ini jika anda menerima syarat tersebut.</label>
            </div>
            <div class="alert-warning" id="alert-warning">
                <svg viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                </svg>
                <div class="alert-text">
                    <strong></strong>
                    <span class="alert-msg" id="almg"></span>
                </div>
            </div>
            <!-- Button -->
            <div class="btn-row">
                <button type="submit" class="btn-daftar" id="tbdaftar" disabled>Daftar</button>
            </div>
        </div>
        <div class="loading_mode">
            <div class="jcc">
                <div class="loader"></div>
                <h4>Loading Process.</h4>
            </div>
        </div>
        <div class="succes_mode hide">
            <div class="alert-success">
                <svg viewBox="0 0 24 24" class="icon-success">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 
                            10-4.48 10-10S17.52 2 12 2zm-1 15l-5-5 
                            1.41-1.41L11 14.17l5.59-5.59L18 10l-7 7z"/>
                </svg>
                <div>
                    <strong>Pendaftaran Berhasil</strong>
                    <div>Data anda telah tersimpan.</div>
                </div>
            </div>
            <div class="df">
                <div class="jcc">
                    <h4>Username : <?= $nk ?></h4>
                    <h4>Password : <span id="show_pass"></span></h4>
                    <p>Harap Password Di Simpan</p>
                </div>
            </div>
            <div class="btn-row">
                <div class="btn-back">
                    <a href="index.php" class="btn-back">Laman Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>