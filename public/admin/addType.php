<?php
define('TITLE', 'Thêm sản phẩm');
require '../../partials/headerAdmin.php';
require "../../partials/check_admin.php";
$_SERVER['REQUEST_URI'] = BASE_URL_PATH . 'admin/typecake_admin.php';

use App\Models\TypeCake;

$type = TypeCake::all();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $AddTypeCake = TypeCake::create([
        'type_cake' => $_POST['type'],
        'img' => $_FILES['img']['name']
    ]);
    $_SESSION['notificSuccess']="Bạn đã thêm loại bánh mới thành công";
    header('Location: ' . BASE_URL_PATH . 'admin/typecake_admin.php');
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
            <span>Thêm Loại bánh</span>
        </div>
        <div class="card-body">
            <form method="post" enctype="application/x-www-form-urlencoded">
                <table id="t1" class="m-auto">
                    <tr>
                        <th>Hình ảnh:</th>
                        <td>
                            <img class="rounded-3" id="outImg"  alt="..." width="100px" height="100px">
                            <input id="img" name="img" required onchange = "read(this)" type="file" accept=".jpg, .jpeg, .png"></td>
                    </tr>
                    <tr>
                        <th>Tên loại bánh:</th>
                        <td><input id="type" name="type" required type="text" placeholder="không rỗng"></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <button class="btn btn-success" type="submit">Thêm bánh</button>
                            <a href="<?= BASE_URL_PATH . 'admin/typecake.php' ?>" class="btn btn-danger" type="reset">Hủy</a>
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