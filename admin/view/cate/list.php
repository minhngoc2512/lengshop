<?php
//require_once '../Database/DB.php';
//$db = new DB();
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>

                </h1>
            </div>


            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category Parent</th>

                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $data=$cate->GetAllCat();

               foreach ($data as $value) {
                    ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['name'] ?></td>
                        <td><?php echo $value['parent_id'] ?></td>

                        <td class="center"><i class=""></i><a onclick="xac_nhan_xoa();" href="./home.php?page_type=cate_delete&id=<?php echo $value['id'] ?>&name=<?php echo $value['name']; ?>"> Delete</a></td>
                        <td class="center"><i class=""></i> <a href="./home.php?page_admin=cate_edit&id=<?php echo $value['id'] ?>">Edit</a></td>
                    </tr>
                    <?php
                }
                ?>

                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>