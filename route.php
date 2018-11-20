<?php


if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
    if ($page == 'single') {
        include 'view/detail.php';
    } else if ($page == 'product') {
        include 'view/content-product.php';
    } else if ($page == 'login') {
        $name = $_REQUEST['username'];
        $pass = $_REQUEST['pass'];
        if ($user->CheckUser($name, $pass)) {
            $_SESSION['user'] = $name;
            $_SESSION['bag'] = array();
            echo "<script> location.replace(\"./\"); </script>";
        } else {
            echo "<script> alert('Tài khoản không tồn tại!'); </script>";
            echo "<script> location.replace(\"./\"); </script>";
        }
    } else if ($page == 'logout') {
        unset($_SESSION['user']);
        unset($_SESSION['bag']);
        echo "<script> location.replace(\"./\"); </script>";
    } else if ($page == 'bag') {
        include('view/showBag.php');
    } else if ($page = "createAccount") {
        include 'view/CreateAccount.php';
    }
} elseif (isset($_REQUEST['search']) || isset($_REQUEST['cssmenu'])) {
    include 'view/content-product.php';
} elseif (isset($_REQUEST['buySucces'])) {
    include('view/Buy.php');
} elseif (isset($_REQUEST['submitAcc'])) {
    $name = $_REQUEST['name'];
    $pass = $_REQUEST['pass'];
    $email = $_REQUEST['email'];

    if ($user->AddUser($name, $pass, $email, 2)) {
        echo '<div id="loginuser" class="alert alert-success" > Tạo tài khoản thành công! Vui lòng đăng nhập để mua hàng.</div>';
        include('view/content-main.php');
    } else {
        echo '<div id="loginuser" class="alert alert-danger" > Tài khoản đã tồn tại!</div>';
        include('view/CreateAccount.php');

    }
} else {
    include 'view/content-main.php';
}

