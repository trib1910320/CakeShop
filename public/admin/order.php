<?php
define('TITLE', 'Quản lí đơn hàng');
require "../../partials/headerAdmin.php";
require "../../partials/check_admin.php";

use App\Models\Cart;

$orders = Cart::orderBy('status', 'ASC')->orderBy('date_entered', 'ASC')->get();

?>

<main class="row">
    <div class="col-lg-3 h-auto">
        <?php include "../../partials/narbarAdmin.php" ?>
    </div>
    <div class="card col-lg-9">
        <div>
            <h1 class="card text-center bg-primary pb-2">Đơn hàng</h1>
            <div class="row mt-3">
                <div class="d-flex">
                    <a class="nav-link link-primary" href="<?= BASE_URL_PATH . 'admin/index.php' ?>">Trang quản trị > </a>
                    <a class="nav-link link-primary" href="<?= BASE_URL_PATH . "admin/order.php" ?>">Đơn hàng</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-header bg-primary rounded-2 p-2 fs-5 fw-bold">Danh sách đơn hàng</h5>
            <div class="card-body">
                <?php foreach ($orders  as $order) : ?>
                    <?php if ($order->id != 0 && $order->status != 0) : ?>
                        <div class="card my-1 p-2">
                            <table>
                                <tr>
                                    <th>Mã đơn hàng:</th>
                                    <th>Tên khách hàng:</th>
                                    <th>Ngày đặt hàng:</th>
                                    <th>Trạng thái đơn hàng:</th>
                                    <th>Xác nhận đơn hàng:</th>
                                </tr>
                                <tr>
                                    <td class="fw-bold"><?= $order->id ?></td>
                                    <td><?= $order->user->fullname ?></td>
                                    <td><?= date('H:i:s d/m/Y ', strtotime($order->date_entered)) ?></td>
                                    <td>
                                        <?php switch ($order->status) {
                                            case 1:
                                                echo "<p class='text-warning'> Đang được xử lý</p>";
                                                break;
                                            case 2:
                                                echo "<p class='text-success'> Đã giao hàng thành công</p>";
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <input type="hidden" name="id" value="<?= $order->id ?>">
                                        <?= '<a href="detailOrder.php?id=' . $order->id . '" type="submit" class="btn btn-outline-primary fw-bold">Xem đơn hàng</a>' ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>

        </div>
    </div>
</main>

<?php require '../../partials/footerAdmin.php' ?>