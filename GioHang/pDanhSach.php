<?php
require_once 'init.php';

//demo user
$_SESSION['userId'] = 1;
$currentUser = 1;

 $title = 'Quản Lý Giỏ Hàng'; 
 // $currentUser = getCurrentUser();
 if(isset($_POST['post']))
 {
	DatHang(1,$_POST['hoten'],$_POST['diachi'],$_POST['sdt']);
	$sucess="Đặt hàng thành công";
 }
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
	<form  method="POST" class="d-flex justify-content-center" >
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
		<button type="submit" name="post" class="btn btn-primary mb-2">Mua Ngay</button>
	</form>
</div>
<?php include 'footer.php'; ?>
<!--
		<tr>
		  <th scope="row">1</th>
		  <td>Mark</td>
		  <td>Otto</td>
		  <td>@mdo</td>
		</tr>
		<tr>
		  <th scope="row">2</th>
		  <td>Jacob</td>
		  <td>Thornton</td>
		  <td>@fat</td>
		</tr>
		<tr>
		  <th scope="row">3</th>
		  <td>
			<button type="button" class="btn btn-outline-primary">
				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
				</svg>
			</button>
			<button type="button" class="btn btn-outline-primary">
				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"></path>
				</svg>
			</button>
			<button type="button" class="btn btn-outline-primary">
				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"></path>
				</svg>
			</button>
		  </td>
		  <td>the Bird</td>
		  <td>@twitter</td>
		</tr>
		-->