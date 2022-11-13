<?php
define('TITLE', 'Trang quản trị');
require "../../partials/headerAdmin.php";
require "../../partials/check_admin.php";

use App\Models\Cake;

$cakes = Cake::all();
$page = ceil(Cake::count('id') / 5);

//skip() bỏ qua, take() lấy
if (isset($_REQUEST['page'])) {
    $cakes = Cake::all()->skip(($_REQUEST['page'] * 5) - 5)->take(5);
} else {
    $cakes = Cake::all()->take(5);
}
if (isset($_REQUEST['search'])) {
    $cakes = Cake::where('cake', 'LIKE', '%' . $_REQUEST['search'] . '%')->get();
}
?>
<main class="row">
    <?php require '../../partials/notification.php' ?>
    <div class="col-lg-3 h-auto">
        <?php include "../../partials/narbarAdmin.php" ?>
    </div>
    <div class="card col-lg-9">
        <div>
            <h1 class="card text-center bg-primary pb-2">Sản phẩm</h1>
            <div class="row mt-3">
                <div class="col-lg-9 d-flex">
                    <a class="nav-link link-primary" href="<?= BASE_URL_PATH . "admin/index.php" ?>">Trang quản trị > </a>
                    <a class="nav-link link-primary" href="<?= BASE_URL_PATH . "admin/index.php" ?>">Bánh</a>
                </div>
                <div class="col-lg-3">
                    <a class="btn btn-primary" href="<?= BASE_URL_PATH . "admin/addCake.php" ?>">
                        <i class="fas fa-plus"></i>
                        <span>Thêm Sản Phẩm</span>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <div>
            <div class="row">
                <div class="col-lg-8 fs-5">
                    <i class="fas fa-list mx-1"></i><span>Danh sách bánh</span>
                </div>
                <form class="col-lg-4 d-flex" id="search" method="get" action="<?= BASE_URL_PATH . "admin/index.php" ?>">
                    <input class="form-control me-2" type="search" placeholder="Từ khóa tìm kiếm..." name="search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <br>
            <div class="table-responsive container">
                <table class="table table-hover table-bordered text-center" id="list" style="vertical-align:middle ;">
                    <thead>
                        <tr class="bg-opacity-50 bg-danger fs-5" style="vertical-align:middle ;">
                            <th>Mã Bánh</th>
                            <th>Hình ảnh</th>
                            <th>Tên Bánh</th>
                            <th>Loại Bánh</th>
                            <th>Số lượng đã bán</th>
                            <th>Đơn giá bán</th>
                            <th>Ngày cập nhật</th>
                            <th>Chỉnh sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cakes as $cake) : ?>
                            <tr>
                                <td><?= $cake->id ?></td>
                                <td><img src="../img/cakes/<?= $cake->img ?>" alt="..." width="100px" height="100px" class="rounded-1"></td>
                                <td><?= $cake->cake ?></td>
                                <td><?= $cake->typecake->type_cake ?></td>
                                <td><?= $cake->quantity_sold ?></td>
                                <td><?= number_format($cake->price, 0, '', '.') ?> VNĐ</td>
                                <td><?= date("d-m-Y", strtotime($cake->date_entered)) ?></td>
                                <td>
                                    <a href="editCake.php?id=<?= $cake->id ?>" class="btn btn-success">
                                        <i alt='Chỉnh sửa' class='fas fa-tools'></i></a>
                                </td>
                                <td>
                                    <form action="delCake.php" method="POST" name="delCake<?= $cake->id ?>">
                                        <input type="hidden" name="id" value="<?= $cake->id ?>">
                                        <button type="submit" class="btn btn-xs btn-danger" name="delete-cake<?= $cake->id ?>" data-bs-toggle="modal" data-bs-target="#delete-confirm">
                                            <i alt='Xóa' type='submit' class='fas fa-trash-alt'></i></button>
                                    </form>
                                </td>
                            </tr>


                        <?php endforeach ?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mx-5">
                        <li class="page-item <?php if ($_SERVER['REQUEST_URI'] == BASE_URL_PATH . 'admin/index.php' or $_SERVER['REQUEST_URI'] == BASE_URL_PATH . 'admin/index.php?page=1') : echo 'active'; ?><?php endif ?>">
                            <a class="page-link" href="index.php?page=1">1</a>
                        </li>
                        <?php if ($page >= 2) : ?>
                            <?php for ($i = 2; $i <= $page; $i++) : ?>
                                <li class="page-item <?php if ($_SERVER['REQUEST_URI'] == BASE_URL_PATH . 'admin/index.php?page=' . $i) : echo 'active'; ?><?php endif ?>">
                                    <a class="page-link" href="index.php?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor ?>
                        <?php endif ?>
                    </ul>
                </nav>
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
        //Xóa sản phẩm 
        <?php foreach ($cakes as $cake) : ?>
            $('button[name="delete-cake<?= $cake->id ?>"]').on('click', function(e) {
                e.preventDefault();
                const nameTd = $(this).closest('tr').find('td:eq(2)');
                if (nameTd.length > 0) {
                    $('.modal-body').html(`Bạn có muốn xóa bánh "${nameTd.text()}" không ?`);
                }
                $('#delete-confirm').modal({
                    backdrop: 'static',
                    keyboard: false
                }).one('click', '#cancel', function() {
                    $('#delete-confirm').modal('hide')
                }).one('click', '#delete', function() {
                    document.forms['delCake<?= $cake->id ?>'].submit();
                });
            });
        <?php endforeach ?>
    });
</script>
<?php require '../../partials/footerAdmin.php' ?>