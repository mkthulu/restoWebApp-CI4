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
                        <h2>Detil Pesanan</h2>
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

                    <?= form_open('admin/order_form_action'); ?>

                    <label class="form-label" for="id">No. Pesanan : </label>
                    <input class='form-control' type="number" name="id" id="id" value="<?= $row['id']; ?>" readonly required><br>
                    <label class="form-label" for="table_num">No. Meja : </label>
                    <input class='form-control' type="number" name="table_num" id="table_num" value="<?= $row['table_num']; ?>" readonly required><br>
                    <label class="form-label" for="food_name">Nama Makanan : </label>
                    <input class='form-control' type="text" name="food_name" id="food_name" value="<?= $row['food_name']; ?>" readonly required><br>
                    <label class="form-label" for="amount">Jumlah : </label>
                    <input class='form-control' type="number" name="amount" id="amount" value="<?= $row['amount']; ?>" readonly required><br>
                    <label class="form-label" for="desc">Keterangan : </label>
                    <input class='form-control' type="text" name="desc" id="desc" value="<?= $row['desc']; ?>" readonly required><br>
                    <input class="btn btn-lg btn-danger float-right" type="submit" value="Hidangkan!">

                    <?= form_close(); ?>

                    <img src="<?= base_url('//images/' . $row['food_img']); ?>" alt="Pre-tampilan gambar" id="img-preview">


                </div>
            </div>
        </div>
    </div>
    <!-- end dashboard inner -->
</div>