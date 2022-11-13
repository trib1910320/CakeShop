<?php
require '../partials/header.php';
use App\Models\User;
$users = User::all();

$find = false;
$loggedin = false;
$error_message = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (!empty($_POST['username']) && !empty($_POST['password'])) {
		foreach($users as $user){
			if(($_POST['username'] == $user->username) && (password_verify($_POST['password'],$user->password))){
				$find=true;
				break;
			}
		}
		if ($find) {
			$_SESSION['iduser'] = $user->id;
			$_SESSION['user'] = $user->fullname;
			$_SESSION['admin'] = $user->id_admin;
			$loggedin = true;
		} else {
			$_SESSION['notificError'] = 'Tên đăng nhập hoặc mật khẩu của bạn không chính xác!';
		}
	} else {
		$_SESSION['notificError'] = 'Hãy đảm bảo rằng bạn cung cấp đầy đủ tên đăng nhập và mật khẩu!';
	}
}
if ($loggedin) {
	header('Location: '. BASE_URL_PATH);
    exit();
}else{
	header('Location: '. BASE_URL_PATH.'login.php');
    exit();
}