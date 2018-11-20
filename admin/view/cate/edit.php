<?php
$data = $cate->GetACat($_REQUEST['id'])



?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>Edit</small>

                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="./home.php" method="POST">
                    <?php
                    foreach ($data as $value){
                        ?>
                        <div class="form-group">
                            <input type="hidden" name="page_type" value="cate_edit" >
                            <input type="hidden" name="id" value="<?php echo $value['id']; ?>" >
                            <label>Category Parent</label>
                            <select name="parent_id" <?php if($value['parent_id']==0)echo 'disabled="true"'; ?> class="form-control">
                                <option value="<?php echo $value['parent_id']; ?>"> <?php
                                    $data3 = $cate->GetACat($value['parent_id']);
                                    foreach ($data3 as $value3){
                                    echo $value3['name'];} ?></option>
                                <?php
                                $data1 = $cate->GetAllCat();
                                foreach ($data1 as $value1) {
                                    if ($value['id'] != $value1['id']) {
                                        if ($value1['parent_id'] == 0) {

                                            echo "<option value='" . $value1['id'] . "' >" . $value1['name'] . " </option>";
                                        }
                                    }
                                }

                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" name="name" value="<?php echo $value['name']; ?>" placeholder="Please Enter Category Name"/>
                        </div>
                    <?php } ?>
                    <button type="submit" class="btn btn-default">Category Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>