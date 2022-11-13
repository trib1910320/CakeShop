<?php

if ((isset($_SESSION['user'])) && ($_SESSION['admin']==0)) {
	require 'narbar.php';
	echo '<h2>Truy cập bị từ chối!</h2>';

	$error_message = 'Bạn không có quyền truy xuất trang này';
	require 'show_error.php';

	require 'footer.php';
	exit();
}elseif(!isset($_SESSION['user'])){
	header('Location: ' . BASE_URL_PATH . 'login.php');
    exit();
}
