<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-transparent mb-0">
                    <h5 class="text-center">Login <span class="font-weight-bold text-primary">Admin</span></h5>
                </div>
                <div class="card-body">
                    <?php if (isset($_SESSION['msg'])) {
                        $alert_msg = $_SESSION['msg'];
                        $alert_color = $alert_msg['color'];
                        $alert_desc = $alert_msg['desc'];
                        echo "<div class='alert' style='color: $alert_color'>" . $alert_desc . "</div>";
                    } ?>
                    <?= form_open('admin/login'); ?>
                    <p>Silahkan, masukkan kata sandi :</p>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="* * * * * *">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="" value="Login" class="btn btn-primary btn-block">
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>