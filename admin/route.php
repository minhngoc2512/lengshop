<?php
require_once 'controller/Product.php';
require_once 'controller/User.php';
require_once 'controller/Category.php';
require_once 'controller/ImageDetail.php';
$product = new Product();
$user = new User();
$cate = new Category();
$imgDetail = new ImageDetail();
if(!isset($_SESSION['username']))session_start();

if (isset($_SESSION['username'])) {


    if (isset($_REQUEST['page_admin'])) {
        $page = $_REQUEST['page_admin'];
        echo $page . '<br>';
        if ($page == 'cate_list') {
            include './view/cate/list.php';
        } else if ($page == 'cate_edit') {
            include './view/cate/edit.php';
        } else if ($page == 'user_edit') {
            include './view/user/edit.php';
        } else if ($page == 'user_add') {
            include './view/user/add.php';
        } else if ($page == 'cate_add') {
            include './view/cate/add.php';
        } else if ($page == 'product_add') {
            include './view/product/add.php';
        } else if ($page == 'product_edit') {
            include './view/product/edit.php';
        } else if ($page == 'user_list') {
            include './view/user/list.php';
        } else if ($page == 'product_list') {
            include './view/product/list.php';
        }

    } elseif (isset($_REQUEST['page_type'])) {
        $page = $_REQUEST['page_type'];
        if ($page == 'user_add') {

                if($user->AddUser($_REQUEST['username'], $_REQUEST['pass'], $_REQUEST['email'], $_REQUEST['level'])){
                echo '<div class="alert alert-success" id="nocation"  style="width: 60% ;float: right;margin-right: 10%;"> Add user ' . $_REQUEST['username'] . ' success!</div>';
                include './view/user/list.php';
            } else {
                echo '<div class="alert alert-danger" id="nocation"  style="width: 60% ;float: right;margin-right: 10%;"> Add user ' . $_REQUEST['username'] . ' Fail! This user existed!</div>';
                include './view/user/list.php';

            }
        } elseif ($page == 'user_delete') {

            $user->DeleteUser($_REQUEST['id']);
            echo '<div class="alert alert-success " id="nocation"  style="width: 60% ;float: right;margin-right: 10%;" > Delete user ' . $_REQUEST['username'] . ' success!</div>';

            include './view/user/list.php';


        } elseif ($page == 'user_editpost') {
            $pass = $_REQUEST['pass'];
            $user->UpdateUser($_REQUEST['id'], $_REQUEST['username'], $pass, $_REQUEST['email'], $_REQUEST['level']);
            echo '<div class="alert alert-success " id="nocation"  style="width: 60% ;float: right;margin-right: 10%;" > Update user ' . $_REQUEST['username'] . ' success!</div>';
            include './view/user/list.php';


        } elseif ($page == 'user_edit') {
            include './view/user/edit.php';
        } elseif ($page == 'cate_delete') {

            $cate->DelCat($_REQUEST['id']);
            echo '<div class="alert alert-success " id="nocation"  style="width: 60% ;float: right;margin-right: 10%;" > Delete cate ' . $_REQUEST['name'] . ' success!</div>';
            include './view/cate/list.php';

        } elseif ($page == 'cate_add') {

               if($cate->AddCat($_REQUEST['name'],$_REQUEST['parent_id'])){
                echo '<div class="alert alert-success " id="nocation"  style="width: 60% ;float: right;margin-right: 10%;" > Add cate ' . $_REQUEST['name'] . ' success!</div>';
                include './view/cate/list.php';
            } else {
                echo '<div class="alert alert-danger " id="nocation"  style="width: 60% ;float: right;margin-right: 10%;" > Add cate ' . $_REQUEST['name'] . ' fail! This cate\'s name existed!</div>';
                include './view/cate/list.php';
            }
        } elseif ($page == 'cate_edit') {
            if ( $cate->UpdateCat($_REQUEST['id'], $_REQUEST['name'], $_REQUEST['parent_id']) == true) {

                echo '<div class="alert alert-success " id="nocation"  style="width: 60% ;float: right;margin-right: 10%;" > Update cate ' . $_REQUEST['name'] . ' success!</div>';
                include './view/cate/list.php';
            } else {
                echo '<div class="alert alert-danger " id="nocation"  style="width: 60% ;float: right;margin-right: 10%;" > Update cate ' . $_REQUEST['name'] . ' fail! This cate\'s name is existed!</div>';
                include './view/cate/list.php';
            }

        } elseif ($page == 'product_add') {
            if ($product->CheckName( $_REQUEST['name']) == true) {
                $file = $_FILES['img'];
                if (strpos($file['type'], 'mage') == true) {
                    if (file_exists('../resource/images/ImageProducts/' . $file['name']) == false) {
                        move_uploaded_file($file['tmp_name'], '../resource/images/ImageProducts/' . $file['name']);
                        $product->AddPro($_REQUEST['name'], $_REQUEST['price'], $file['name'], $_REQUEST['cate_id'], $_REQUEST['display'], $_REQUEST['ram'], $_REQUEST['cpu'], $_REQUEST['gpu'], $_REQUEST['power'], $_REQUEST['intro'], $_REQUEST['type']);
                        $data = $product->GetAProName( $_REQUEST['name']);
                        foreach ($data as $value) {
                            $file2 = $_FILES['imagedetail'];
                            for ($i = 0; $i < count($file2['name']); $i++) {
                                if (file_exists('../resource/images/ImageDetail/' . $file2['name'][$i]) == false) {
                                    move_uploaded_file($file2['tmp_name'][$i], '../resource/images/ImageDetail/' . $file2['name'][$i]);
                                    $imgDetail->AddImg($file2['name'][$i], $value['id']);
                                }
                            }
                        }

                        echo '<div class="alert alert-success " id="nocation"  style="width: 60% ;float: right;margin-right: 10%;" > Add product ' . $_REQUEST['name'] . ' success!</div>';
                        include './view/product/list.php';


                    } else {
                        echo '<div class="alert alert-danger " id="nocation"  style="width: 60% ;float: right;margin-right: 10%;" > Add product ' . $_REQUEST['name'] . ' fail! File image of product existed!</div>';
                        include './view/product/add.php';


                    }


                } else {
                    echo '<div class="alert alert-danger " id="nocation"  style="width: 60% ;float: right;margin-right: 10%;" > Add product ' . $_REQUEST['name'] . ' fail! Flile image of product error type file!</div>';
                    include './view/product/add.php';
                }


            } else {
                echo '<div class="alert alert-danger " id="nocation"  style="width: 60% ;float: right;margin-right: 10%;" > Add product ' . $_REQUEST['name'] . ' fail! This cate\'s name is existed!</div>';
                include './view/product/list.php';

            }
        } elseif ($page == 'product_delete') {


            $product->DeletePro($_REQUEST['id']);


            echo '<div class="alert alert-success " id="nocation"  style="width: 60% ;float: right;margin-right: 10%;" > Delete product ' . $_REQUEST['name'] . ' success!</div>';
            include './view/product/list.php';

        }elseif($page=='getproduct_edit'){
            include './view/product/edit.php';


        }


    } elseif (isset($_REQUEST['logout'])) {
        unset($_SESSION['username']);
        echo " <script> location.replace(\"./\"); </script>";
    }
} else {
    if (isset($_REQUEST['login']) && isset($_REQUEST['name']) && isset($_REQUEST['pass'])) {
        $name = $_REQUEST['name'];
        $pass = $_REQUEST['pass'];
        if ($user->CheckUser($name, $pass) == true)
        {
            $_SESSION["username"] = "$name";
            echo " <script> location.replace(\"home.php?page_admin=cate_list\"); </script>";


        } else {
           echo " <script> location.replace(\"index.php?error=error\"); </script>";

        }
    } else {
        echo " <script> location.replace(\"./\"); </script>";


    }
}
