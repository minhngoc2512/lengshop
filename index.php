<?php
require_once 'controller/ImageDetail.php';
require_once 'controller/Category.php';
require_once 'controller/User.php';
require_once 'controller/Product.php';
$product = new Product();
$imagedetail = new ImageDetail();
$user = new User();
$category = new Category();

session_start();


?>
<!DOCTYPE html>
<html>
<head>

    <title>Leng shop </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="resource/css/bootstrap.min.css" >
    <link href="resource/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="resource/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });

            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });

            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
    </script>
    <!-- start menu -->
    <link href="resource/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="resource/js/megamenu.js"></script>
    <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
    <!-- end menu -->
    <!-- top scrolling -->
    <script type="text/javascript" src="resource/js/move-top.js"></script>
    <script type="text/javascript" src="resource/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>
</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=1912645189005816";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<?php
include 'view/header-top.php';
?>
<div class="header-bottom">
<?php
include 'view/main-menu.php';
include 'route.php';
//include 'single.php';
//include 'content-main.php';
include 'view/footer.php';

?>
</div>
<!--<script src="resource/js/jquery.min.js" ></script>-->

<script type="text/javascript">
    $(document).ready(function() {

        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };


        $().UItoTop({ easingType: 'easeOutQuart' });

    });

    $(document).ready(function () {


        setTimeout(function () {
            $('#loginuser').hide(2000);
        }, 5000);


    });
</script>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
<script src="resource/js/easing.js" ></script>
<script src="resource/js/jquery.etalage.min.js" ></script>
<script src="resource/js/jquery.flexisel.js" ></script>
<script src="resource/js/jquery.jscrollpane.min.js" ></script>
<script src="resource/js/megamenu.js" ></script>
<script src="resource/js/move-top.js" ></script>
<script src="resource/js/jquery.wmuSlider.js" ></script>

<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>

<script type="text/javascript" src="resource/js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
        });
    });
</script>
<?php

?>


<!--<script src="https://uhchat.net/code.php?f=e3d2d8"></script>-->
<script src="https://uhchat.net/code.php?f=5b8332"></script>

</body>
</html>