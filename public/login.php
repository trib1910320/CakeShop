<?php
define('TITLE', 'Đăng nhập');
require '../partials/header.php';
require '../partials/narbar.php';
require '../partials/notification.php';
?>
<div class="container mt-4 mb-4">
	<div class="card border-info w-50 mx-auto">
		<div class="card-header bg-info fw-bold text-black text-center fs-4">Đăng nhập</div>
		<div class="card-body text-center">
			<form method="POST" action="loggedin.php">
				<div class="form-group row my-2">
					<label for="email_address" class="col-md-4 col-form-label text-md-right fw-bold"> Tên đăng nhập:</label>
					<div class="col-md-6">
						<input type="text" id="username" class="form-control" placeholder="Nhập vào tên đăng nhập" name="username" autofocus>
					</div>
				</div>
				<div class="form-group row my-2">
					<label for="password" class="col-md-4 col-form-label text-md-right fw-bold">Mật Khẩu:</label>
					<div class="col-md-6">
						<input type="password" id="password" class="form-control" placeholder="Nhập vào mật khẩu" name="password">
					</div>
				</div>

				<div class="form-group row my-2">
					<div class="col-md-12">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="remember"> Ghi nhớ tôi.
							</label>
							<a href="sign_up.php">Bạn chưa có tài khoản?</a>
						</div>
					</div>
				</div>
				<div class="col-md-6 offset-md-3 my-2">
					<button type="submit" class="btn btn-primary">
						Đăng nhập
					</button>
				</div>
		</div>
	</div>
</div>
<?php
include '../partials/footer.php';
