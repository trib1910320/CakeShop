<?php require '../bootstrap.php' ?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php
			if (defined('TITLE')) {
				echo TITLE;
			} else {
				echo 'Trang chủ';
			}
			?></title>
	
	<script src="js/jquery-3.6.1.min.js"></script>
	<link rel="stylesheet" href="css/all.min.css">
	<script src="js/all.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<script src="js/bootstrap.bundle.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=vietnamese" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>

<body id="top" class="container-fluid">
