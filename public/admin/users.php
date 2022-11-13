<?php
define('TITLE', 'Quản lí khách hàng');
require "../../partials/headerAdmin.php";
require "../../partials/check_admin.php";

use App\Models\User;

$users = User::all();

?>
<main class="row">
<?php require '../../partials/notification.php' ?>
    <div class="col-lg-3 h-auto">
        <?php include "../../partials/narbarAdmin.php" ?>
    </div>
    <div class="card col-lg-9">
        <div>
            <h1 class="card text-center bg-primary pb-2">Khách hàng</h1>
            <div class="row mt-3">
                <div class="d-flex">
                    <a class="nav-link link-primary" href="<?= BASE_URL_PATH . 'admin/index.php' ?>">Trang quản trị > </a>
                    <a class="nav-link link-primary" href="<?= BASE_URL_PATH . "admin/users.php" ?>">Khách hàng</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-header bg-primary rounded-2 p-2 fs-5 fw-bold">Danh sách khách hàng</h5>
            <div class="card-body">
                <?php foreach ($users   as $user) : ?>
                    <?php if ($user->id != 0 && $user->id_admin == 0) : ?>
                        <div class="card my-1 p-2">
                            <table>
                                <tr>
                                    <th>Mã khách hàng:</th>
                                    <th>Tên khách hàng:</th>
                                    <td><?= $user->fullname ?></td>
                                    <th>Tên tài khoản:</th>
                                    <td><?= $user->username ?></td>

                                    <th class="text-center">Xóa</th>
                                </tr>
                                <tr>
                                    <td rowspan="2"><?= $user->id ?></td>
                                    <th>Email:</th>
                                    <td><?= $user->email ?></td>
                                    <th>Số điên thoại:</th>
                                    <td><?= $user->phone ?></td>
                                    <td rowspan="2" class="text-center">
                                        <form action="delUser.php" method="POST" name="delUser<?= $user->id ?>">
                                            <input type="hidden" name="id" value="<?= $user->id ?>">
                                            <button type="submit" class="btn btn-xs btn-danger" name="delete-user<?= $user->id ?>" data-bs-toggle="modal" data-bs-target="#delete-confirm">
                                                <i alt=" Xóa" type="submit" class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ:</th>
                                    <td colspan="3"><?= $user->address ?></td>
                                </tr>
                            </table>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>

        </div>
    </div>
    <div id="delete-confirm" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Yêu cầu xác nhận</h4>
                </div>
                <div class="modal-body">Bạn có muốn xóa sản phẩm này không?</div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-danger" id="delete">Xóa</button>
                    <button type="button" data-dismiss="modal" class="btn btn-outline-dark" id="cancel">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        //Xóa users
        <?php foreach ($users as $user) : ?>
            <?php if ($user->id != 0 && $user->id_admin == 0) : ?>
                $('button[name="delete-user<?= $user->id ?>"]').on('click', function(e) {
                    e.preventDefault();
                    const nameTd = $(this).closest('tr').find('td:first');
                    if (nameTd.length > 0) {
                        $('.modal-body').html(`Bạn có muốn xóa người dùng với ID: "${nameTd.text()}" không ?`);
                    }
                    $('#delete-confirm').modal({
                        backdrop: 'static',
                        keyboard: false
                    }).one('click', '#cancel', function() {
                        $('#delete-confirm').modal('hide')
                    }).one('click', '#delete', function() {
                        document.forms['delUser<?= $user->id ?>'].submit();
                    });
                });
            <?php endif ?>
        <?php endforeach ?>
    });
</script>
<?php require '../../partials/footerAdmin.php' ?>