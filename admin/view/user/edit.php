<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Add</small>
                </h1>
            </div>
            <?php $data = $user->GetAUser($_REQUEST['id'])  ?>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
                <form action="./home.php" method="POST">
                    <?php foreach ($data as $value) {

                    }{ ?>
                    <input type="hidden" name="page_type" value="user_editpost" >
                        <input type="hidden" name="id" value="<?php echo $value['id']; ?>"  >
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="username"  placeholder="<?php echo $value['username']; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control"   name="email"  placeholder="<?php echo $value['email']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control"  name="pass" placeholder="Please Enter Password"/>
                    </div>
                    <div class="form-group">
                        <label>RePassword</label>
                        <input type="password" class="form-control" onchange=" check()" name="RePass"
                               placeholder="Please Enter RePassword"/>
                    </div>
                    <div class="form-group">
                        <label>User Level</label>
                        <label class="radio-inline">
                            <input name="level" value="1" <?php if($value['level']=='1'){echo "checked='true'";}; ?> type="radio">Admin
                        </label>
                        <label class="radio-inline">
                            <input name="level" <?php if($value['level']=='0'){echo "checked='true'";}; ?> value="2" type="radio">Member
                        </label>
                    </div>
                    <?php } ?>

                    <button type="submit" disabled="true" id="sbm" class="btn btn-default">User Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <script>
            function checkpass() {
                var pass = document.getElementsByName("pass")[0].value;
                var Repass = document.getElementsByName("RePass")[0].value;


                if (pass.length > 6) {
                    if (pass === Repass) {

                        //
                        return true;

                    } else {
                        alert("Nhập lại mật khẩu không đúng!")
                        document.getElementById("sbm").disabled = true;
                    }
                } else {
                    alert("Mật khẩu quá ngắn!");
                    document.getElementById("sbm").disabled = true;

                }


            }
            function check() {
                var name = document.getElementsByName("username")[0].value;
                var pass = document.getElementsByName("pass")[0].value;
                var Repass = document.getElementsByName("RePass")[0].value;
                var email = document.getElementsByName("email")[0].value;
                if (name.length > 0 && pass.length > 0 && Repass.length > 0 && email.length > 0) {
                    if (checkpass() == true) {
                        document.getElementById("sbm").disabled = false;
                    } else {
                        return false;
                    }

                } else {
                    alert("Vui lòng nhập đầy đủ thông tin!");
                    document.getElementById("sbm").disabled = true;
                    return false;
                }


            }


        </script>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>