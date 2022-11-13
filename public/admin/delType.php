<?php
require "../../partials/headerAdmin.php";
use App\Models\TypeCake;

$typecakes = TypeCake::all();
// Xóa loại bánh
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && (TypeCake::find($_POST['id'])) !== null) {
    try {
        TypeCake::find($_POST['id'])->delete();
        $_SESSION['notificSuccess']="Bạn đã xóa loại sản phẩm thành công.";
        header('Location: ' . BASE_URL_PATH . "admin/typecake.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['notificError']="Bạn không thể thực hiện thao tác này.";
        header('Location: ' . BASE_URL_PATH . 'admin/typecake.php');
        exit();
    }
}