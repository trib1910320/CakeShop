<?php

define('TITLE', 'Logout');
include '../partials/header.php';

if (isset($_SESSION['user'])) {
	unset($_SESSION['user']);
	header('Location: '. BASE_URL_PATH.'login.php');
    exit();
}

include '../partials/footer.php';
?>