<link rel="stylesheet" href="resource/css/bootstrap.min.css" >

<div class="wrap">

    <form action="./index.php" method="post">

        <label class="label label-info" > User name</label>

        <input type="text" class="form-control" style="width: 50%" name="name" placeholder="Input username" >

        <br><label class="label label-info" > Password</label>

        <input type="password" class="form-control" style="width: 50%" placeholder="Input your password" name="pass">

        <br><label class="label label-info" > Repeat Password</label>

        <input type="password" class="form-control" style="width: 50%" placeholder="Repeat your password" name="Repass">

        <br><label class="label label-info" > Your Email</label>

        <input type="email" class="form-control"    style="width: 50%" placeholder="Input your email" name="email">

        <br><input type="submit"  name="submitAcc"  class="btn btn-info" id="sub" value="Create Account" >

        <input type="reset" class="btn btn-danger" value="Reset">

    <br>

    </form>





</div>




<!-- <script>

    function checkInput(){

        var name = document.getElementsByName("name")[0].value;

        var pass = document.getElementsByName("pass")[0].value;

        var repass = document.getElementsByName("Repass")[0].value;

        var email = document.getElementsByName("email")[0].value;



        if(name.length>0&&pass.length>0&&repass.length>0&&email.length>0){

            if(pass.length>6){

                if(pass===repass){

                    document.getElementById("sub").disabled=false;



                }else{

                    alert("Mật khẩu nhập lại không đúng!");

                }

            }else{

                alert("Mật khẩu quá ngắn!")

            }



        }else{

            alert("Vui lòng nhập đầy đủ thông tin!");

        }







    }



</script> -->