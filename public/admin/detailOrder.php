<?php
define('TITLE', 'Quản lí đơn hàng');
require "../../partials/headerAdmin.php";
require "../../partials/check_admin.php";
$_SERVER['REQUEST_URI'] = BASE_URL_PATH . 'admin/order.php';

use App\Models\Cart;

$order = Cart::find($_GET['id']);
if ((isset($_SESSION['user'])) && ($_SESSION['admin'] == 1)) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($order->status == 1) {
            $order->status = 2;
            $order->save();
        } else {
            $order->status = 1;
            $order->save();
        }
        header('Location: ' . BASE_URL_PATH . 'admin/order.php');
        exit();
    };
} else {
    header('Location: ' . BASE_URL_PATH);
    exit();
}
$sumprice = 0;
?>

<div class="row">
    <div class="col-lg-3 h-auto">
        <?php include "../../partials/narbarAdmin.php" ?>
    </div>
    <div class="card col-lg-9">
        <div>
            <h1 class="card text-center bg-primary pb-2">Đơn hàng</h1>
            <div class="row mt-3">
                <div class="col-lg-9 d-flex">
                    <a class="nav-link link-primary" href="<?= BASE_URL_PATH.'admin/index.php' ?>">Trang quản trị > </a>
                    <a class="nav-link link-primary" href="<?= BASE_URL_PATH . "admin/order.php" ?>">Đơn hàng</a>
                </div>
            </div>
        </div>
        <br>
        <div class="card-body">
            <h5 class="card-header bg-primary rounded-2 p-2 fs-5 fw-bold">Chi tiết đơn hàng</h5>
            <div class="card-body">
                <table class="table table-bordered">
                    <div class="card my-1">
                        <tr>
                            <th>Mã đơn hàng:</th>
                            <td><?= $order->id ?></td>
                            <th>Thời gian lập:</th>
                            <td><?= date('H:i:s d/m/Y ', strtotime($order->date_entered)) ?></td>
                            <th>Trạng thái:</th>
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
                        </tr>
                        <tr>
                            <th>Tên khách hàng:</th>
                            <td><?= $order->user->fullname ?></td>
                            <th>Mail:</th>
                            <td><?= $order->user->email ?></td>
                            <th>Số điện thoại:</th>
                            <td><?= $order->user->phone ?></td>
                        </tr>
                        <tr>
                            <th>Địa chỉ:</th>
                            <td colspan="5"><?= $order->user->address ?></td>
                        </tr>
                    </div>
                </table>
                <table class="table table-bordered text-center" id="list" style="vertical-align:middle ;">
                    <thead>
                        <tr class="bg-opacity-50 bg-danger">
                            <th>Mã bánh</th>
                            <th>Tên bánh</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order->cakes as $detailorder) : ?>
                            <tr>
                                <td class="fw-bold"><?= $detailorder->id ?></td>
                                <td><?= $detailorder->cake ?></td>
                                <td><?= $detailorder->detail_cart->number ?></td>
                                <td><?= number_format($detailorder->price) ?> VNĐ</td>
                                <td><?= number_format($detailorder->price * $detailorder->detail_cart->number) ?> VNĐ</td>
                                <?php $sumprice = $sumprice + ($detailorder->price * $detailorder->detail_cart->number) ?>
                            </tr>
                        <?php endforeach ?>
                        <tr class="bg-opacity-25 bg-info">
                            <td colspan="3">
                                <h5>Tổng tiền thanh toán:</h5> <?= number_format($sumprice) ?> VNĐ
                            </td>
                            <td colspan="3">
                                <form action="" method="post">
                                    <?php switch ($order->status) {
                                        case 1:
                                            echo '<button type="submit" class="btn btn-success">Xác nhận đã giao hàng</button>';
                                            break;
                                        case 2:
                                            echo '<button type="submit" class="btn btn-danger">Xác nhận chưa giao hàng</button>';
                                            break;
                                    }
                                    ?>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php require '../../partials/footerAdmin.php' ?>