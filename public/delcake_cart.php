<?php require_once '../bootstrap.php';

use App\Models\Cart;

$cartuser = Cart::where('id_user', $_SESSION['iduser'])->where('id', $_POST['idcart'])->first();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    foreach($cartuser->cakes as $cake){
        if($cake->detail_cart->id == $_POST['id']){
            $cake->detail_cart->delete('id',$_POST['id']);
        }
    }
}

header('Location: ' . BASE_URL_PATH . 'cart.php');
exit();
