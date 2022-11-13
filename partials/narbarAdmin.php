<div class="card h-100">
    <div class="card-header bg-primary text-center fs-5">
        <i class="fas fa-bars"></i>
        <span>DANH MỤC</span>
    </div>
    <div class="card-body">
        <div class="card h-100">
            <div class="card-header d-flex">
                <img class="rounded-5" src="<?= BASE_URL_PATH . "img/admin.png" ?>" width="50px" height="50px">
                <p class="my-1 mx-3 fs-4 fw-bold"><?=$_SESSION['user']?></p>
            </div>
            <div class="card-body">
                <ul class="flex-column nav nav-pills fs-5" style="list-style: none;">
                    <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI']== BASE_URL_PATH . 'admin/index.php' OR substr($_SERVER['REQUEST_URI'],0,-1) == BASE_URL_PATH . 'admin/index.php?page='):echo 'active';?><?php endif ?>" href="<?= BASE_URL_PATH . 'admin/index.php'?>"><i class="fas fa-cookie"></i> Bánh</a></li>
                    <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI']== BASE_URL_PATH . 'admin/typecake.php' OR substr($_SERVER['REQUEST_URI'],0,-1) == BASE_URL_PATH . 'admin/typecake.php?page='):echo 'active';?><?php endif ?>" href="<?= BASE_URL_PATH . 'admin/typecake.php'?>"><i class="fas fa-birthday-cake"></i> Loại Bánh</a></li>
                    <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI']== BASE_URL_PATH . 'admin/contact.php'):echo 'active';?><?php endif ?>" href="<?= BASE_URL_PATH . 'admin/contact.php'?>"><i class="fas fa-mail-bulk"></i> Hộp thư</a></li>
                    <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI']== BASE_URL_PATH . 'admin/order.php'):echo 'active';?><?php endif ?>" href="<?= BASE_URL_PATH . 'admin/order.php'?>"><i class="fas fa-shipping-fast"></i> Đơn hàng</a></li>
                    <li class="nav-item"><a class="nav-link <?php if($_SERVER['REQUEST_URI']== BASE_URL_PATH . 'admin/users.php'):echo 'active';?><?php endif ?>" href="<?= BASE_URL_PATH . 'admin/users.php'?>"><i class="fas fa-users"></i> Khách hàng</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL_PATH ?>"><i class="fas fa-home"></i> Về trang Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
