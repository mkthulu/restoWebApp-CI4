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
                <h1 class="text-white ml-3">RESTO ANYAR</h1>
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
                        <h2>Pesan Makanan</h2>
                    </div>
                </div>
            </div>

            <div class="row bg-white">
                <div class="col p-4" style="box-sizing: border-box;box-shadow: 0px 1px 0px rgba(17,17,26,0.1); border-top : 2px solid blue">


                    <div class="container">
                        <?php if (isset($_SESSION['msg'])) {
                            $alert_msg = $_SESSION['msg'];
                            $alert_color = $alert_msg['color'];
                            $alert_desc = $alert_msg['desc'];
                            echo "<div class='alert' style='color: $alert_color'>" . $alert_desc . "</div>";
                        } ?>

                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-fluid w-100" src="<?= base_url('//images/' . $row['food_img']); ?>" alt="Pre-tampilan gambar" id="img-preview">
                            </div>
                            <div class="col-md-6">
                                <?= form_open('guest/food_form_do_order', [
                                    'enctype' => 'multipart/form-data',
                                    'id' => 'foodFormOrder'
                                ]); ?>
                                <input class='form-control hidden' type="number" name="food_id" id="food_id" value="<?= $row['id']; ?>" hidden readonly required>
                                <label class="form-label" for="food_name">Nama Makanan : </label>
                                <input class='form-control' type="text" name="food_name" id="food_name" value="<?= $row['food_name']; ?>" readonly><br>
                                <label class="form-label" for="food_name">Harga : </label>
                                <input class='form-control' type="text" name="food_price" id="food_price" value="Rp. <?= number_format($row['food_price'], 2, ',', '.'); ?>" readonly><br>
                                <label class="form-label" for="amount">Masukkan Jumlah : </label>
                                <input class='form-control' type="number" name="amount" id="amount" value="1" required><br>
                                <label class="form-label" for="desc">Tambahkan Keterangan : </label>
                                <textarea class='form-control' name="desc" id="desc" required></textarea><br>
                                <a class="btn btn-primary btn-lg float-right" href="#" id="buttonFoodFormOrder"><i class="fa fa-shopping-basket"></i> &nbsp;Pesan Sekarang!</a>
                                <div style="display: block; height: 2em;"></div>
                                <?= form_close(); ?>
                                <script>
                                    document.getElementById("buttonFoodFormOrder").onclick = function() {
                                        document.getElementById("foodFormOrder").submit();
                                    }
                                </script>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- end dashboard inner -->
</div>