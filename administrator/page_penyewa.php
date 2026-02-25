<script>
    $(document).ready(function(){
        loadPenyewa();
    });
    function loadPenyewa(page = 1){
        
        $.ajax({
            url: "data_penyewa.php",
            type: "GET",
            data: { page: page },
            success: function(response){
                $('#pbp').addClass('hide');
                $('#pgp').addClass('show');
                $('.tabel-mode-P').removeClass('show');
                $("#dataPenyewa").html(response);
                setTimeout(() => {
                    $('#pbp').removeClass('hide');
                    $('#pgp').removeClass('show');
                    $('.tabel-mode-P').addClass('show');
                }, 100);
            }
        });
    }
</script>

<div class="cardadmin">
    <div class="edit-mode-P">
        adssad
    </div>

    <div class="tabel-mode-P show" id="dataPenyewa">
        <!-- Data AJAX Masuk Di Sini -->
    </div>
    <div class="loading_mode" id="pgp">
        <div class="loader-tabel-penyewa"></div>
    </div>
</div>
<div class="pembatas" id="pbp"></div>
