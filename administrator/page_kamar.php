<h4>Daftar Kamar</h4>
<div class="contenerkamar">
    <?php
    include '../config/konfigurasi.php';
    $batas = 10;
    $sql = "SELECT * FROM daftarkamar";
    $query = mysqli_query($koneksi, $sql);
    if(mysqli_num_rows($query) >= 1){
        while($datakamar = mysqli_fetch_assoc($query)){
            ?>
            <div  class="kartukamar">
                <h4><?php echo $datakamar['no_kamar']?></h4>
            </div>
            <?php
        }
    }else{
        ?><h1>Belum ada Data</h1><?php
    }
    ?>
</div>