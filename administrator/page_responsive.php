<?php
session_start();

include '../config/konfigurasi.php';
?>

<script>
  $(document).ready(function(){
    $.post('page_penyewa.php',{
    }, function(respon){
      $('#tampilkan').html(respon);
    })
  })
</script>

<div id="tampilkan"></div>