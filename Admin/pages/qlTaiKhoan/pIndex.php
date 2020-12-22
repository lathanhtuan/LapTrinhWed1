<h2>
<p class="text-center">Quản lý tài khoản</p>
</h2>
<?php
	$a =1;
	if(isset($_GET["a"]))
		$a=$_GET["a"];
	switch ($a){
		case 1:
			include "pages/qlTaiKhoan/pDanhSach.php";
			break;
		case 2:
			include "pages/qlTaiKhoan/pDanhSach.php";
			include "pages/qlTaiKhoan/pXoa.php";
			break;
		case 3:
			include "pages/qlTaiKhoan/pDanhSach.php";
			include "pages/qlTaiKhoan/pThemTaiKhoan.php";
			break;
		default:
			include "pages/pError.php";
			break;
	}
?>
<?php if (isset($_GET["id"]) && $_GET["a"] ==1 && $_GET["c"] ==1): ?>
<!--Thông tin cập nhật tài khoản -->
<div class="container-fluid">
	<div class = "row">
		<div class ="col">
			<div  class="p-3 mb-2 bg-primary text-white">
				<h3 class="text-center">.:THÔNG TIN TÀI KHOẢN:.</h3>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col"></div>
		<div class="col-10">
			<form class="form-inline" method="POST" id="myform">
				<div class ="container">
					<?php ThongTinTaiKhoan($_GET["id"]); ?>
					<div class="row justify-content-center w-50">
						<button type="submit" class="btn btn-primary mb-2" name="submitpost">Cập Nhật</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endif; ?>