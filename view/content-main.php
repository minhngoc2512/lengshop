<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php


$value = $product->GetAllPro();

$page = ceil(count($value)/6);
if(isset($_GET['pagination'])){
    $pagination = (int) $_GET['pagination'];
    $value = $product->getPagination($pagination);

}else{
    $value = $product->getPagination(0);
}


?>
    <div class="index-banner container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="./resource/icon/h4-slide3.png" alt="Los Angeles" style="width:100%;">
                    <div class="carousel-caption">
                        <H3>Apple</H3>
                        <p>Ipod audio</p>
                    </div>
                </div>

                <div class="item">
                    <img src="./resource/icon/h4-slide.png" alt="Chicago" style="width:100%;">
                    <div class="carousel-caption">
                        <h3>Aplle</h3>
                        <p>Smart phone</p>
                    </div>
                </div>

                <div class="item">
                    <img src="./resource/icon/h4-slide4.png" alt="New york" style="width:100%;">
                    <div class="carousel-caption">
                        <h3>Elictronlic</h3>
                        <p>Smart home</p>
                    </div>
                </div>
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

    </div>
<div class="main">
    <div class="wrap">
        <div class="content-top">
            <div class="lsidebar span_1_of_c1">
                <p><h4>Bạn có thể theo dõi chúng tôi</h4></p>
            </div>
            <div class="cont span_2_of_c1">
                <div class="social">
                    <ul>
                        <li class="facebook"><a href="#"><span> </span></a>
                            <div class="radius"><img src="./resource/images/radius.png"><a href="#"> </a></div>
                            <div class="border hide"><p class="num">1.51K</p></div>
                        </li>
                    </ul>
                </div>
                <div class="social">
                    <ul>
                        <li class="twitter"><a href="#"><span> </span></a>
                            <div class="radius"><img src="./resource/images/radius.png"></div>
                            <div class="border hide"><p class="num">1.51K</p></div>
                        </li>
                    </ul>
                </div>
                <div class="social">
                    <ul>
                        <li class="google"><a href="#"><span> </span></a>
                            <div class="radius"><img src="./resource/images/radius.png"></div>
                            <div class="border hide"><p class="num">1.51K</p></div>
                        </li>
                    </ul>
                </div>
                <div class="social">
                    <ul>
                        <li class="dot"><a href="#"><span> </span></a>
                            <div class="radius"><img src="./resource/images/radius.png"></div>
                            <div class="border hide"><p class="num">1.51K</p></div>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>


        <div class="content-bottom">

            <?php
            $i = 0;


            foreach ($value as $data) {
                if ($i % 3 == 0) {

                    ?>

                    <div class="box1">
                    <?php
                }

                ?>
                <div class="col_1_of_single1 span_1_of_single1">
                    <a href="./index.php?page=single&id=<?= $data['id']; ?>">
                        <div class="view1 view-fifth1">
                            <div class="top_box">
                                <h3 class="m_1"><?php echo $data['name']; ?></h3>
                                <p class="m_2"><?php echo $data['type']; ?></p>
                                <div class="grid_img">
                                    <div class="css3"><img width="183"
                                                           src="./resource/images/ImageProducts/<?= $data['image']; ?>"
                                                           alt=""></div>
                                    <div class="mask1">
                                        <div class="info">Chi tiết</div>
                                    </div>
                                </div>
                                <div class="price"><?php echo number_format($data['price']).'VND'; ?></div>
                            </div>
                        </div>

                    </a>
                    <ul class="list2"  style="margin-bottom: 0">
                        <li style="display: flex;justify-content: flex-end;align-items: center">
                                <span class="fa  fa-shopping-cart" style="color: white" ></span>

                            <ul class="icon1 sub-icon1 profile_img">

                                <li>
                                    <form action="#" method="post">
                                    <input  type="hidden" name="id" value="<?= $data['id'] ?>" />

                                        <input type="submit" name="submitbuy"  <?php if($data['sl']==0){echo 'disabled="true" value="Hết hàng" ';}else{ echo 'value=" Thêm vào giỏ hàng"';} ?>  class="active-icon c1" style="border: hidden;background: none;color: white ;text-align: center;"   >
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                        <?php
                $i++;

                if ($i%3==0) {
                    echo'</div>';
                }


            }

            echo '
                   
          
                   
                   
                   <div class="clear"></div>';

            ?>
                        <ul class="pagination pagination center-block">
                            <?php
                            for($i=1;$i<$page;$i++){
                                $pagination=$i*6;
                                echo "<li><a href='./?pagination=$pagination'>$i</a></li>";
                            }
                            ?>


                        </ul>

                </div>



                    </div>


        </div>
    </div>
</div>
<?php

if (isset($_REQUEST['submitbuy'])) {
    if(isset($_SESSION['bag'])) {
        $_SESSION['bag'][$_REQUEST['id']] = $_REQUEST['id'];
    }else{
        echo '<script>
                        alert("Vui lòng đăng nhập!");

                </script>';
    }
}

?>