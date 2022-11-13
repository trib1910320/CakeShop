<?php
define('TITLE', 'Chi tiết sản phẩm');

require '../partials/header.php';
require '../partials/narbar.php';

use App\Models\Cake;
use App\Models\TypeCake;

$types = TypeCake::all();
$cakes = Cake::all();

$detailCake = Cake::find($_REQUEST['id']);
?>

<main>
    <div class="d-flex fs-5">
        <a class="text-decoration-none text-warning " href="<?= BASE_URL_PATH ?>">Trang chủ</a> >
        <a class="text-decoration-none text-warning" href="<?= BASE_URL_PATH . 'shop.php' ?>">Sản phẩm</a> >
        <a class="text-decoration-none text-warning" href="<?= BASE_URL_PATH . 'shop.php' ?>"><?= $detailCake->typecake->type_cake ?></a> >
        <a class="text-decoration-none text-warning  fw-bold" href="#"><?= $detailCake->cake ?></a>
    </div>
    <hr>
    <form action="addCake_cart.php" method="post" class="row">
        <div class="col-lg-6">
            <img src="img/cakes/<?= $detailCake->img ?>" height="400px" class="card-img-top mt-2 rounded-1" alt="...">
        </div>
        <div class="col-lg-6">
            <h5 class="bg-info bg-opacity-75 py-1 rounded-2 text-center fs-3"><?= $detailCake->cake ?></h5>
            <p class="fs-5"><?= $detailCake->detail ?></p>
            <hr>
            <div class="d-flex">
                <h5 class="mx-2"><?= number_format($detailCake->price, 0, '', '.') ?> VNĐ</h5>
                <input type="hidden" name="idcake" value="<?= $detailCake->id ?>">
                <input class="mx-2 rounded-2" type="number" name="number" id="" min="1" max="100" value="1">
                <button type="submit" class="mx-2 btn rounded-3 bg-warning bg-opacity-75 fw-bold"><i class="fas fa-cart-plus"></i> Thêm vào giỏ</button>
            </div>
        </div>
    </form>
</main>

<?php
include '../partials/footer.php';
