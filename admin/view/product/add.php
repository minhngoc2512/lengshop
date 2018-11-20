<?php
//require_once '../Database/DB.php';
//$dba =new DB();
?>


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
                <form action="./home.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="page_type" value="product_add"   >
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter name"/>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="price" placeholder="Please Enter Price"/>
                    </div>
                    <div class="form-group">
                        <label>Insert image of product</label>
                        <input type="file" name="img" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="cate_id" class="form-control">


                            <?php
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
                        <select name="type" class="form-control" >
                            <option value="desktop"> Desktop</option>
                            <option value="mobile"> Mobile</option>
                            <option value="laptop"> Laptop</option>
                            <option value="tablet"> Tablet</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label>Display</label>
                        <input class="form-control" type="text" name="display">
                    </div>
                    <div class="form-group">
                        <label>CPU</label>
                        <input class="form-control" name="cpu" placeholder="Please Enter CPU"/>
                    </div>

                    <div class="form-group">
                        <label>Ram</label>
                        <input class="form-control" name="ram" placeholder="Please Enter Ram"/>
                    </div>

                    <div class="form-group">
                        <label>GPU</label>
                        <input type="text" class="form-control" name="gpu">
                    </div>
                    <div class="form-group">
                        <label>Power</label>
                        <input type="text" class="form-control" name="power">
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" name="intro" rows="3"></textarea>
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
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

</div>
<script>
    function xac_nhan_xoa(msg) {
        if (window.confirm(msg)) {
            return true;
        }
        return false;

    }




</script>