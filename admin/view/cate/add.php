<?php
//require_once 'DB.php';
//$db = new DB();
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
                <form action="./home.php" method="POST">
                    <div class="form-group">
                        <input type="hidden" value="cate_add" name="page_type">
                        <label>Category Parent</label>
                        <select name="parent_id" class="form-control">

                            <option value="0">Parent Category</option>

                            <?php
                            $data = $cate->GetAllCat();
                            foreach ($data as $value){

                                if( $value['parent_id']==0 ) {
                                    echo "<option value='" . $value['id'] . "' >".$value['name']." </option>";
                                }
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Category Name" />
                    </div>
                    <button type="submit" class="btn btn-default">Category Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>