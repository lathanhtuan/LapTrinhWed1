<?php
require_once 'init.php';

//demo user
$_SESSION['userId'] = 1;
$currentUser = 1;

 $title = 'Quản Lý Giỏ Hàng'; 
 // $currentUser = getCurrentUser();
 ?>
<?php include 'header.php'; ?>

<!-- Chuc Nang giỏ hàng đã đăng nhập -->
<div id="quanlygiohang">
	<table class="table">
	  <thead class="thead-light">
		<tr>
		  <th scope="col">STT</th>
		  <th scope="col">Tên sản phẩm</th>
		  <th scope="col">Hình</th>
		  <th scope="col">Giá</th>
		  <th scope="col">Số lượng</th>
		  <th scope="col">Thao tác</th>
		</tr>
	  </thead>
	  <tbody>
		<!-- Liệt Kê Giỏ Hàng (Test) -->
	  <?php DSGioHang(1); ?>
	  </tbody>
	</table>
	<!-- Tính tiền Giỏ Hàng (Test) -->
	<div class="d-flex justify-content-center">
		<h5><p class="text-danger">Tổng Tiền:  <?php TongTien(1); ?> đ</p> </h5>
	</div>
</div>
<div class="d-flex justify-content-center">
	<h3><p class="text-info"> Thông tin thanh toán </p> </h3>
</div>
<div>
	<form action="#" method="POST" class="d-flex justify-content-center" >
		<div class="form-row w-100">
			<div class="form-group ml-3">
				<label for="HoTen">Họ Tên Khách Hàng: </label>
				<input type="text" class="form-control w-100" id="hoten" name="hoten" placeholder="Họ tên khách hàng" >
			</div>
			<!--Số Điện Thoại-->
			<div class="form-group ml-3">
				<label for="SDT">Số Điện Thoại: </label>
				<input type="text" class="form-control w-100" id="sdt" name="sdt" placeholder="Số Điện Thoại" >
			</div>
		<!--Địa Chỉ Giao Hàng-->
		<div class="form-group col-md-6 ml-3">
			<label for="DiaChi">Địa Chỉ Giao Hàng: </label>
			<input type="text" class="form-control w-100" id="diachi" name="diachi" placeholder="Địa Chỉ" aria-describedby="diachiHelp">
			<small id="diachiHelp" class="form-text text-muted">Quý khách vui lòng nhập chính xác địa chỉ cần giao hàng.</small>
		</div>
		</div>
		<!--dang ky button-->
		<button type="submit" class="btn btn-primary mb-2">Mua Ngay</button>
	</form>
</div>
<?php include 'footer.php'; ?>
