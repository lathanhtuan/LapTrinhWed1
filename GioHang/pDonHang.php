<?php
require_once 'init.php';

//demo user
$_SESSION['userId'] = 1;
$currentUser = 1;

 $title = 'Đơn Hàng Cá Nhân'; 
 // $currentUser = getCurrentUser();
 
 ?>
<?php include 'header.php'; ?>

<!-- Chuc Nang giỏ hàng đã đăng nhập -->
<div id="quanlygiohang">
	<table class="table">
	  <thead class="thead-light">
		<tr>
		  <th scope="col">STT</th>
		  <th scope="col">Mã Đơn Hàng</th>
		  <th scope="col">Ngày đặt</th>
		  <th scope="col">Tổng tiền</th>
		  <th scope="col">Trạng thái</th>
		  <th scope="col">Thao tác</th>
		</tr>
	  </thead>
	  <tbody>
	  	<?php DSDonHang(1); ?>
	  </tbody>
	</table>
</div>
<?php if(isset($_GET["id"])): ?>
<div class="d-flex justify-content-center">
	<h3><p class="text-info"> Thông tin chi tiết đơn hàng </p> </h3>
</div>
<div>
	<table class="table">
		<thead class="thead-light">
		<tr>
		  <th scope="col">Mã Đơn Hàng</th>
		  <th scope="col">Tên sản phẩm</th>
		  <th scope="col">Hình</th>
		  <th scope="col">Giá</th>
		  <th scope="col">Số lượng</th>
		</tr>
	  </thead>
	  <tbody>
	  <?php ChiTietDonHang($_GET["id"]); ?>
	  </tbody>
	</table>
</div>
<?php endif; ?>
<?php include 'footer.php'; ?>