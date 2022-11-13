<?php
define('TITLE', 'Quản lí hộp thư');
require "../../partials/headerAdmin.php";
require "../../partials/check_admin.php";
$_SERVER['REQUEST_URI'] = BASE_URL_PATH . 'admin/contact.php';

use App\Models\Contact;

$contact = Contact::find($_GET['id']);
if ((isset($_SESSION['user'])) && ($_SESSION['admin'] == 1)) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($contact->status == 1) {
            $contact->status = 0;
            $contact->save();
        } else {
            $contact->status = 1;
            $contact->save();
        }
        header('Location: ' . BASE_URL_PATH . 'admin/contact.php');
        exit();
    };
} else {
    header('Location: ' . BASE_URL_PATH);
    exit();
}

?>

<div class="row">
    <div class="col-lg-3 h-auto">
        <?php include "../../partials/narbarAdmin.php" ?>
    </div>
    <div class="card col-lg-9">
        <div>
            <h1 class="card text-center bg-primary pb-2">Hộp thư</h1>
            <div class="row mt-3">
                <div class="col-lg-9 d-flex">
                    <a class="nav-link link-primary" href="<?= BASE_URL_PATH.'admin/index.php'  ?>">Trang quản trị > </a>
                    <a class="nav-link link-primary" href="<?= BASE_URL_PATH . "admin/contact.php" ?>">Hộp thư</a>
                </div>
            </div>
        </div>
        <br>
        <div>
            <div class="card-body">
                <h5 class="card-header bg-primary rounded-2 p-2 fs-5 fw-bold">Hộp thư liên hệ</h5>
                <div class="card-body">
                    <table class="table table-bordered">
                        <div class="card my-1">
                            <tr>
                                <th>Mã thư liên hệ:</th>
                                <td><?= $contact->id ?></td>
                                <th>Thời gian lập:</th>
                                <td><?= date('H:i:s d/m/Y ', strtotime($contact->date_entered)) ?></td>
                                <th>Trạng thái:</th>
                                <td>
                                    <?php if ($contact->status == 0) : echo '<p class="text-danger">Chưa xử lý</p>' ?>
                                    <?php else : echo '<p class="text-success">Đã hoàn thành</p>' ?>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Tên khách hàng:</th>
                                <td><?= $contact->customer ?></td>
                                <th>Mail:</th>
                                <td><?= $contact->email ?></td>
                                <th>Số điện thoại:</th>
                                <td><?= $contact->phone ?></td>
                            </tr>
                            <tr>
                                <th>Nội dung:</th>
                                <td colspan="5"><?= $contact->detail ?></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="6">
                                    <form action="" method="post">
                                        <?php if ($contact->status == 0) : echo '<button type="submit" class="btn btn-success">Hoàn thành</button>' ?>
                                        <?php else : echo '<button type="submit" class="btn btn-danger">Chưa hoàn thành</button>' ?>
                                        <?php endif ?>
                                    </form>
                                </td>
                            </tr>
                        </div>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>

<?php require '../../partials/footerAdmin.php' ?>