<link rel="stylesheet" href="./resource/css/bootstrap.min.css"><?phpif (isset($_SESSION['bag'])) {$bag = $_SESSION['bag'];?><div class="wrap">    <div class="alert alert-info" style="margin-top: 10px"> Danh sách sản phẩm có trong giỏ hàng        của <?= $_SESSION['user'] ?></div>    <table class="table-fill" style="margin-top: 10px">        <thead>        <tr>            <th class="text-left">ID</th>            <th class="text-left">Name</th>            <th class="text-left">Price</th>            <th class="text-left">Type</th>        </tr>        </thead>        <tbody class="table-hover">        <?php        foreach ($bag as $id) {            $dataBag = $product->GetAPro($id);            foreach ($dataBag as $valueBag) {                ?>                <tr>                    <td class="text-left"><?= $valueBag['id'] ?></td>                    <td class="text-left"><?= $valueBag['name'] ?></td>                    <td class="text-left"><?= $valueBag['price'] ?> VND</td>                    <td class="text-left"><?= $valueBag['type'] ?></td>                </tr>                <?php            }        }        ?>        </tbody>    </table>    <?php    }    ?>    <a href="./index.php?buySucces=ok"> <input class="btn btn-info" onclick="xac_mua_hang('Xác nhận mua hàng!')"                                                style=" margin-top:10px;margin-left: 40% ;margin-bottom: 20px"                                                name="btnBuy" value="Mua sản phẩm đã chọn"></a></div><script>    function xac_mua_hang(msg) {        if (window.confirm(msg)) {            return true;        }        return false;    }</script>