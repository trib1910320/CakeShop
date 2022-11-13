<?php 
require '../partials/header.php';
use App\Models\Cart;
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cartHide = Cart::where('id',$_POST['id'])->where('hide',0)->first();
    $cartHide->hide = 1;
    $cartHide->save();
    header('Location: ' . BASE_URL_PATH . 'cart.php');
    exit();
}