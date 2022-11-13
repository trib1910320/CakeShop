<?php
define('TITLE', 'Quản lí hộp thư');
require "../../partials/headerAdmin.php";
require "../../partials/check_admin.php";

use App\Models\Contact;

$contacts = Contact::orderBy('status', 'ASC')->orderBy('date_entered', 'ASC')->get();
?>

<main class="row">
    <div class="col-lg-3 h-auto">
        <?php include "../../partials/narbarAdmin.php" ?>
    </div>
    <div class="card col-lg-9">
        <div>
            <h1 class="card text-center bg-primary pb-2">Hộp thư</h1>
            <div class="row mt-3">
                <div class="d-flex">
                    <a class="nav-link link-primary" href="<?= BASE_URL_PATH . 'admin/index.php' ?>">Trang quản trị > </a>
                    <a class="nav-link link-primary" href="<?= BASE_URL_PATH . "admin/contact.php" ?>">Hộp thư</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-header bg-primary rounded-2 p-2 fs-5 fw-bold">Hộp thư liên hệ</h5>
            <div class="card-body">
                <?php foreach ($contacts as $contact) : ?>
                    <div class="card my-1 p-2">
                        <table>
                            <tr>
                                <th>Mã thư liên hệ:</th>
                                <th>Tài khoản người dùng:</th>
                                <th>Thời gian lập:</th>
                                <th>Trạng thái:</th>
                            </tr>
                            <tr>
                                <td><?= $contact->id ?></td>
                                <td><?= $contact->user->fullname ?></td>
                                <td><?= date('H:i:s d/m/Y ', strtotime($contact->date_entered)) ?></td>
                                <td>
                                    <?php if ($contact->status == 0) : echo '<p class="text-danger">Chưa xử lý</p>' ?>
                                    <?php else : echo '<p class="text-success">Đã hoàn thành</p>' ?>
                                    <?php endif ?>
                                </td>
                                <td rowspan="2">
                                    <input type="hidden" name="id" value="<?= $contact->id ?>">
                                    <?= '<a href="detailContact.php?id=' . $contact->id . '" type="submit" class="btn btn-outline-primary fw-bold">Xem thư</a>' ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</main>

<?php require '../../partials/footerAdmin.php' ?>