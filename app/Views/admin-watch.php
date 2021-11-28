<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
    <!-- site metas -->
    <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- site icon -->
    <link rel="icon" href="/images/fevicon.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="/style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="/css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="/css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="/css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="/css/custom.css" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        html,
        body {
            color: black;
        }
    </style>
</head>

<body class="dashboard dashboard_1">

    <div class="full_container">
        <diclass= class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar_blog_1"></div>
                <div class="sidebar_blog_2">
                    <h4>Menu</h4>
                    <ul class="list-unstyled components">
                        <li class="active">
                            <a href="#dashboard" data-toggle="collapse" aria-expanded="false"><i class="fa fa-dashboard yellow_color"></i>
                                <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="/admin-create"><i class="fa fa-clock-o orange_color"></i>
                                <span>Add Items</span></a>
                        </li>


                        <li>
                            <a href="/admin-watch"><i class="fa fa-bar-chart-o green_color"></i>
                                <span>List Items</span></a>
                        </li>

                        <li>
                            <a href="/admin-pesanan"><i class="fa fa-bar-chart-o red_color"></i>
                                <span>List Pesanan</span></a>
                        </li>
                        <li>
                            <a href="settings.html"><i class="fa fa-cog purple_color"></i>
                                <span>Settings</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
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
                            <h1 class="text-white ml-3">Admin</h1>
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
                                    <h2>Tambah Items</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row bg-white">
                            <div class="col p-4" style="box-sizing: border-box;box-shadow: 0px 1px 0px rgba(17,17,26,0.1); border-top : 2px solid blue">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-white text-center " style="font-weight : bold;background-color: #FF6E00;">
                                            <th scope="col">no</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($items->getResult() as $item) { ?>

                                            <tr class="text-center">
                                                <td><?php echo $no;  ?></td>
                                                <td><?php echo $item->name;  ?></td>
                                                <td><?php echo $item->category;  ?></td>
                                                <td><?php echo $item->price;  ?></td>
                                                <td><?php echo $item->amount;  ?></td>
                                                <td><button class="badge badge-danger border-0 text-white"><a href="/admin-handle-delete?id=<?php echo $item->id ?>" class="text-white">delete</a></button> <button class="badge badge-warning border-0 text-white"><a href="/admin-edit?id=<?php echo $item->id ?>" class="text-white">edit</a></button> <button data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $item->id ?>" class="badge badge-success border-0" style="z-index : 1;">details</button></td>

                                            </tr>

                                            <div class="modal fade" id="exampleModal<?php echo $item->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $item->name ?></h5>
                                                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                                    value="<?php echo $item->name ?>" aria-describedby="emailHelp"
                                                                    disabled>
                                                                   
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label d-block">Image</label>
                                                                   <img src="/images/<?php echo $item->image ?>" alt="" style="height : 200px; ">
                                                                   
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Category</label>
                                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                                    value="<?php echo $item->category ?>" aria-describedby="emailHelp"
                                                                    disabled>
                                                                   
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Price</label>
                                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                                    value="Rp. <?php echo $item->price ?>" aria-describedby="emailHelp"
                                                                    disabled>
                                                                   
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Amount</label>
                                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                                    value="<?php echo $item->amount ?>" aria-describedby="emailHelp"
                                                                    disabled>
                                                                   
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Create At</label>
                                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                                    value="<?php echo $item->created_at ?>" aria-describedby="emailHelp"
                                                                    disabled>
                                                                   
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Upadted At</label>
                                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                                    value="<?php echo $item->updated_at ?>" aria-describedby="emailHelp"
                                                                    disabled>
                                                                   
                                                                </div>
                                                              
                                                               
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                          
                                                    </div>
                                                </div>
                                            </div>

                                        <?php $no++;
                                        }  ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end dashboard inner -->
            </div>
            </diclass="text-black fw-bolder" v>
    </div>
    <!-- jQ#71DFE7ery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- wow animation -->
    <script src="/js/animate.js"></script>
    <!-- select country -->
    <script src="/js/bootstrap-select.js"></script>
    <!-- owl carousel -->
    <script src="/js/owl.carousel.js"></script>
    <!-- chart js -->
    <script src="/js/Chart.min.js"></script>
    <script src="/js/Chart.bundle.min.js"></script>
    <script src="js/utils.js"></script>
    <script src="/js/analyser.js"></script>
    <!-- nice scrollbar -->
    <script src="/js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar("#sidebar");
    </script>
    <!-- custom js -->
    <script src="/js/chart_custom_style1.js"></script>
    <script src="/js/custom.js"></script>
</body>

</html>