<?php
define('TITLE', 'Đăng ký');
require '../partials/header.php';
require '../partials/narbar.php';
require '../partials/notification.php';
?>
<style>
    .error{
        color: #b31717;
    }
</style>
<main>
    <!-- Form Đăng ký Begin-->
    <div class="container my-2">
        <div class="row">
            <div class="col-lg-8 offset-sm-2 border-info w-50 mx-auto ">
                <div class="card">
                    <div class="card-header bg-info fw-bold text-black text-center fs-4">
                        Đăng ký thành viên
                    </div>
                    <div class="card-body">
                        <form id="signupForm" method="POST" action="addUser.php" class="form-horizontal">

                            <div class="form-group my-1 row">
                                <label class="col-lg-4 col-form-label" for="fullname">Họ tên của bạn</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Họ tên của bạn" />
                                </div>
                            </div>

                            <div class="form-group my-1 row">
                                <label class="col-lg-4 col-form-label" for="username">Tên đăng nhập</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" />
                                </div>
                            </div>

                            <div class="form-group my-1 row">
                                <label class="col-lg-4 col-form-label" for="password">Mật khẩu</label>
                                <div class="col-lg-5">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" />
                                </div>
                            </div>

                            <div class="form-group my-1 row">
                                <label class="col-lg-4 col-form-label" for="confirm_password">Nhập lại mật
                                    khẩu</label>
                                <div class="col-lg-5">
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu" />
                                </div>
                            </div>

                            <div class="form-group my-1 row">
                                <label class="col-lg-4 col-form-label" for="email">Hộp thư điện tử</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Hộp thư điện tử" />
                                </div>
                            </div>

                            <div class="form-group my-1 row">
                                <label class="col-lg-4 col-form-label" for="phone">Số điện thoại</label>
                                <div class="col-lg-5">
                                    <input class="form-control" id="phone" name="phone" placeholder="Số điện thoại của bạn" />
                                </div>
                            </div>

                            <div class="form-group my-1 row">
                                <label class="col-lg-4 col-form-label" for="address">Địa chỉ liên hệ</label>
                                <div class="col-lg-5">
                                    <textarea class="rounded-2 w-100" rows="3" type="text" id="address" name="address" placeholder=" Địa chỉ cụ thể..."></textarea>
                                </div>
                            </div>

                            <div class="form-group my-1 form-check">
                                <div class="col-lg-12 offset-sm-4">
                                    <input class="form-check-input" type="checkbox" id="agree" name="agree" value="agree" />
                                    <label class="form-check-label" for="agree">Đồng ý các quy định của chúng tôi</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 offset-sm-4">
                                    <button  class="btn btn-primary" name="signup" id="signup" value="Sign up">Đăng
                                        ký</button>
                                    <button type="reset" class="btn btn-danger"> Hủy</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div> <!-- Cột nội dung -->
        </div> <!-- Dòng nội dung -->
    </div> <!-- Container -->
    <!-- Form Đăng ký End-->
    <!-- Script Đăng ký -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>

    <script type="text/javascript">
        $.validator.setDefaults({
            submitHandler: function() {
                document.forms['#signupForm'].submit();
            }
        });
        $(document).ready(function() {
            $("#signupForm").validate({
                rules: {
                    fullname: "required",
                    username: {
                        required: true,
                        minlength: 5,
                        maxlength: 20
                    },
                    password: {
                        required: true,
                        minlength: 5,
                        maxlength: 20
                    },
                    confirm_password: {
                        required: true,
                        minlength: 5,
                        maxlength: 20,
                        equalTo: "#password"
                    },
                    phone: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    address: "required",
                    agree: "required"
                },
                messages: {
                    fullname: "Bạn chưa nhập vào họ tên của bạn",
                    username: {
                        required: "Bạn chưa nhập vào tên đăng nhập",
                        minlength: "Tên đăng nhập phải có ít nhất 5 ký tự",
                        maxlength: "Tên đăng nhập phải có tối đa 20 ký tự"
                    },
                    password: {
                        required: "Bạn chưa nhập vào mật khẩu",
                        minlength: "Mật khẩu phải có ít nhất 5 ký tự",
                        maxlength: "Mật khẩu phải có tối đa 20 ký tự"
                    },
                    confirm_password: {
                        required: "Bạn chưa nhập vào mật khẩu",
                        minlength: "Mật khẩu phải có ít nhất 5 ký tự",
                        maxlength: "Mật khẩu phải có tối đa 20 ký tự",
                        equalTo: "Mật khẩu không trùng khớp với mật khẩu đã nhập"
                    },
                    phone: {
                        required: "Bạn chưa nhập vào số điện thoại",
                        number: "Số điện thoại phải là số",
                        minlength: "Số điện thoại phải đủ 10 số",
                        maxlength: "Số điện thoại phải đủ 10 số"
                    },
                    email: {
                        required: "Bạn chưa nhập vào email",
                        email: "Hộp thư điện tử không hợp lệ"
                    },
                    address: "Bạn chưa nhập vào địa chỉ liên hệ",
                    agree: "Bạn phải đồng ý với các quy định của chúng tôi"
                },
                errorElement: "div",
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                }
            });
        });
    </script>
</main>
<?php require '../partials/footer.php' ?>