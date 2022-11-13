<?php
define('TITLE', 'Các loại bánh');
require "../../partials/headerAdmin.php";
require "../../partials/check_admin.php";

use App\Models\TypeCake;

$typecakes = TypeCake::all();
$page = ceil(TypeCake::count('id') / 5);

//
if (isset($_REQUEST['page'])) {
    $typecakes = TypeCake::all()->skip(($_REQUEST['page'] * 5) - 5)->take(5);
} else {
    $typecakes = TypeCake::all()->take(5);
}
?>
<main class="row">
<?php require '../../partials/notification.php' ?>
    <div class="col-lg-3 h-auto">
        <?php include "../../partials/narbarAdmin.php" ?>
    </div>
    <div class="card col-lg-9">
        <h1 class="card text-center bg-primary pb-2">Các loại bánh</h1>
        <div class="row mt-3">
            <div class="col-lg-9 d-flex">
                <a class="nav-link link-primary" href="<?= BASE_URL_PATH . 'admin/index.php' ?>">Trang quản trị > </a>
                <a class="nav-link link-primary" href="<?= BASE_URL_PATH . 'admin/typecake.php' ?>">Loại bánh</a>
            </div>
            <div class="col-lg-3">
                <a class="btn btn-primary" href="<?= BASE_URL_PATH . 'admin/addType.php' ?>">
                    <i class="fas fa-plus"></i>
                    <span>Thêm Loại bánh</span>
                </a>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-lg-8">
                <div class="col-lg-8 fs-5">
                    <i class="fas fa-list mx-1"></i><span>Danh sách các loại bánh</span>
                </div>
            </div>
            <form class="col-lg-4 d-flex" id="search" method="get" action="#">
                <input class="form-control me-2" type="search" placeholder="Từ khóa tìm kiếm..." name="search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <br>
        <div class="table-responsive container">
            <table class="table table-hover table-bordered text-center" id="list" style="vertical-align:middle ;">
                <thead>
                    <tr class="bg-opacity-50 bg-danger fs-5" style="vertical-align:middle ;">
                        <th>STT</th>
                        <th>Mã Bánh</th>
                        <th>Hình ảnh</th>
                        <th>Tên loại bánh</th>
                        <th>Ngày nhập</th>
                        <th>Chỉnh sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($typecakes as $typecakeId => $typecake) : ?>
                        <tr>
                            <td><?= $typecakeId ?></td>
                            <td><?= $typecake->id ?></td>
                            <td><img src="../img/cakes/<?= $typecake->img ?>" alt="..." width="100px" height="100px"></td>
                            <td><?= $typecake->type_cake ?></td>
                            <td><?= date("d-m-Y", strtotime($typecake->date_entered)) ?></td>
                            <td>
                                <a href="<?= BASE_URL_PATH . 'admin/editType.php?id=' . $typecake->id ?>" class="btn btn-success">
                                    <i alt='Chỉnh sửa' class='fas fa-tools'></i></a>
                            </td>
                            <td>
                                <form action="delType.php" method="POST" name="delType<?= $typecake->id ?>">
                                    <input type="hidden" name="id" value="<?= $typecake->id ?>">
                                    <button type="submit" class="btn btn-xs btn-danger" name="delete-type<?= $typecake->id ?>"  data-bs-toggle="modal" data-bs-target="#delete-confirm">
                                        <i alt='Xóa' type='submit' class='fas fa-trash-alt'></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center mx-5">
                    <li class="page-item <?php if ($_SERVER['REQUEST_URI'] == BASE_URL_PATH . 'admin/typecake.php' or $_SERVER['REQUEST_URI'] == BASE_URL_PATH . 'admin/typecake.php?page=1') : echo 'active'; ?><?php endif ?>">
                        <a class="page-link" href="typecake.php?page=1">1</a>
                    </li>
                    <?php if ($page >= 2) : ?>
                        <?php for ($i = 2; $i <= $page; $i++) : ?>
                            <li class="page-item <?php if ($_SERVER['REQUEST_URI'] == BASE_URL_PATH . 'admin/typecake.php?page=' . $i) : echo 'active'; ?><?php endif ?>">
                                <a class="page-link" href="typecake.php?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor ?>
                    <?php endif ?>
                </ul>
            </nav>
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
        <?php foreach ($typecakes as $typecake) : ?>
            $('button[name="delete-type<?= $typecake->id ?>"]').on('click', function(e) {
                e.preventDefault();
                const nameTd = $(this).closest('tr').find('td:eq(3)');
                if (nameTd.length > 0) {
                    $('.modal-body').html(`Bạn có muốn xóa loại bánh "${nameTd.text()}" không ?`);
                }
                $('#delete-confirm').modal({
                    backdrop: 'static',
                    keyboard: false
                }).one('click', '#cancel', function() {
                    $('#delete-confirm').modal('hide')
                }).one('click', '#delete', function() {
                    document.forms['delType<?= $typecake->id ?>'].submit();
                });
            });
        <?php endforeach ?>
    });
</script>
<?php require '../../partials/footerAdmin.php' ?>