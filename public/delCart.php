<?php
require_once '../bootstrap.php';

use App\Models\Cart;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $cartuser = Cart::where('id_user', $_SESSION['iduser'])->where('id', $_POST['id'])->first();
    foreach($cartuser->cakes as $cake){
        $newQuantity_sold = $cake->quantity_sold - $cake->detail_cart->number;
        $cake->quantity_sold=$newQuantity_sold;
        $cake->save();
    }
    $cartuser->cakes()->detach();
    $cartuser->delete();
}
header('Location: ' . BASE_URL_PATH . 'cart.php');
exit();
