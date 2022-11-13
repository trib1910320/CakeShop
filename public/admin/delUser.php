<?php
require "../../partials/headerAdmin.php";
use App\Models\Cart;
use App\Models\User;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    //Xóa cart của user
    $cartuser = Cart::where('id_user', $_POST['id'])->get();
    foreach($cartuser as $cart){
        $cart->cakes()->detach();
        $cart->delete();
    }
    //Xóa user
    $user = User::where('id', $_POST['id'])->first();
    $user->delete();
}
$_SESSION['notificSuccess']="Bạn đã đã xóa người dùng thành công.";
header('Location: ' . BASE_URL_PATH . 'admin/users.php');
exit();
