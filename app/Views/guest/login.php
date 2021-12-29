<div class="container">
<button onclick="toLandingPage" style="position : absolute; top : 10px;left :10px" class="btn btn-primary out">About us</button>
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-transparent mb-0">
                    <h5 class="text-center">Selamat Datang di <span class="font-weight-bold text-primary">Resto Anyar</span></h5>
                </div>
                <div class="card-body">


                    <?php if (isset($_SESSION['msg'])) {
                        $alert_msg = $_SESSION['msg'];
                        $alert_color = $alert_msg['color'];
                        $alert_desc = $alert_msg['desc'];
                        echo "<div class='alert' style='color: $alert_color'>" . $alert_desc . "</div>";
                    } ?>
                    <?= form_open('guest/login'); ?>
                    <p>Silahkan, masukkan nama anda dan nomor meja yang anda tempati :</p>
                    <div class="form-group">
                        <input type="text" name="guest_name" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="table_num" class="form-control" placeholder="No. Meja" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="" value="Masuk" class="btn btn-primary btn-block">
                    </div>
                    <?= form_close(); ?>


                </div>
            </div>
        </div>
    </div>
</div>

<script>

document.querySelector('.out').addEventListener('click',() => {
    location.href = '<?= base_url('/aboutus')  ?>'
})




</script>