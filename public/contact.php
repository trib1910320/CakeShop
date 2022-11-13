<?php

define('TITLE', 'Liên hệ');
require '../partials/header.php';
require '../partials/narbar.php';

use App\Models\Contact;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user'])) {
        $AddContact = Contact::create([
            'customer' => $_POST['customer'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'detail' => $_POST['detail'],
            'id_user' => $_SESSION['iduser']
        ]);
    } else {
        $AddContact = Contact::create([
            'customer' => $_POST['customer'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'detail' => $_POST['detail'],
            'id_user' => 0
        ]);
    }
    $_SESSION['notificSuccess']="Bạn đã gửi thư liên lạc thành công.";
}


?>

<main class="container">
<?php require '../partials/notification.php' ?>
    <!-- Nội dung chính Begin-->
    <div class="row my-3">
        <div class="col-lg-12 col-sm-12">
            <h5>Bản đồ</h5>
            <p>
                <a href="#">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15729855.42909206!2d96.7382165931671!3d15.735434000981483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31157a4d736a1e5f%3A0xb03bb0c9e2fe62be!2zVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1445179448264" width="100%" height="200" frameborder="0" style="border:0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <br />
                </a>
            </p>
        </div>
        <div class="col-lg-8 col-sm-12">
            <h2 class="text-white text-center fs-4 card bg-primary bg-opacity-75 py-2">Liên hệ với chúng tôi!</h2>
            <p>Chúng tôi mong muốn lắng nghe từ bạn. Hãy liên hệ với chúng tôi và một thành viên của chúng tôi sẽ
                liên lạc với bạn trong thời gian sớm nhất. Chúng tôi yêu thích việc nhận được email của bạn mỗi ngày
                <em>mỗi ngày</em>.
            </p>
            <form action="" method="post">
                <h1 class="fs-5">Nhập thông tin:</h1>
                <div class="my-2">
                    <input class="rounded-2 py-2 w-100" type="text" name="customer" placeholder=" Tên người gửi" />
                </div>
                <div class="row my-2">
                    <div class="my-2 col-lg-6">
                        <input class="rounded-2 py-2 w-100 " type="email" name="email" placeholder=" Email" />
                    </div>
                    <div class="my-2 col-lg-6 ">
                        <input class="rounded-2 py-2 w-100" type="phone" name="phone" placeholder=" Số điện thoại" />
                    </div>
                </div>
                <div class="my-2">
                    <textarea class="rounded-2 w-100" rows="3" type="text" name="detail" placeholder=" Nội dung..."></textarea>
                </div>
                <div class="my-2">
                    <button type="submit" class="btn btn-warning bg-opacity-50 w-100">Gửi</button>
                </div>
            </form>

        </div>
        <div class="col-lg-4 col-sm-12">

            <div>
                <h1 class="text-primary" style="font-size: 24px;">Hệ Thống Cửa Hàng</h1>
                <div>
                    <h4 class="text-black" style="font-size: 18px;">Hệ Thống Cửa Hàng - TP. Cần Thơ</h4>
                    <p>Địa chỉ: 3/2 – Xuân Khánh – Ninh Kiều – TP. Cần Thơ</p>
                    <p>Email: CakeShop@gmail.com</p>
                    <p>Số điện thoại: 0909 123456 - CSKH / 0909 123 123 - Mr. A</p>
                </div>
                <div>
                    <h4 class="text-black" style="font-size: 18px;">Hệ Thống Cửa Hàng - TP.HCM</h4>
                    <p>Địa chỉ: Nguyễn Thị Thập – Tân Hưng – Q.7 – TP. HCM</p>
                    <p>Email: CakeShop@gmail.com</p>
                    <p>Số điện thoại: 0908 123456 - CSKH / 0909 456 456 - Mr. B</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Nội dung chính End-->
</main>
<?php require '../partials/footer.php' ?>