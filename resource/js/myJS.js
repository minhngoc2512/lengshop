/**
 * Created by Minh Ngoc on 3/23/2017.
 */
$(document).ready(function () {
    $("#insert_img").click(function () {
        $("#insert").append('<div class="form-group" ><input type="file" name="imagedetail[]"></div>');
    });
});
$(document).ready(function () {
    $("#addImageProduct").click(function () {
        $("#insert").append('<div class="form-group" ><label>Images</label><input type="file" name="fImagesDetail[]"></div>');
    });
});
function xac_nhan_xoa(msg) {
    if (window.confirm(msg)) {
        return true;
    }
    return false;

}