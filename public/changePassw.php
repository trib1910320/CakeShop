<?php
define('TITLE', 'Đổi mật khẩu');
require '../partials/header.php';
require '../partials/narbar.php';

use App\Models\User;

$user = User::where('id', $_SESSION['iduser'])->first();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(password_verify($_POST['oldpassword'],$user->password)){
        $user->password = password_hash($_POST['newpassword'],PASSWORD_DEFAULT);
        $user->save();
    }else{
        $_SESSION['notificError']="Mật khẩu cũ không chính xác!";
    }
    $_SESSION['notificSuccess']="Bạn đã đổi mật khẩu thành công.";
    header('Location: '. BASE_URL_PATH);
    exit();
}
?>
<style>
    .error{
        color: #b31717;
    }
</style>
<?php require '../partials/notification.php' ?>
<div class="container mt-4 mb-4">
    <div class="card border-info w-50 mx-auto">
        <div class="card-header bg-info fw-bold text-black text-center fs-4">Đổi mật khẩu</div>
        <div class="card-body text-center">
            <form id="changePasswForm" method="POST" action="" class="form-horizontal">
                <div class="form-group my-1 row">
                    <label class="col-lg-4 col-form-label" for="username">Tên đăng nhập</label>
                    <div class="col-lg-5">
                        <input disabled class="form-control" id="username" name="username" value="<?= $user->username ?>" />
                    </div>
                </div>
                <div class="form-group my-1 row">
                    <label class="col-lg-4 col-form-label" for="oldpassword">Mật khẩu cũ</label>
                    <div class="col-lg-5">
                        <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Mật khẩu cũ" />
                    </div>
                </div>

                <div class="form-group my-1 row">
                    <label class="col-lg-4 col-form-label" for="newpassword">Mật khẩu mới</label>
                    <div class="col-lg-5">
                        <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Mật khẩu mới" />
                    </div>
                </div>

                <div class="form-group my-1 row">
                    <label class="col-lg-4 col-form-label" for="confirm_password">Nhập lại mật khẩu mới</label>
                    <div class="col-lg-5">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu mới" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 offset-sm-4">
                        <button type="submit" class="btn btn-primary" name="changePassw" id="changePassw" value="Change Password">Đổi mật khẩu</button>
                        <button type="reset" class="btn btn-danger"> Hủy</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>

<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function() {
            document.forms['#changePasswForm'].submit();
        }
    });
    $(document).ready(function() {
        $("#changePasswForm").validate({
            rules: {
                oldpassword: {
                    required: true,
                    minlength: 5,
                    maxlength: 20
                },
                newpassword: {
                    required: true,
                    minlength: 5,
                    maxlength: 20
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                    equalTo: "#newpassword"
                },
            },
            messages: {
                oldpassword: {
                    required: "Bạn chưa nhập vào mật khẩu",
                    minlength: "Mật khẩu phải có ít nhất 5 ký tự",
                    maxlength: "Mật khẩu phải có tối đa 20 ký tự"
                },
                newpassword: {
                    required: "Bạn chưa nhập vào mật khẩu",
                    minlength: "Mật khẩu phải có ít nhất 5 ký tự",
                    maxlength: "Mật khẩu phải có tối đa 20 ký tự"
                },
                confirm_password: {
                    required: "Bạn chưa nhập vào mật khẩu",
                    minlength: "Mật khẩu phải có ít nhất 5 ký tự",
                    maxlength: "Mật khẩu phải có tối đa 20 ký tự",
                    equalTo: "Mật khẩu không trùng khớp với mật khẩu mới đã nhập"
                },
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                error.addClass("invalid-feedback");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.siblings("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });
    });
</script>
<?php
include '../partials/footer.php';
