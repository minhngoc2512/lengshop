
<?php
/**
 * Created by PhpStorm.
 * User: Minh Ngoc
 * Date: 3/27/2017
 * Time: 6:47 PM
 */

if(isset($_REQUEST['logout'])){

    session_start();
    unset($_SESSION['username']);
    echo " <script> location.replace(\"./\"); </script>";
   // Header("Location:  http://localhost/MyWeb/admin/");
}