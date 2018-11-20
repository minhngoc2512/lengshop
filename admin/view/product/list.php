<?php
//require_once '../Database/DB.php';
//$db = new DB();
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>image</th>
                    <th>Cate_id</th>
                    <th>Display</th>
                    <th>Ram</th>
                    <th>CPU</th>
                    <th>GPU</th>
                    <th>Power</th>
                    <th>Type</th>
                    <th>Introduction</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $data = $product->GetAllPro();
                if($data!=false)
                foreach($data as $value){
                    ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['price']; ?></td>
                        <td><?php echo $value['image']; ?></td>
                        <td><?php echo $value['cate_id']; ?></td>
                        <td><?php echo $value['display']; ?></td>
                        <td><?php echo $value['ram']; ?></td>
                        <td><?php echo $value['cpu']; ?></td>
                        <td><?php echo $value['gpu']; ?></td>
                        <td><?php echo $value['power']; ?></td>
                        <td><?php echo $value['type']; ?></td>
                        <td><?php echo $value['intro']; ?></td>

                        <td class="center"><a
                                    onclick="xac_nhan_xoa(' Xác nhận xóa sản phẩm: <?php echo $value['name']; ?>')"
                                    href="./home.php?page_type=product_delete&id=<?php echo $value['id'] ?>&name=<?php echo $value['name']; ?>&img=<?php echo $value['image'] ?>"> Delete</a></td>
                        <td class="center"><i class=""></i> <a href="./home.php?page_admin=product_edit&id=<?php echo $value['id'] ?>">Edit</a></td>
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

