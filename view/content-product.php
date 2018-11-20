<?php
$value = null;
$str = null;
$page=null;


if (isset($_REQUEST['cate'])) {
    $id = $_REQUEST['cate'];
    $valuetmp = $category->GetCateSecond($id);
    $i = 0;
    $query = "";
   foreach ($valuetmp as $data) {
        $id2 = $data['id'];


        if ($i == 0) {
            $query .= "select * from products where cate_id=$id2 ";

        } else {
            $query .= " or cate_id='$id2'";
        }
        $i++;


    }

    $value = $dbP->conn->query($query);

} elseif (isset($_REQUEST['cate2'])) {
    $name = $_REQUEST['cate2'];
    $id = $_REQUEST['cate2'];
    $value = $product->GetCate_id($id);
    $page = ceil(count($value)/6);
    if(isset($_GET['pagination'])){
        $pagination = (int) $_GET['pagination'];
        $value = $product->getPaginationByCate_id($id,$pagination);

    }else{
        $value = $product->getPaginationByCate_id($id,0);
    }




} elseif (isset($_REQUEST['search'])) {
    $str = $_REQUEST['search'];

    $value =$product->search($str);


} elseif (isset($_REQUEST['cssmenu'])) {
    $type = $_REQUEST['cssmenu'];
    $value = $product->GetType($type);


}
?>
<div class="login">
    <div class="wrap">

        <div class="cont span_2_of_3">
            <?php if (isset($_REQUEST['sreach'])) echo '<div class=" alert alert-success" > Tìm kiếm: <b>.' . $str . '</b></div>'; ?>

            <?php
            $i = 0;
               // var_dump($value);
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
                                                           src="resource/images/ImageProducts/<?= $data['image']; ?>"
                                                           alt=""></div>
                                    <div class="mask1">
                                        <div class="info">Quick View</div>
                                    </div>
                                </div>
                                <div class="price"><?php echo number_format($data['price']) . ' VNĐ'; ?></div>
                            </div>
                        </div>

                    </a>
                    <ul class="list2">
                        <li>
                            <img src="./resource/images/plus.png" alt="">

                            <ul class="icon1 sub-icon1 profile_img">

                                <li>
                                    <form action="#" method="post">
                                        <input type="hidden" name="id" value="<?= $data['id'] ?>"/>

                                        <input type="submit" name="submitbuy"   <?php if($data['sl']==0){echo 'disabled="true" value=" Product not available" ';}else{ echo 'value=" Add To Bag"';} ?>   class="active-icon c1"
                                               style="border: hidden;background: none;color: white ;text-align: center;"
                                               >
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>


                <?php
                $i++;
                if ($i % 3 == 0) {
                    ?>
                    </div>
                    <?php
                }

            }
            ?>


            <div class="clear"></div>
        </div>
    </div>
    <ul class="pagination pagination center-block">
        <?php
        if(isset($_REQUEST['cate2'])) {


            for ($i = 1; $i < $page; $i++) {
                $pagination = $i * 6;
                echo "<li><a href='./?page=product&pagination=$pagination&cate2=" . $_REQUEST['cate2'] . "'>$i</a></li>";
            }
        }
        ?>


    </ul>
    <div class="clear"></div>
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