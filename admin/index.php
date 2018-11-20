<!DOCTYPE html>
<?php
session_start();

if(isset($_SESSION['username'])){
  //  echo 'ok';
   Header("Location: ./home.php?page_admin=cate_list");
}else{
?>
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

</head>

<body>

<div class="container">
    <div class="row">
        <?php
        if(isset($_REQUEST['error'])){
            ?>
            <div class="alert alert-danger" >
                <p>
                    Kiểm tra thông tin tài khoản hoặc tài khoản này không có quyền truy cập
                </p>

            </div>
        <?php }?>
        <div class="col-md-4 col-md-offset-4">

            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="./route.php" method="post">
                        <fieldset>
                            <input type="hidden" name="login" value="login" >
                            <div class="form-group">
                                <input class="form-control" placeholder="User name" name="name" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="../resource/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../resource/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../resource/js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../resource/js/sb-admin-2.js"></script>

</body>

</html>
<?php } ?>