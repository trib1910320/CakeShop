<?php require_once '../bootstrap.php';

use App\Models\Cart;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && ($_POST['numbercart'] != 0)) {
    $order = Cart::find($_POST['id']);
    foreach($order->cakes as $cake){
        $newQuantity_sold = $cake->quantity_sold + $cake->detail_cart->number;
        $cake->quantity_sold=$newQuantity_sold;
        $cake->save();
    }
    $order->status = 1;
    $order->date_entered = date('Y-m-d H:i:s');
    $order->save();
    $addCart = Cart::create([
        'id_user' => $_SESSION['iduser'],
        'date_entered' => date('Y-m-d H:i:s')
    ]);
    $_SESSION['notificSuccess']="Bạn đã đặt hàng thành công";
    header('Location: ' . BASE_URL_PATH . 'cart.php');
    exit();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && ($_POST['numbercart'] == 0)) {
    $_SESSION['notificError']="Giỏ hàng của bạn hiện đang bị trống";
    header('Location: ' . BASE_URL_PATH . 'cart.php');
    exit();   
}
