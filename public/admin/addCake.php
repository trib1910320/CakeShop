<?php
define('TITLE', 'Thêm sản phẩm');
require "../../partials/headerAdmin.php";
require "../../partials/check_admin.php";
$_SERVER['REQUEST_URI'] = BASE_URL_PATH . 'admin/index.php';

use App\Models\Cake;
use App\Models\TypeCake;

$type = TypeCake::all();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $AddCake = Cake::create([
        'img' => $_POST['img'],
        'cake' => $_POST['cake'],
        'price' => $_POST['price'],
        'detail' => $_POST['detail'],
        'id_type' => $_POST['id_type']
    ]);
    $_SESSION['notificSuccess'] = "Bạn đã thêm bánh mới thành công";
    header('Location: ' . BASE_URL_PATH . 'admin/index.php');
    exit();
}
?>

<main class="row">
    <div class="col-lg-3">
        <?php include "../../partials/narbarAdmin.php" ?>
    </div>
    <div class="card col-lg-9">
        <div class="card-header bg-primary fs-5">
            <i class="fas fa-plus"></i>
            <span>Thêm Sản Phẩm</span>
        </div>
        <div class="card-body">
            <form method="post" enctype="application/x-www-form-urlencoded">
                <table id="t1" class="m-auto">
                    <tr>
                        <th>Hình ảnh:</th>
                        <td>
                            <img class="rounded-3" id="outImg" alt="..." width="100px" height="100px">
                            <input id="img" name="img" required onchange="read(this)" type="file" accept=".jpg, .jpeg, .png">
                        </td>
                    </tr>
                    <tr>
                        <th>Tên Bánh:</th>
                        <td><input id="cake" name="cake" required type="text" placeholder="không rỗng"></td>
                    </tr>
                    <tr>
                        <th>Loại Bánh:</th>
                        <td>
                            <select name="id_type" required>
                                <option value="">--Chọn loại--</option>
                                <?php foreach ($type as $typecake) : ?>
                                    <option value="<?= $typecake->id ?>"><?= $typecake->type_cake ?></option>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Giá bán:</th>
                        <td><input id="price" name="price" required pattern="\d" type="number" placeholder="là số, đơn vị VNĐ"> vnđ</td>
                    </tr>
                    <tr>
                        <th colspan="2">Thông tin chi tiết sản phẩm:</th>
                    </tr>
                    <tr>
                        <th>Nội dung:</th>
                        <td><textarea name="detail" id="detail" cols="30" rows="5"></textarea></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <button class="btn btn-success" type="submit">Thêm bánh</button>
                            <a href="<?= BASE_URL_PATH . 'admin/index.php' ?>" class="btn btn-danger" type="reset">Hủy</a>
                        </td>
                    </tr>
                </table>

            </form>
        </div>
    </div>
    <script>
        function read(val) {
            const reader = new FileReader();

            reader.onload = (event) => {
                document.getElementById("outImg").src = event.target.result;
            }
            reader.readAsDataURL(val.files[0]);
        }
    </script>
</main>

<?php require '../../partials/footerAdmin.php' ?>