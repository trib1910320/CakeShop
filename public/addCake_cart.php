<?php require_once '../bootstrap.php';

use App\Models\Cake;
use App\Models\Cart;

if (isset($_SESSION['user'])) {
    $cartuser = Cart::where('id_user', $_SESSION['iduser'])->where('status', 0)->first();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idcake']) && (Cake::find($_POST['idcake'])) !== null) {
        $addcake = Cake::find($_POST['idcake']);
        $findCake = 0;
        foreach ($cartuser->cakes as $cake) { //Tìm cake trong giỏ
            if($cake->detail_cart->cake_id == $_POST['idcake']){
                $findCake = 1;
            }
        }
        if ($findCake ==1) {//Đã có cake trong giỏ thì tăng số lượng
            $numberNew = ($cake->detail_cart->number)+ ($_POST['number']);
            $cartuser->cakes()->updateExistingPivot($addcake->id,[
                    'number' => $numberNew ]);       
        }else{//Thêm cake vào giỏ
            $cartuser->cakes()->attach($addcake->id,[
                'number' => $_POST['number']]);       
        }
    }
} else {
    $_SESSION['notificLogin']="Vui lòng đăng nhập để đặt hàng từ Shop";
    header('Location: ' . BASE_URL_PATH . 'login.php');
    exit(); 
}
$_SESSION['notificSuccess']="Bạn đã thêm vào giỏ hàng thành công";
header('Location: '.BASE_URL_PATH.'shop.php');
exit();
