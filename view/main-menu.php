<link rel="stylesheet" href="./resource/css/bootstrap.min.css">
<div class="wrap">
    <!-- start header menu -->
    <ul class="megamenu skyblue">

        <li><a class="color1" href="./index.php">Home</a></li>

        <?php
        $value = $category->GetCateParent();

        $i = 1;
       foreach($value as $data) {

            $i++;
            ?>
            <li><a class="color<?php echo $i; ?>"
                   href=""><?php echo $data['name']; ?></a>
<!--                   href="./index.php?page=product&cate=--><?php //echo $data['id']; ?><!--">--><?php //echo $data['name']; ?><!--</a>-->
                <div class="megapanel">
                    <div class="row">
                        <div class="col1">
                            <div class="h_nav">
                                <h4>Category</h4>
                                <ul>
                                    <?php
                                    $value2 = $category->GetCateSecond($data['id']);
                                    foreach ($value2 as $data2) {
                                        ?>
                                        <li>

                                            <a href="./index.php?page=product&cate2=<?php echo $data2['id']; ?>"> <?php echo $data2['name']; ?></a>
                                        </li>

                                        <?php
                                    }
                                    ?>
                                </ul>


                            </div>
                            <div class="col1">
                                <div class="h_nav"><img height="200"
                                                        src="http://i.dell.com/sites/imagecontent/products/PublishingImages/xps-15-9550-laptop/laptop-xps-15-9550-pdp-polaris-08.jpg"
                                                        alt=""/></div>
                            </div>
                        </div>
            </li>
        <?php } ?>

        <?php if (isset($_SESSION['user']) == false) { ?>


            <li><a class="color6">Account</a>
                <div class="megapanel">
                    <div class="col1">
                        <div class="h_nav">
                            <h4>Manager account</h4>
                            <ul>
                                <li><a>Login</a></li>
                                <form class="login-main" action="./index.php?page=login" method="post">
                                    <li><input type="text" name="username" placeholder="User name"></li>
                                    <li><input type="password" name="pass" placeholder="Password"></li>
                                    <li>
                                        <button type="submit">Login</button>
                                    </li>
                                </form>
                                <li><br><a href="./index.php?page=createAccount">

                                        <button class="btn btn-info">Create account</button>
                                    </a></li>

                            </ul>

                        </div>
                    </div>


                </div>
            </li>
            <?php
        }
        ?>


        <?php if (isset($_SESSION['user'])) {
            $username = $_SESSION['user'] ?>
            <li style=" float: right ; ">
                <a style="background: #cc0006; margin-left: 10px" href="./index.php?page=bag">
                    <div style="width: 50px;height: auto">

                        <div class="cart-button cart-button_theme_elegant cart-button_trigger_redirect">

                        <span class="cart-button__item-count"><?php
                            $a = $_SESSION['bag'];
                            if (empty($a)) {
                                echo 0;
                            } else {
                                echo count($a) + 1;
                            }
                            ?></span>
                        </div>

                        <img width=20 src="./resource/images/Buyicon.png">

                    </div>
                </a>

            </li>

            <li style="float: right;"><a href="./index.php?page=logout" style="background: #cc1f08; margin-left: 10px">Logout</a>

            </li>
            <li style="float: right;"><a style="background: #11cc06;"><?= $username; ?></a>

            </li>
        <?php } ?>


    </ul>

    <div class="clear"></div>
</div>
</div>