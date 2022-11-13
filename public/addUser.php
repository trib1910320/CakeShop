<?php
require '../partials/header.php';

use App\Models\User;

$users = User::all();
$find = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($users as $user) {
        if ($user->username == $_POST['username']) {
            $_SESSION['notificError'] = "Tên tài khoản đã được sử dụng vui lòng thay đổi tên tài khoản khác";
            $find = true;
            break;
        }
    }
    if ($find == false) {
        $AddUser = User::create([
            'fullname' => $_POST['fullname'],
            'username' => $_POST['username'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address']
        ]);
    } else {
        header('Location: ' . BASE_URL_PATH . 'sign_up.php');
        exit();
    }
}
$_SESSION['notificSuccess'] = "Bạn đã đăng ký tài khoản thành công";
header('Location:' . BASE_URL_PATH . 'login.php');
exit();
