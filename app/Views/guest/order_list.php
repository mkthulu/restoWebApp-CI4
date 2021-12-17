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

                    <table class="table table-bordered">
                        <tr class="text-white text-center " style="font-weight : bold;background-color: #FF6E00;">
                            <th>ID Pesanan</th>
                            <th>No. Meja</th>
                            <th>Nama Makanan</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Penyajian</th>
                            <th>Dipesan pada</th>
                        </tr>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['table_num']; ?></td>
                                <td><?= $row['food_name']; ?></td>
                                <td><?= $row['amount']; ?></td>
                                <td><?= $row['desc']; ?></td>
                                <td>
                                    <?php
                                    if ($row['served'] == 'Y')
                                        echo "<a href='#' class='btn btn-success'>Sudah</a>";
                                    else if ($row['served'] == 'N')
                                        echo "<a href='#' class='btn btn-danger'>Belum</a>";
                                    else echo "<a href='#'>[N/A]</a>";
                                    ?>
                                </td>
                                <td><?= $row['created_time']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                    <script>
                        // REFRESH TIMER SEQUENCE FOR THIS PAGE
                        let timeout;
                        let pathname = location.pathname;

                        function myFunction() {
                            timeout = setTimeout(refreshFunc, 5000);
                        }

                        function refreshFunc() {
                            if (location.pathname != pathname) {
                                clearTimeout(timeout);
                            } else {
                                clearTimeout(timeout);
                                location.reload();
                            }
                        }
                        myFunction();
                    </script>


                </div>
            </div>
        </div>
    </div>
    <!-- end dashboard inner -->
</div>