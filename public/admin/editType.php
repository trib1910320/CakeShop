<?php
define('TITLE', 'Cập nhập loại bánh');
require '../../partials/headerAdmin.php';
require "../../partials/check_admin.php";
$_SERVER['REQUEST_URI'] = BASE_URL_PATH . 'admin/typecake.php';

use App\Models\TypeCake;

$typeEdit = TypeCake::find($_REQUEST['id']);
$id = isset($_REQUEST['id']) ? filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT) : -1;
if ($id < 0 || !(TypeCake::find($_REQUEST['id']))) {
    header('Location: ' . BASE_URL_PATH . 'admin/typecake.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['type_cake'])) {
    if ($_FILES['img']['error'] == 0) {
        $typeEdit->img = $_FILES['img']['name'];
    }
    $typeEdit->type_cake = $_POST['type_cake'];
    $typeEdit->date_entered = date('Y-m-d H:i:s');
    $typeEdit->save();
    header('Location: ' . BASE_URL_PATH . 'admin/typecake.php');
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
            <span>Cập nhật Loại bánh</span>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <table class="m-auto">
                    <tr>
                        <th>Mã loại bánh:</th>
                        <td>
                            <h6 class="bg-warning p-1 text-center text-uppercase"><?= $typeEdit->id ?></h6>
                        </td>
                    </tr>
                    <tr>
                        <th>Hình ảnh:</th>
                        <td>
                            <img class="rounded-3" id="outImg" src="../img/cakes/<?= $typeEdit->img ?>" alt="" width="100px" height="100px">
                            <input type="file" name="img" id="img" alt="<?= $typeEdit->img ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Tên loại bánh:</th>
                        <td><input value="<?= $typeEdit->type_cake ?>" id="type_cake" name="type_cake" required type="text" placeholder="không rỗng"></td>
                    </tr>
                    <tr>
                        <th>Ngày cập nhật:</th>
                        <td><input disabled value="<?= date("d/m/Y H:i:s", strtotime($typeEdit->date_entered)) ?>" id="date_entered" name="date_entered" type="text"></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <button class="btn btn-success" type="submit">Cập nhập thông tin</button>
                            <a href="<?= BASE_URL_PATH . 'admin/typecake.php' ?>" class="btn btn-danger" type="reset">Hủy</a>
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