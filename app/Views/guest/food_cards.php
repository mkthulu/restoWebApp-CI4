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
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <img class="img-fluid" src="<?= base_url('//images/logo/hero.png'); ?>" alt="">
                            </div>
                        </div>
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

                    <div class="row">
                        <?php foreach ($data as $row) : ?>
                            <div class="col col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                                <div class="card h-100">
                                    <img class="card-img-top" src="<?= base_url('//images/' . $row['food_img']); ?>" alt="Gambar <?= $row['food_name']; ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row['food_name']; ?></h5>
                                        <p class="card-text">Harga : &nbsp;Rp. <?= number_format($row['food_price'], 2, ',', '.'); ?></p>
                                        <a href="/guest/food_cards_detail/<?= $row['id']; ?>" class="btn btn-primary btn-block"><i class="fa fa-shopping-basket"></i> &nbsp;Lihat Detil</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- end dashboard inner -->
</div>