<?php
define('TITLE', 'Trang chủ');

require '../partials/header.php';
require '../partials/narbar.php';

use App\Models\Cake;

$hotcakes = Cake::orderBy('quantity_sold', 'DESC')->get();
$newcakes = Cake::orderBy('date_entered', 'DESC')->get();
?>
<main>
<?php require '../partials/notification.php' ?>
    <!-- Băng chuyền Begin -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="img/header_1.jpg" class="d-block m-auto" style="height: 500px; width: 100%; filter: brightness(50%);" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="fs-1">Thương hiệu đã được khẳng định</h2>
                    <p class="fs-4">Tạo ra sản phẩm tươi, mới, chất lượng và tốt cho sức khỏe</p>
                    <a class="btn btn-primary" href="about.php">Xem thêm</a>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="10000">
                <img src="img/header_2.jpg" class="d-block m-auto" style="height: 500px; width: 100%; filter: brightness(50%);" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="fs-1">Bánh sinh nhật của bạn</h2>
                    <p class="fs-4">Đặt bánh sinh nhật theo yêu cầu</p>
                    <a class="btn btn-primary" href="contact.php">Xem thêm</a>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="10000">
                <img src="img/header_3.jpg" class="d-block m-auto" style="height: 500px; width: 100%; filter: brightness(50%);" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="fs-1">Bánh mới ra lò</h2>
                    <p class="fs-4">Chúng tôi sẽ luôn có bánh mới sẳn sàng phục vụ bạn</p>
                    <a class="btn btn-primary" href="shop.php">Xem thêm</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <i class="fas fa-chevron-circle-left" style="font-size: 60px;"></i>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <i class="fas fa-chevron-circle-right" style="font-size: 60px;"></i>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Băng chuyền End -->

    <!-- Nội dung chính Begin-->
    <div class="my-2 card">
        <h1 class="text-center card-header fs-2 bg-warning bg-opacity-75 fw-bold fst-italic">Giới thiệu chung</h1>
        <div class="row card-body">
            <img class="col-lg-6 rounded-5" src="img/about_home.jpg" alt="">
            <div class="col-lg-6">
                <h2 class="text-warning fs-4 ">Sứ Mệnh Của Cake Shop Là Lưu Giữ Những Giá Trị Truyền Thống Của Bánh Việt Nam</h2>
                <p>Tiền thân là một tiệm bánh nhỏ của gia đình tại Cần Thơ. Cho đến nay, Cake Shop đã thành lập nên hệ thống hơn 10 cửa hàng lớn nhỏ khắp Cần Thơ. Chúng tôi là đơn vị chuyên về sản xuất và kinh doanh các loại bánh:</p>
                <ul>
                    <li>Bánh Âu</li>
                    <li>Bánh Bông Lan (Mặn, Ngọt)</li>
                    <li>Bánh Kem</li>
                    <li>Bánh Truyền thống Việt Nam</li>
                </ul>
                <p>Trong suốt quá trình hơn 20 năm phát triển, chúng tôi luôn đề cao vấn đề chất lượng sản phẩm, chất lượng phục vụ và sự tiện ích, nhằm mang đến giá trị lớn nhất cho khách hàng.</p>
            </div>
        </div>


    </div>
    <div class="my-2 card">
        <h1 class="text-center card-header fs-2 bg-warning bg-opacity-75 fw-bold fst-italic">Sản phẩm bán chạy</h1>
        <div class="d-flex justify-content-center card-body">
            <?php foreach ($hotcakes as $key => $hotcake) : ?>
                <?php if ($key == 4) : break; ?>
                <?php else : ?>
                    <div class="card text-bg-light text-center col-lg-3 m-2" style="width: 18rem;">
                        <a href="<?= BASE_URL_PATH . 'detail_cake.php?id=' .  $hotcake->id ?>">
                            <img src="img/cakes/<?= $hotcake->img ?>" width="100px" height="150px" class="card-img-top mt-2 rounded-1" alt="...">
                        </a>
                        <div class="card-body ">
                            <a class="nav-link" href="<?= BASE_URL_PATH . 'detail_cake.php?id=' .  $hotcake->id ?>">
                                <input type="hidden" name="idcake" value="<?= $hotcake->id ?>">
                                <h4 class="card-title bg-warning bg-opacity-75 py-1 rounded-2"><?= $hotcake->cake ?></h4>
                            </a>
                        </div>
                    </div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    </div>
    <div class="my-2 card">
        <h1 class="text-center card-header fs-2 bg-warning bg-opacity-75 fw-bold fst-italic">Sản phẩm mới ra mắt</h1>
        <div class="d-flex justify-content-center card-body">
            <?php foreach ($newcakes as $key => $newcake) : ?>
                <?php if ($key == 4) : break; ?>
                <?php else : ?>
                    <div class="card text-bg-light text-center col-lg-3 m-2" style="width: 18rem;">
                        <a href="<?= BASE_URL_PATH . 'detail_cake.php?id=' .  $newcake->id ?>">
                            <img src="img/cakes/<?= $newcake->img ?>" width="100px" height="150px" class="card-img-top mt-2 rounded-1" alt="...">
                        </a>
                        <div class="card-body ">
                            <a class="nav-link" href="<?= BASE_URL_PATH . 'detail_cake.php?id=' .  $newcake->id ?>">
                                <input type="hidden" name="idcake" value="<?= $newcake->id ?>">
                                <h4 class="card-title bg-warning bg-opacity-75 py-1 rounded-2"><?= $newcake->cake ?></h4>
                            </a>
                        </div>
                    </div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    </div>

    <!-- Nội dung chính End-->
</main>
<?php
include '../partials/footer.php';
?>