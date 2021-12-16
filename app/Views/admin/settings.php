<!-- end sidebar -->
<!-- right content -->
<div id="content">
    <!-- topbar -->
    <div class="topbar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="full d-flex align-items-center">
                <button type="button" id="sidebarCollapse" class="sidebar_toggle">
                    <i class="fa fa-bars"></i>
                </button>
                <h1 class="text-white ml-3">RESTO ANYAR - ADMIN</h1>
            </div>
        </nav>
    </div>
    <!-- end topbar -->
    <!-- dashboard inner -->
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Pengaturan</h2>
                    </div>
                </div>
            </div>

            <div class="row bg-white">
                <div class="col p-4" style="box-sizing: border-box;box-shadow: 0px 1px 0px rgba(17,17,26,0.1); border-top : 2px solid blue">


                    <?php if (isset($_SESSION['msg'])) {
                        $alert_msg = $_SESSION['msg'];
                        $alert_color = $alert_msg['color'];
                        $alert_desc = $alert_msg['desc'];
                        echo "<div class='alert' style='color: $alert_color'>" . $alert_desc . "</div>";
                    } ?>

                    <?= form_open('admin/change_password'); ?>
                    <label class="form-label" for="password_old">Password Lama : </label>
                    <input class='form-control' type="password" name="password_old" id="password_old" required><br>
                    <label class="form-label" for="password_new">Password Baru : </label>
                    <input class='form-control' type="password" name="password_new" id="password_new" required><br>
                    <input class="btn btn-lg btn-primary float-right" type="submit" value="Simpan Perubahan">
                    <?= form_close(); ?>


                </div>
            </div>
        </div>
    </div>
    <!-- end dashboard inner -->
</div>