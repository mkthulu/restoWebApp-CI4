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
                        <h2>Daftar Makanan</h2>
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

                    <table class="table table-bordered">
                        <tr class="text-white text-center " style="font-weight : bold;background-color: #FF6E00;">
                            <th>ID Makanan</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Dibuat</th>
                            <th>Diubah</th>
                            <th>Opsi</th>
                        </tr>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['food_name']; ?></td>
                                <td>Rp. <?= number_format($row['food_price'], 2, ',', '.'); ?></td>
                                <td><?= $row['food_img']; ?></td>
                                <td><?= $row['created_at']; ?></td>
                                <td><?= $row['last_update']; ?></td>
                                <td><a class="btn btn-primary" href="/admin/food_list_detail/<?= $row['id']; ?>">Ubah Data</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>


                </div>
            </div>
        </div>
    </div>
    <!-- end dashboard inner -->
</div>