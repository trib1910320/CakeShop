<?php
use App\Models\Cart;
use App\Models\TypeCake;

$types = TypeCake::all();

$numbercart = 0;
if (isset($_SESSION['user'])) {
    $cartuser = Cart::where('id_user', $_SESSION['iduser'])->where('status', 0)->first();
    if($cartuser !== null){
        $numbercart = $cartuser->cakes->count();
    }elseif ($cartuser == null) {
        $addCart = Cart::create([
            'id_user' => $_SESSION['iduser']
        ]);
    }
}
?>
<!-- Header Section Begin -->
<header class="navbar navbar-expand-lg text-black sticky-top mb-1">
    <div class="row container-fluid">
        <div class="col-lg-2 col-sm-12">
            <a class="mx-5" href="<?= BASE_URL_PATH ?>">
                <img src="img/logo.png" class="bg-light py-1 px-2 rounded-2" alt="Avatar Logo" width=100px height=auto>
            </a>
        </div>
        <!-- thanh điều hướng -->
        <div class="col-lg-5 col-sm-12">
            <nav>
                <ul class="nav nav-pills fs-5 fw-bold">
                    <li class="nav-item"><a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == BASE_URL_PATH) : echo 'active'; ?><?php endif ?>" href="<?= BASE_URL_PATH ?>">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == BASE_URL_PATH . 'about.php') : echo 'active'; ?><?php endif ?>" href="about.php">Giới thiệu</a></li>
                    <li class="nav-item">
                        <div class="btn-group rounded-2" <?php if ($_SERVER['REQUEST_URI'] == BASE_URL_PATH . 'shop.php' 
                                                        OR substr($_SERVER['REQUEST_URI'],0,-1) == BASE_URL_PATH . 'shop.php?page='
                                                        OR substr($_SERVER['REQUEST_URI'],0,-strlen(strchr($_SERVER['REQUEST_URI'],'='))) == BASE_URL_PATH . 'shop.php?search') :
                                                         echo ' style="background-color: white;"'; ?><?php endif ?>>
                            <a href="shop.php" type="button" class="nav-link <?php if ($_SERVER['REQUEST_URI'] == BASE_URL_PATH . 'shop.php') : echo 'text-black'; ?><?php endif ?>">Sản phẩm</a>
                            <button class="nav-link btn btn-primary dropdown-toggle dropdown-toggle-split <?php if ($_SERVER['REQUEST_URI'] == BASE_URL_PATH . 'shop.php') : echo 'text-black'; ?><?php endif ?>" data-bs-toggle="dropdown" aria-expanded="false">
                            </button>
                            <ul class="dropdown-menu">
                                <?php foreach ($types as $type) : ?>
                                    <li><a class="dropdown-item" href="<?= BASE_URL_PATH . 'shop.php?idtype=' .  $type->id ?>"><?= $type->type_cake ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == BASE_URL_PATH . 'contact.php') : echo 'active'; ?><?php endif ?>" href="contact.php">Liên hệ</a></li>
                </ul>
            </nav>
        </div>
        <!-- Phần người dùng -->
        <div class="col-lg-5 col-sm-12">
            <div class="d-flex m-auto">
                <ul class="nav">
                    <?php if (!(isset($_SESSION['user']))) : ?>
                        <li class="nav-item dropdown">
                            <button type="button" class="nav-link dropdown btn btn-outline-primary text-black fw-bold <?php if ($_SERVER['REQUEST_URI'] == BASE_URL_PATH . 'login.php') : echo 'active'; ?><?php endif ?>" data-bs-toggle="dropdown">Tài
                                khoản</button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="login.php">Đăng nhập</a></li>
                                <li><a class="dropdown-item" href="sign_up.php">Đăng ký</a></li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li class="nav-item dropdown">
                            <button type="button" class="nav-link dropdown btn btn-primary text-white fw-bold" data-bs-toggle="dropdown">
                                Hi, <span class="text-warning"><?= $_SESSION['user'] ?></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="changePassw.php">Đổi mật khẩu</a></li>
                                <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                                <?php if ($_SESSION['admin']) : ?>
                                    <li><a class="dropdown-item text-danger fw-bold" href="/admin/index.php">Trang quản trị</a></li>
                                <?php endif ?>
                            </ul>
                        </li>
                    <?php endif ?>
                </ul>
                <div class="m-auto">
                    <div class="d-flex">
                        <div class="d-flex m-auto">
                            <form class="d-flex" method="get" name='frmsearch' action="shop.php">
                                <input class="border-0 p-1 rounded-start" type="search" name='search' onkeypress="" placeholder="Nhập nội dung cần tìm...">
                                <button type="submit" class="btn btn-primary rounded-0 rounded-end">
                                    <i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <a class="btn btn-success mx-1" href="<?= BASE_URL_PATH . 'cart.php' ?>">
                            <span class="badge"><i class="fa fa-shopping-cart"></i> <?= $numbercart ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Header Section End -->