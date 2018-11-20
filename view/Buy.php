<link rel="stylesheet" href="../resource/css/bootstrap.min.css">
<?php
$name = $_SESSION['user'];
//$value = $dbP->conn->query("select * from user where username='$name'");
$value = $user->GetAUserByName($name);
//var_dump($value);
foreach ($value as $data) {
    $tablePro = '
<h2>Your Products</h2>

<p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>

<table class="table" style="border-collapse:collapse; border-spacing:0px; box-sizing:border-box; font-family:helvetica neue,helvetica,arial,sans-serif; font-size:14px; margin-bottom:20px; max-width:100%; width:1140px">
	<thead>
		<tr>
			<th style="text-align:left; vertical-align:bottom">Name</th>
			<th style="text-align:left; vertical-align:bottom">Type</th>
			<th style="text-align:left; vertical-align:bottom">price</th>
			
		</tr>
	</thead>
	<tbody>
	



';

    $bag = $_SESSION['bag'];
    foreach ($bag as $id) {

        $dataBag =$product->GetAPro($id);


        foreach ($dataBag as $valueBag) {
            $sl = (int)$valueBag['sl'];
            $sl = $sl - 1;





            $tablePro .= '
    <tr>
			<th style="text-align:left; vertical-align:bottom">' . $valueBag['name'] . '</th>
			<th style="text-align:left; vertical-align:bottom">' . $valueBag['type'] . '</th>
			<th style="text-align:left; vertical-align:bottom">' . number_format($valueBag['price']) . 'VND</th>
			
		</tr>
    ';
        }
    }
    $tablePro .= '	</tbody>
</table>';


    include('./PHPMailer/class.smtp.php');
    include("./PHPMailer/class.phpmailer.php");
    $nFrom = "Leng Shop";    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = 'donkihote2595@gmail.com';  //dia chi email cua ban
    $mPass = 'maitrang0606';       //mat khau email cua ban
    $nTo = "$name"; //Ten nguoi nhan
    $mTo = $data['email'];   //dia chi nhan mail
    $mail = new PHPMailer();
    $body = $tablePro;   // Noi dung email
    $title = 'Thông tin sản phẩm của bạn từ Leng Shop';   //Tieu de gui mail
    $mail->IsSMTP();
    $mail->CharSet = "utf-8";
    $mail->SMTPDebug = 0;   // enables SMTP debug information (for testing)
    $mail->SMTPAuth = true;    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com";    // sever gui mail.
    $mail->Port = 465;         // cong gui mail de nguyen
// xong phan cau hinh bat dau phan gui mail
    $mail->Username = $mFrom;  // khai bao dia chi email
    $mail->Password = $mPass;              // khai bao mat khau
    $mail->SetFrom($mFrom, $nFrom);
    $mail->AddReplyTo('donkihote2595@gmail.com', 'demo email PHP'); //khi nguoi dung phan hoi se duoc gui den email nay
    $mail->Subject = $title;// tieu de email
    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
    $mail->AddAddress($mTo, $nTo);
// thuc thi lenh gui mail
    if (!$mail->Send()) {
        echo '<div class="alert alert-danger"> Có lỗi khi gửi thông tin tới địa chỉ email:' . $data['email'] . ' </div>';

    } else {
        ?>


        <div class="wrap">
            <div class="alert alert-success"> Thao tác mua hàng thành công! Bạn vui lòng kiểm thông tin tại địa chỉ
                email của
                bạn là: <i> <?= $data['email'] ?></i>
                Cảm ơn bạn đã mua hàng tại shop của chúng tôi.
            </div>
            <a href="./index.php"><input value="Back Home" class="btn btn-info" style="margin: 10px 0 10px 40%"></a>


        </div>

        <?php


    }
}
?>



<?php
$_SESSION['bag'] = array();
