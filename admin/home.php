<?php
session_start();

if(isset($_SESSION['username'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Admin - Leng shop</title>

        <!-- Bootstrap Core CSS -->
        <link href="../resource/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../resource/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../resource/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../resource/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- DataTables CSS -->
        <link href="../resource/css/dataTables.bootstrap.css" rel="stylesheet">


        <!-- DataTables Responsive CSS -->
        <link href="../resource/css/dataTables.responsive.css" rel="stylesheet">
        <script src="../resource/admin/js/ckeditor/ckeditor.js"></script>
        <script src="../resource/admin/js/ckfinder/ckfinder.js"></script>
        <!--    <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>-->

    </head>

    <body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar">s</span>
                    <span class="icon-bar">v</span>
                    <span class="icon-bar">d</span>
                </button>
                <a class="navbar-brand" href="index.php">Admin - Leng shop</a>
            </div>
            <!-- /.navbar-header -->

            <div class="nav navbar-right">
                <!-- /.dropdown -->

                    <div class=" alert alert-success" > Hi! <?php $name=$_SESSION['username'];  echo $name; ?></div>
                    <a   href="./logout.php?logout=out">
                        <button class="btn btn-danger">Logout</button>
                    </a>




                <!-- /.dropdown -->
            </div>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">


                        <li>
                            <a href="#"><i class=""></i> Category<span></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="./home.php?page_admin=cate_list">List Category</a>
                                </li>
                                <li>
                                    <a href="./home.php?page_admin=cate_add">Add Category</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class=""></i> Product<span></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="home.php?page_admin=product_list">List Product</a>
                                </li>
                                <li>
                                    <a href="home.php?page_admin=product_add">Add Product</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class=""></i> User<span class=""></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="./home.php?page_admin=user_list">List User</a>
                                </li>
                                <li>
                                    <a href="./home.php?page_admin=user_add">Add User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <?php

        include 'route.php';
        ?>

        <!-- Page Content -->

        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!--<script src="../resource/js/jquery.min.js" ></script>-->

    <!-- Bootstrap Core JavaScript -->
    <script src="../resource/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../resource/js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../resource/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../resource/js/jquery.dataTables.min.js"></script>
    <script src="../resource/js/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
    <script>


        function xac_nhan_xoa(msg) {
            if (window.confirm(msg)) {
                return true;
            }
            return false;

        }
        $(document).ready(function () {
            $("#insert_img").click(function () {
                $("#insert").append("<div class='form-group' > <input type='file'  name='imagedetail[]' accept='image/*'>  </div><br>");
            });

            setTimeout(function () {
                $('#nocation').hide(2000);
            }, 5000);


        });
    </script>

    </body>

    </html>
    <?php
}else{
    echo " <script> location.replace(\"index.php\"); </script>";
   // Header("Location: http://localhost/MyWeb/admin/");
}
    ?>