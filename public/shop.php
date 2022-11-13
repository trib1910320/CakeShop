<?php
define('TITLE', 'Sản phẩm');

require '../partials/header.php';
require '../partials/narbar.php';

use App\Models\Cake;
use App\Models\TypeCake;

$cakes = Cake::all();
$page = ceil(Cake::count('id') / 8);
$types = TypeCake::all();
if (isset($_REQUEST['idtype'])) {
    $cakes = Cake::where('id_type', $_REQUEST['idtype'])->get();
} elseif (isset($_REQUEST['search'])) {
    $cakes = Cake::where('cake', 'LIKE', '%' . $_REQUEST['search'] . '%')->get();
} elseif (isset($_REQUEST['page'])) {
    $cakes = Cake::all()->skip(($_REQUEST['page'] * 8) - 8)->take(8);
} else {
    $cakes = Cake::all()->take(8);
}

?>
<main>
    <?php require '../partials/notification.php' ?>
    <!-- Menu Begin -->
    <div class="card my-1">
        <div class="mb-2 shop">
            <h1 class="text-center fs-2 fw-bold text-bg-info bg-opacity-50 rounded-2  fst-italic">Các loại bánh</h1>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner text-center">
                    <div class="carousel-item active justify-content-center d-flex">
                        <?php foreach ($types as $type) : ?>
                            <div class="card mx-1" style="width:200px; height:220px;">
                                <a class="card-body bg-info bg-opacity-25 nav-link fw-bold" href="<?= BASE_URL_PATH . 'shop.php?idtype=' .  $type->id ?>">
                                    <img class="card-img-top w-100" src="img/cakes/<?= $type->img ?>" alt="...">
                                    <?php echo $type->type_cake ?>
                                </a>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="carousel-item">
                        <!-- Thêm loại -->
                    </div>
                    <div class="carousel-item">
                        <!-- Thêm loại -->
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <i class="fas fa-chevron-circle-left text-black" style="font-size: 50px;"></i>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <i class="fas fa-chevron-circle-right text-black" style="font-size: 50px;"></i>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <!-- Menu End -->
    <!-- Nội dung chính Begin-->
    <div class="card">
        <div class="row justify-content-center">
            <?php foreach ($cakes as $cake) : ?>
                <div class="card text-bg-light text-center col-lg-3 m-2" style="width: 18rem;">
                    <form action="addCake_cart.php" method="post" name="addCake_cart">
                        <a href="<?= BASE_URL_PATH . 'detail_cake.php?id=' .  $cake->id ?>">
                            <img src="img/cakes/<?= $cake->img ?>" width="100px" height="150px" class="card-img-top mt-2 rounded-1" alt="...">
                        </a>
                        <div class="card-body ">
                            <a class="nav-link" href="<?= BASE_URL_PATH . 'detail_cake.php?id=' .  $cake->id ?>">
                                <input type="hidden" name="idcake" value="<?= $cake->id ?>">
                                <h4 class="card-title bg-warning bg-opacity-75 py-1 rounded-2"><?= $cake->cake ?></h4>
                            </a>
                            <div class="d-flex justify-content-center">
                                <h5 class="mx-1"><?= number_format($cake->price, 0, '', '.') ?> VNĐ</h5>
                                <input class="mx-1 rounded-2" type="number" name="number" id="number" min="1" max="100" value="1">
                            </div>
                            <button type="submit" class="btn btn-primary mt-2" id="liveAlertBtn">Thêm vào giỏ</button>
                        </div>
                    </form>
                </div>
            <?php endforeach ?>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center mx-5 mt-3">
                    <li class="page-item <?php if ($_SERVER['REQUEST_URI'] == BASE_URL_PATH . 'shop.php' or $_SERVER['REQUEST_URI'] == BASE_URL_PATH . 'shop.php?page=1') : echo 'active'; ?><?php endif ?>"><a class="page-link" href="shop.php?page=1">1</a></li>
                    <?php if ($page >= 2) : ?>
                        <?php for ($i = 2; $i <= $page; $i++) : ?>
                            <li class="page-item <?php if ($_SERVER['REQUEST_URI'] == BASE_URL_PATH . 'shop.php?page=' . $i) : echo 'active'; ?><?php endif ?>"><a class="page-link" href="shop.php?page=<?= $i ?>"><?= $i ?></a></li>
                        <?php endfor ?>
                    <?php endif ?>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Nội dung chính End-->
</main>

<?php
include '../partials/footer.php';
