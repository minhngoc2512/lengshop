<div class="footer">
    <div class="footer-top">
        <div class="wrap">
            <div class="col_1_of_footer-top span_1_of_footer-top">
                <ul class="f_list">
                    <li><img src="./resource/images/f_icon.png" alt=""/><span class="delivery">Free ship</span></li>
                </ul>
            </div>
            <div class="col_1_of_footer-top span_1_of_footer-top">
                <ul class="f_list">
                    <li><img src="./resource/images/f_icon1.png" alt=""/><span class="delivery">Customer Service :<span
                                    class="orange"> (+84) 000-2587 (freephone)</span></span></li>
                </ul>
            </div>
            <div class="col_1_of_footer-top span_1_of_footer-top">
                <ul class="f_list">
                    <li><img src="./resource/images/f_icon2.png" alt=""/><span class="delivery">Fast delivery & free returns</span>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="wrap">
            <div class="section group">
                <?php

                $value = $category->GetCateParent();
                foreach ($value as $data) {


                ?>

                <div class="col_1_of_5 span_1_of_5">

                    <h3 class="m_9"><?= $data['name'] ?></h3>
                    <ul class="sub_list">
                        <h4 class="m_10"></h4>
                        <?php

                            $value2 =$category->GetCateSecond($data['id']);
                            foreach($value2 as $data2) {
                                ?>
                                <li><a href="./index.php?page=product&cate2=<?php echo $data2['id']; ?>"> <?=$data2['name'] ?></a></li>

                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                    <?php
                }
                ?>
                <div class="fb-follow" data-href="https://www.facebook.com/minh.ngoc.779" data-layout="standard" data-size="small" data-show-faces="true"></div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="copy">
        <div class="wrap">
            <p>© Leng shop | Email<a href="./"> minhngoc2512@yahoo.com</a></p>
        </div>
    </div>
</div>