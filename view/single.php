<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
$id = $_REQUEST['id'];
$value = $product->GetAPro($id);
foreach ($value as $data) {
    $sl = (integer)$data['sl'];
    $id = $data['id'];

    ?>

    <div class="single">
        <div class="wrap">
            <div style="/* border-radius:10px; */vertical-align: middle;display: grid;text-align: center;background: #08080b;padding-bottom: 5px;margin-top: -20px;height: 50px;">
                <span style="font-size: 20px ; margin-top:15px;color: #f7fafc">PRODUCT DETAIL</span></div>
            <div class="cont span_2_of_3">
                <div class="labout span_1_of_a1">
                    <!-- start product_slider -->
                    <ul id="etalage" class="etalage" style="display: block; width: 314px; height: auto;">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <?php
                             //   $query = "select * from image_detail where product_id=$id";
                                $value3 = $imagedetail->getImageDetail($id);
                                $numrow = count($value3);
                                for ($i = 0; $i < $numrow; $i++) {
                                    if ($i == 0) {

                                        ?>

                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <?php
                                    } else {
                                        ?>
                                        <li data-target="#myCarousel" data-slide-to="<?= $i ?>"></li>

                                        <?php
                                    }

                                } ?>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <!--                                <div class="item active">-->
                                <!--                                    <img src="resource/images/ImageDetail/dien-thoai-apple-iphone-7-gold-32gb-mn902-vn(1).jpg" alt="Los Angeles" style="width:100%;">-->
                                <!---->
                                <!--                                </div>-->
                                <?php

                                $ii = 0;
                               foreach ($value3 as $data5) {
                                    if ($ii == 0) {
                                        ?>
                                        <div class="item active">
                                            <img src="resource/images/ImageDetail/<?= $data5['image'] ?>" alt="Chicago"
                                                 style="width:100%;">

                                        </div>

                                        <?php
                                    } else {
                                        ?>

                                        <div class="item ">
                                            <img src="resource/images/ImageDetail/<?= $data5['image'] ?>" alt="Chicago"
                                                 style="width:100%;">

                                        </div>
                                    <?php }
                                    $ii = 1;
                                } ?>


                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <!--                        <li class="etalage_thumb thumb_1">-->
                        <!--                            <img class="img-thumb" src="resource/images/ImageProducts/-->
                        <?php //echo $data['image'];
                        ?><!--">-->
                        <!--                        </li>-->
                    </ul>

                    <!-- end product_slider -->
                </div>
                <div class="cont1 span_2_of_a1">
                    <h3 class="m_3"><?= $data['name']; ?></h3>
                    <div class="price_single">
                        <span class="reducedfrom">66.000 VNĐ</span>
                        <span class="actual"><?= number_format($data['price']) ?>VNĐ</span>
                    </div>
                    <?php
                    if ($sl > 0) {

                        echo '
                         <div  style="    font-family: \'Open Sans\', sans-serif;
                            cursor: pointer;
                            border-radius: 20px;
                            outline: none;
                            display: inline-block;
                            font-size: 0.85em;
                            padding: 10px ;
                            background: #01B800;
                            border-bottom: 4px solid #01B800;
                            color: #FFF;
                            text-transform: uppercase;
                            -webkit-transition: all 0.3s ease-in-out;
                            -moz-transition: all 0.3s ease-in-out;
                            -o-transition: all 0.3s ease-in-out;transition: all 0.3s ease-in-out;">PRODUCT AVAILABLE

                    </div><br>
                    <br>
                        ';
                    } else {
                        echo '
                         <div  style="    font-family: \'Open Sans\', sans-serif;
                            cursor: pointer;
                              border-radius: 20px;
                            outline: none;
                            display: inline-block;
                            font-size: 0.85em;
                            padding: 10px ;
                            background: #850400;
                            border-bottom: 4px solid #850400;
                            color: #FFF;
                            text-transform: uppercase;
                            -webkit-transition: all 0.3s ease-in-out;
                            -moz-transition: all 0.3s ease-in-out;
                            -o-transition: all 0.3s ease-in-out;transition: all 0.3s ease-in-out;">PRODUCT NOT AVAILABLE

                    </div><br><BR>
                        ';
                    }


                    ?>
                    <div class="btn_form">
                        <form action="#" method="post">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <input type="submit" name="submitbuy" <?php if ($data['sl'] == 0) {
                                echo 'disabled="true"';
                            } ?> value="buy now" title="">
                        </form>
                    </div>


                    <button id="detail" style="
                    font-family: 'Open Sans', sans-serif;
                    cursor: pointer;
                    border: none;
                    outline: none;
                    display: inline-block;
                    font-size: 0.85em;
                    padding: 10px 34px;
                    background: #241c1e;
                    border-bottom: 4px solid rgba(36,28,30,0.71);
                    color: #FFF;
                    text-transform: uppercase;
                    -webkit-transition: all 0.3s ease-in-out;
                    -moz-transition: all 0.3s ease-in-out;
                    -o-transition: all 0.3s ease-in-out;transition: all 0.3s ease-in-out;">DETAIL

                    </button>
                </div>
                <div class="clear"></div>
                <div class="detail-table">
                    <table class="table-fill">
                        <thead>
                        <tr>
                            <th class="text-left">Ẩn</th>
                            <th class="text-left"></th>
                        </tr>
                        </thead>
                        <tbody class="table-hover">
                        <tr>
                            <td class="text-left">Màn hình</td>
                            <td class="text-left"><?= $data['display'] ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Ram</td>
                            <td class="text-left"><?= $data['ram'] ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">CPU</td>
                            <td class="text-left"><?= $data['cpu']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">GPU</td>
                            <td class="text-left"><?= $data['gpu']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Power</td>
                            <td class="text-left"><?= $data['power']; ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="nbs-flexisel-container">
                    <div class="nbs-flexisel-inner">
                        <ul id="flexiselDemo3" class="nbs-flexisel-ul" style="left: -297.818px; display: block;">
                            <?php
                            $value = $product->GetAllPro();
                           foreach ($value as $data3) {
                                ?>
                                <li class="nbs-flexisel-item" style="width: 175.6px;"><img
                                            src="resource/images/ImageProducts/<?= $data3['image'] ?>">
                                    <div class="grid-flex"><a href="../index.php?page=single&id=<?= $data3['id']; ?>"><p
                                                    class="alert alert-success">View Detail</p></a>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <div class="nbs-flexisel-nav-left" style="top: 74.5px;"></div>
                        <div class="nbs-flexisel-nav-right" style="top: 74.5px;"></div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(window).load(function () {
                        $("#flexiselDemo1").flexisel();
                        $("#flexiselDemo2").flexisel({
                            enableResponsiveBreakpoints: true,
                            responsiveBreakpoints: {
                                portrait: {
                                    changePoint: 480,
                                    visibleItems: 1
                                },
                                landscape: {
                                    changePoint: 640,
                                    visibleItems: 2
                                },
                                tablet: {
                                    changePoint: 768,
                                    visibleItems: 3
                                }
                            }
                        });
                        $("#flexiselDemo3").flexisel({
                            visibleItems: 5,
                            animationSpeed: 1000,
                            autoPlay: true,
                            autoPlaySpeed: 3000,
                            pauseOnHover: true,
                            enableResponsiveBreakpoints: true,
                            responsiveBreakpoints: {
                                portrait: {
                                    changePoint: 480,
                                    visibleItems: 1
                                },
                                landscape: {
                                    changePoint: 640,
                                    visibleItems: 2
                                },
                                tablet: {
                                    changePoint: 768,
                                    visibleItems: 3
                                }
                            }
                        });
                    });
                </script>
                <div class="toogle">
                    <h3 class="m_3">Product Details</h3>
                    <p class="m_text"><?= $data['intro'] ?></p>
                </div>
            </div>
            <div class="fb-follow" data-href="https://www.facebook.com/minh.ngoc.779" data-layout="standard"
                 data-size="small" data-show-faces="true"></div>

            <div class="clear"></div>
            <div class="fb-comments"
                 data-href="https://developers.facebook.com/docs/plugins/comments#lengshop2512_<?= $data['id'] ?>"
                 data-numposts="5"></div>
        </div>
    </div>
    <?php
} ?>
<script>
    $(document).ready(function () {
        $(".detail-table").hide();
        $("#detail").click(function () {
            $(".detail-table").show(1000);
        });
        $(".text-left").click(function () {
            $(".detail-table").hide(1000);
        });
    });
</script>
<?php
if (isset($_REQUEST['submitbuy'])) {
    if (isset($_SESSION['bag'])) {
        $_SESSION['bag'][$_REQUEST['id']] = $_REQUEST['id'];
    } else {
        echo '<script>
                        alert("Vui lòng đăng nhập!");
                </script>';
    }
}
?>