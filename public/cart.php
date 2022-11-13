<?php
define('TITLE', 'Giỏ hàng');

require '../partials/header.php';
if (!isset($_SESSION['user'])) {
    $_SESSION['notificLogin']="Vui lòng đăng nhập để đặt hàng từ Shop";
    header('Location: ' . BASE_URL_PATH . 'login.php');
    exit();
}
require '../partials/narbar.php';

use App\Models\Cart;

$carts = Cart::where('id_user', $_SESSION['iduser'])->get(); // Lấy danh sách giỏ hàng
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['idcart'])) { //Xem chi tiết giỏ hàng
    $cartuser = Cart::where('id_user', $_SESSION['iduser'])
        ->where('id', $_GET['idcart'])->first(); //Lấy giỏ hàng
} else {
    $cartuser = Cart::where('id_user', $_SESSION['iduser'])
        ->where('status', 0)
        ->where('hide', 0)->first(); //Lấy giỏ hàng
}

//Thay đổi số lượng sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $editNumber = $cartuser->cakes[($_POST['key'])]->detail_cart;
    $editNumber->number = $_POST['number'];
    $editNumber->save();
}
//$numbercart ở phần narbar.php
$sumprice = 0;
?>
<main>
    <?php require '../partials/notification.php' ?>
    <div class="d-flex fs-5">
        <a class="text-decoration-none text-warning " href="<?= BASE_URL_PATH ?>">Trang chủ</a> >
        <a class="text-decoration-none text-warning" href="<?= BASE_URL_PATH . 'cart.php' ?>">Giỏ hàng</a>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-4 card">
            <div class="card-body">
                <h5 class="card-header bg-primary rounded-2 p-2 fs-5 fw-bold">Danh sách giỏ hàng</h5>
                <div class="card-body">
                    <?php foreach ($carts as $cart) : ?>
                        <?php if ($cart->status != 0 && $cart->hide == 0) : ?>
                            <div class="card my-1">
                                <div class="d-flex mt-2">
                                    <h6 class="fw-bold mx-1">Mã giỏ hàng:</h6>
                                    <p><?= $cart->id ?></p>
                                    <?php if ($cart->status == 2) : ?>
                                        <form action="hidecart.php" method="POST" class="mx-5">
                                            <input type="hidden" name="id" value="<?= $cart->id ?>">
                                            <button type="submit" class="btn btn-xs btn-success" name="hide">
                                                <i alt='Ẩn' type='submit' class='fas fa-eye-slash'></i>
                                                <span>Ẩn</span>
                                            </button>
                                        </form>
                                    <?php endif ?>
                                </div>
                                <div class="d-flex">
                                    <h6 class="fw-bold mx-1">Tình trạng giỏ hàng:</h6>
                                    <?php switch ($cart->status) {
                                        case 0:
                                            echo "<p class='text-danger'> Chưa hoàn thành đặt hàng</p>";
                                            break;
                                        case 1:
                                            echo "<p class='text-warning'> Đang xử lý</p>";
                                            break;
                                        case 2:
                                            echo "<p class='text-success'> Đã giao hàng thành công</p>";
                                            break;
                                    }
                                    ?>
                                </div>
                                <div class="d-flex">
                                    <h6 class="fw-bold mx-1">Thời gian đặt:</h6>
                                    <p><?= date('H:i:s d/m/Y ', strtotime($cart->date_entered)) ?></p>
                                </div>
                                <div class="d-flex m-auto mb-2">
                                    <div>
                                        <a href="<?= BASE_URL_PATH . 'cart.php?idcart=' .  $cart->id ?>" class="btn btn-xs btn-info" name="detail">
                                            <i alt='Xem chi tiết' type='submit' class="fas fa-info-circle"></i>
                                            <span>Xem chi tiết</span>
                                        </a>
                                    </div>
                                    <?php if ($cart->status == 1) : ?>
                                        <form action="delCart.php" name="delcart<?= $cart->id ?>" method="POST" class="mx-1">
                                            <input type="hidden" name="id" value="<?= $cart->id ?>">
                                            <button type="submit" class="btn btn-xs btn-danger" name="delete-cart<?= $cart->id ?>" data-bs-toggle="modal" data-bs-target="#delete-confirm">
                                                <i alt='Hủy đơn hàng' type='submit' class="fas fa-times-circle"></i>
                                                <span>Hủy đơn hàng</span>
                                            </button>
                                        </form>
                                    <?php endif ?>
                                </div>
                            </div>

                        <?php endif ?>
                    <?php endforeach ?>
                </div>

            </div>
        </div>
        <div class="col-lg-8 card">
            <div class="card-body">
                <h5 class="card-header bg-primary rounded-2 p-2 fs-5 fw-bold">Giỏ hàng</h5>
                <div class="card-body">
                    <h5 class="">Mã giỏ hàng:<?= $cartuser->id ?> - Ngày lập:<?= date('d/m/Y', strtotime($cartuser->date_entered)) ?></h5>
                    <table class="table table-hover table-bordered text-center" id="list" style="vertical-align:middle ;">
                        <thead>
                            <tr class="bg-opacity-50 bg-danger" style="vertical-align:middle ;">
                                <th>STT</th>
                                <th>Sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Tổng tiền</th>
                                <?php if ($cartuser->status == 0) : ?>
                                    <th>Xóa</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <?php if ($numbercart != 0 or isset($_GET['idcart'])) : ?>
                            <tbody>
                                <?php foreach ($cartuser->cakes as $key => $cake) : ?>
                                    <tr>
                                        <th><?= $key + 1 ?></th>
                                        <td><?= $cake->cake ?></td>
                                        <td><img src="img/cakes/<?= $cake->img ?>" width="70px" height="70px" alt="..."></td>
                                        <td><?php if ($cartuser->status == 0) : ?>
                                                <form method="POST" name="edit_number<?= $key + 1 ?>">
                                                    <input class="mx-1 rounded-2" onchange="Onchange<?= $key + 1 ?>()" id="number" type="number" name="number" min="1" max="100" value="<?= $cake->detail_cart->number ?>">
                                                    <input type="hidden" name="key" value="<?= $key ?>">
                                                    <input type="hidden" name="id" value="<?= $cake->detail_cart->id ?>">
                                                </form>
                                            <?php else : ?>
                                                <p class="mx-1"><?= $cake->detail_cart->number ?></p>
                                            <?php endif ?>
                                        </td>
                                        <td><?= number_format($cake->price) ?> VNĐ</td>
                                        <td><?= number_format($cake->price * $cake->detail_cart->number) ?> VNĐ</td>
                                        <?php if ($cartuser->status == 0) : ?>
                                            <td>
                                                <form action="delcake_cart.php" method="POST" name="delcake_cart<?= $key + 1 ?>">
                                                    <input type="hidden" name="idcart" value="<?= $cartuser->id ?>">
                                                    <input type="hidden" name="id" value="<?= $cake->detail_cart->id ?>">
                                                    <button type="submit" class="btn btn-xs btn-danger" name="delete-cake<?= $key + 1 ?>" data-bs-toggle="modal" data-bs-target="#delete-confirm">
                                                        <i alt='Xóa' class='fas fa-trash-alt'></i></button>
                                                </form>
                                            </td>
                                        <?php endif ?>
                                        <?php $sumprice = $sumprice + ($cake->price * $cake->detail_cart->number) ?>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        <?php else : ?>
                            <td colspan="6">Giỏ hàng rỗng</td>
                        <?php endif ?>
                        <hr>
                    </table>
                    <div class="row">
                        <div class="col-6">
                            <h4 class="text-primary fw-bold">Tổng tiền thanh toán:</h4>
                            <p class="fs-5"><?= number_format($sumprice) ?> VNĐ</p>
                        </div>
                        <div class="col-6">
                            <?php if ($cartuser->status == 0) : ?>
                                <form action="order.php" method="post">
                                    <input type="hidden" name="id" value="<?= $cartuser->id ?>">
                                    <input type="hidden" name="numbercart" value="<?= $numbercart ?>">
                                    <button type="submit" class="btn btn-success w-100 fw-bold fs-5" name="order">
                                        Đặt hàng</button>
                                </form>
                            <?php elseif ($cartuser->status == 1) : ?>
                                <form action="delCart.php" name="delcart<?= $cartuser->id ?>" method="POST">
                                    <input type="hidden" name="id" value="<?= $cartuser->id ?>">
                                    <button type="submit" class="btn btn-xs btn-danger p-1 w-100 fw-bold fs-5" name="delete-cart<?= $cartuser->id ?>" data-bs-toggle="modal" data-bs-target="#delete-confirm">
                                        <i alt='Hủy đơn hàng' class="fas fa-times-circle"></i>
                                        <span>Hủy đơn hàng</span>
                                    </button>
                                </form>
                            <?php else : ?>
                                <p class="bg-success rounded-2 p-1 w-100 fw-bold fs-5 text-center">
                                    Đã giao hàng thành công</p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Xác nhận thao tác xóa -->
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
    //Thay đổi số lượng sản phẩm
    <?php foreach ($cartuser->cakes as $key => $cake) : ?>
        function Onchange<?= $key + 1 ?>() {
            document.forms['edit_number<?= $key + 1 ?>'].submit();
        }
    <?php endforeach ?>
    $(document).ready(function() {
        //Xóa sản phẩm trong giỏ hàng
        <?php foreach ($cartuser->cakes as $key => $cake) : ?>
            $('button[name="delete-cake<?= $key + 1 ?>"]').on('click', function(e) {
                e.preventDefault();
                const nameTd = $(this).closest('tr').find('td:first');
                if (nameTd.length > 0) {
                    $('.modal-body').html(`Bạn có muốn xóa bánh "${nameTd.text()}" không ?`);
                }
                $('#delete-confirm').modal({
                    backdrop: 'static',
                    keyboard: false
                }).one('click', '#cancel', function() {
                    $('#delete-confirm').modal('hide')
                }).one('click', '#delete', function() {
                    document.forms['delcake_cart<?= $key + 1 ?>'].submit();
                });
            });
        <?php endforeach ?>
        //Xóa giỏ hàng
        <?php foreach ($carts as  $cart) : ?>
            <?php if ($cart->status == 1) : ?>
                $('button[name="delete-cart<?= $cart->id ?>"]').on('click', function(e) {
                    e.preventDefault();
                    $('.modal-body').html(`Bạn có muốn hủy đơn hàng với mã "<?= $cart->id ?>" không ?`);
                    $('#delete-confirm').modal({
                        backdrop: 'static',
                        keyboard: false
                    }).one('click', '#cancel', function() {
                        $('#delete-confirm').modal('hide')
                    }).one('click', '#delete', function() {
                        document.forms['delcart<?= $cart->id ?>'].submit();
                    });
                });
            <?php endif ?>
        <?php endforeach ?>
    });
</script>

<?php
include '../partials/footer.php';
