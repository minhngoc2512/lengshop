<?php
//require_once 'DB.php';
//$db = new DB();
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12  -->
            <table class="table table-striped table-hover table-bordered " id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Password</th>
                    <th>Email</th>

                    <th>Level</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $data = $user->GetAllUser();
                foreach ($data as $value) {
                    ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['username']; ?></td>
                        <td><?php echo $value['password']; ?></td>
                        <td><?php echo $value['email']; ?></td>
                        <td><?php $level = $value['level'];
                        if($level==1){
                            echo'Admin';
                        }else{
                            echo "Member";
                        }
                        ?></td>
                        <td class="center"><i class=""></i><a onclick="xac_nhan_xoa();" href="./home.php?page_type=user_delete&id=<?php echo $value['id'] ; ?>&username=<?php echo $value['username']; ?>"> Delete</a></td>
                        <td class="center"><i class=""></i> <a href="./home.php?page_type=user_edit&id=<?php echo $value['id'] ; ?>">Edit</a></td>
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