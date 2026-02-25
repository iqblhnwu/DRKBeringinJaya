<?php
include "../config/konfigurasi.php";

$limit = 2;
$page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1){
    $page = 1;
} 
$offset = ($page - 1) * $limit;

// Hitung total data
$totalQuery = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM daftarpenyewa");
$totalData  = mysqli_fetch_assoc($totalQuery)['total'];
$totalPages = ceil($totalData / $limit);

// Ambil data sesuai limit
$sql = "SELECT dp.*, dk.no_kamar 
        FROM daftarpenyewa dp 
        INNER JOIN daftarkamar dk ON dk.penghuni = dp.id
        LIMIT $limit OFFSET $offset";

$query = mysqli_query($koneksi, $sql);

$i = $offset + 1;
// $sql = "SELECT dp.*, dk.no_kamar FROM daftarpenyewa dp INNER JOIN daftarkamar dk ON dk.penghuni = dp.id";
// $query = mysqli_query($koneksi, $sql);
?>

<h4>Tabel Penyewa</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Asal Daerah</th>
                <th>No.Hp</th>
                <th>No.Hp Ortu</th>
                <th>Tujuan</th>
                <th>Kamar</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (mysqli_num_rows($query) > 0) {
                    $i = 1; // ✅ Dipindah ke luar while loop
                    while ($dataP = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= ($dataP['nama']) ?></td>
                            <td><?= ($dataP['asal_daerah']) ?></td>
                            <td><?= ($dataP['nohp']) ?></td>
                            <td><?= ($dataP['nohp_ortu']) ?></td>
                            <td><?= ($dataP['tujuan']) ?></td>
                            <td><?= ($dataP['no_kamar']) ?></td>
                            <td>
                                <button class="btn-edit-admin" id="<?=$dataP['id']?>" title="EditPenyewa=?<?=$dataP['id']?>"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button class="btn-hapus-admin" id="<?=$dataP['id']?>" title="HapusPenyewa=?<?=$dataP['id']?>"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php
                        $i++; 
                    }
                }else{
                    ?>
                    <tr>
                        <td colspan="8" style="text-align:center;">Belum Ada Data!</td> 
                    </tr>
                    <?php 
                } 
                ?>
        </tbody>
    </table>
<div class="paginasiadmin">
    <?php 
    if($page > 1){ 
        ?>
        <span class="pagnav" onclick="loadPenyewa(<?= $page-1 ?>)">◀</span>
        <?php 
    } 
    for($p=1; $p <= $totalPages; $p++){ 
        ?>
        <span class="pagnav <?= ($p == $page) ? 'pagktif' : '' ?>" onclick="loadPenyewa(<?= $p ?>)"><?= $p ?></span>
        <?php 
    } 
    if($page < $totalPages){ ?>
        <span class="pagnav" onclick="loadPenyewa(<?= $page+1 ?>)">▶</span>
    <?php 
    } 
    ?>
</div>