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
                        <h2>Daftar Tamu</h2>
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
                            <th>ID Tamu</th>
                            <th>Nama</th>
                            <th>No. Meja</th>
                            <th>Berkunjung pada</th>
                            <th>Status</th>
                            <th>Pembayaran</th>
                            <th>Total Biaya Pesanan</th>
                            <th>Opsi</th>
                        </tr>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['guest_name']; ?></td>
                                <td><?= $row['table_num']; ?></td>
                                <td><?= $row['created_time']; ?></td>
                                <td>
                                    <?php
                                    if ($row['finished'] == 'Y')
                                        echo "<a href='#' class='btn btn-success'>Selesai</a>";
                                    else if ($row['finished'] == 'N')
                                        echo "<a href='#' class='btn btn-warning'>Belum Selesai</a>";
                                    else echo "<a href='#'>[N/A]</a>";
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($row['bill_paid'] == 'Y')
                                        echo "<a href='#' class='btn btn-success'>Telah Membayar</a>";
                                    else if ($row['bill_paid'] == 'N')
                                        echo "<a href='#' class='btn btn-danger'>Belum Membayar</a>";
                                    else echo "<a href='#'>[N/A]</a>";
                                    ?>
                                </td>
                                <td>Rp. <?= number_format($row['order_bill'], 2, ',', '.'); ?></td>
                                <td>
                                    <?php
                                    if ($row['bill_paid'] == 'N')
                                        echo "<a class='btn btn-primary' href='/admin/guest_list_do_pay/"
                                            . $row['id'] . "'>Lakukan Pembayaran!</a>";
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>


                </div>
            </div>
        </div>
    </div>
    <!-- end dashboard inner -->
</div>