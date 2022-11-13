<?php
require "../../partials/headerAdmin.php";
use App\Models\Cake;

$cakes = Cake::all();
//Xóa bánh
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && (Cake::find($_POST['id'])) !== null) {
    try{
        Cake::find($_POST['id'])->delete();
        $_SESSION['notificSuccess']="Bạn đã xóa sản phẩm thành công.";
        header('Location: ' . BASE_URL_PATH . 'admin/index.php');
        exit();
    }catch(Exception $e){
        $_SESSION['notificError']="Bạn không thể thực hiện thao tác này.";
        header('Location: ' . BASE_URL_PATH . 'admin/index.php');
        exit();
    }
    
}