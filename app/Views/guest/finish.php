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


                    <div class="row justify-content-center">
                        <a href="#" class="btn btn-lg btn-success">Sedang dalam sesi pembayaran</a>
                    </div>

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