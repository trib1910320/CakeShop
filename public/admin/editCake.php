<?php
define('TITLE', 'Cập nhập sản phẩm');
require '../../partials/headerAdmin.php';
require "../../partials/check_admin.php";
date_default_timezone_set('Asia/Ho_Chi_Minh');
$_SERVER['REQUEST_URI'] = BASE_URL_PATH . 'admin/index.php';

use App\Models\Cake;
use App\Models\TypeCake;

$type = TypeCake::all();
$cakeEdit = Cake::find($_REQUEST['id']);
$id = isset($_REQUEST['id']) ? filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT) : -1;
if ($id < 0 || !(Cake::find($_REQUEST['id']))) {
    header('Location: ' . BASE_URL_PATH . 'admin/index.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cakeEdit'])) {
    if ($_FILES['img']['error'] == 0) {
        $cakeEdit->img = $_FILES['img']['name'];
    }
    $cakeEdit->cake = $_POST['cakeEdit'];
    $cakeEdit->price = $_POST['priceEdit'];
    $cakeEdit->id_type = $_POST['typeEdit'];
    $cakeEdit->detail = $_POST['detailEdit'];
    $cakeEdit->date_entered = date('Y-m-d H:i:s');
    $cakeEdit->save();
    header('Location: ' . BASE_URL_PATH . 'admin/index.php');
    exit();
}
?>

<main class="row">
    <div class="col-lg-3">
        <?php require '../../partials/narbarAdmin.php'; ?>
    </div>
    <div class="card col-lg-9">
        <div class="card-header bg-primary fs-5">
            <i class='fas fa-tools'></i>
            <span>Cập nhật Sản Phẩm</span>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <table class="m-auto">
                    <tr>
                        <th>Mã bánh:</th>
                        <td>
                            <h6 class="bg-warning p-1 text-center text-uppercase"><?= $cakeEdit->id ?></h6>
                        </td>
                    </tr>
                    <tr>
                        <th>Ngày cập nhật:</th>
                        <td><input disabled value="<?= date("d/m/Y H:i:s", strtotime($cakeEdit->date_entered))  ?>" id="date_entered" name="date_entered" type="text"></td>
                    </tr>
                    <tr>
                        <th>Hình ảnh:</th>
                        <td>
                            <img class="rounded-3" id="outImg" src="../img/cakes/<?= $cakeEdit->img ?>" alt="" width="100px" height="100px">
                            <input type="file" name="img" id="img" onchange="read(this)" value="<?= $cakeEdit->img ?>" accept=".jpg, .jpeg, .png">
                        </td>
                    </tr>
                    <tr>
                        <th>Tên bánh:</th>
                        <td><input value="<?= $cakeEdit->cake ?>" id="cakeEdit" name="cakeEdit" required type="text" placeholder="không rỗng"></td>
                    </tr>
                    <tr>
                        <th>Loại Bánh:</th>
                        <td>
                            <select name="typeEdit">
                                <option value="">--Chọn loại--</option>
                                <?php foreach ($type as $typecake) :
                                    if (($typecake->id) == ($cakeEdit->id_type)) : ?>
                                        <option selected value="<?= $typecake->id ?>"><?= $typecake->type_cake ?></option>
                                    <?php else : ?>
                                        <option value="<?= $typecake->id ?>"><?= $typecake->type_cake ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Giá bán:</th>
                        <td><input value="<?= $cakeEdit->price ?>" id="priceEdit" name="priceEdit" required pattern="\d" type="number" placeholder="đơn vị VNĐ"> VNĐ</td>
                    </tr>
                    <tr>
                        <th colspan="2">Thông tin chi tiết sản phẩm:</th>
                    </tr>
                    <tr>
                        <th>Nội dụng:</th>
                        <td colspan="2">
                            <textarea cols="30" rows="5" name="detailEdit" id="detailEdit"><?= $cakeEdit->detail ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <button class="btn btn-success" type="submit">Cập nhập thông tin</button>
                            <a href="<?= BASE_URL_PATH . 'admin/index.php' ?>" class="btn btn-danger" type="reset">Hủy</a>
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </div>
</main>
<script>
    function read(val) {
        const reader = new FileReader();

        reader.onload = (event) => {
            document.getElementById("outImg").src = event.target.result;
        }
        reader.readAsDataURL(val.files[0]);
    }
</script>

<?php require '../../partials/footerAdmin.php' ?>