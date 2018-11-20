<?php
//require_once 'DB.php';
//$db =new DB();
$data1 = $product->GetAPro($_REQUEST['id']);


?>


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Edit</small>
                </h1>
            </div>
            <?php
           foreach ($data1 as $value1){

            ?>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" value="<?=$value1['name'] ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="price" value="<?php echo $value1['price']; ?>"/>
                    </div>
                    <div class="form-group">


                        <label>Insert image of product</label>
                        <input type="file" name="img" value="<?= $value1['image']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="cate_id" class="form-control">


                            <?php
                            foreach( $cate->GetACat($value1['id']) as  $cateV) {

                                echo "<option value='" . $cateV['id'] . "' >" . $cateV['name'] . " </option>";
                            }
                            $data = $cate->GetAllCat();
                           foreach ($data as $value) {

                                if ($value['parent_id'] != 0) {
                                    echo "<option value='" . $value['id'] . "' >" . $value['name'] . " </option>";
                                }
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Choose type</label>
                        <select name="type" class="form-control">
                            <option value="desktop"> Desktop</option>
                            <option value="mobile"> Mobile</option>
                            <option value="laptop"> Laptop</option>
                            <option value="tablet"> Tablet</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label>Display</label>
                        <input class="form-control" type="text" name="display" value="<?= $value1['display']; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Ram</label>
                        <input class="form-control" name="ram" value="<?= $value1['ram'] ?>"/>
                    </div>

                    <div class="form-group">
                        <label>GPU</label>
                        <input type="text" class="form-control" name="gpu" value="<?= $value1['gpu'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Power</label>
                        <input type="text" class="form-control" name="power" value="<?= $value1['power'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" name="intro" rows="3"><?= $value1['intro'] ?></textarea>
                        <script> CKEDITOR.replace("intro")</script>
                    </div>
                    <div class="form-group">
                        <label>Images Detail</label><br>
                        <input type="button" class="btn btn-success" value="Add Image Detail" id="insert_img">
                        <div id="insert"></div>

                    </div>


                    <button type="submit" class="btn btn-default">Product Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
                        <?php
                        }
                        ?>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

</div>
<script>


    $(document).ready(function () {
        $("#insert_img").click(function () {
            $("#insert").append('<div class="form-group" ><label>Images</label><input type="file" name="imgdetail[]"></div>');
        });
    });

</script>