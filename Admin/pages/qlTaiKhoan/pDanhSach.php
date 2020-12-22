<table class="table" id="mytable">
	  <thead class="thead-light">
		<tr>
		<th scope="col">STT</th>
		  <th scope="col">Mã tài khoản</th>
		  <th scope="col">Tên đăng nhập</th>
		  <th scope="col">Mật khẩu</th>
		  <th scope="col">Tên hiển thị</th>
		  <th scope="col">Địa chỉ</th>
		  <th scope="col">SDT</th>
		  <th scope="col">Email</th>
		  <th scope="col">Loại tài khoản</th>
		  <th scope="col">Thao tác</th>
		</tr>
	  </thead>
	  <tbody>
		<!--Liệt Kê tài khoản (Test)-->
		<?php DSTaiKhoan(); ?>
	  </tbody>
</table>
<div class="container1 m-3">
	<div class="row justify-content-center">
		<a href="index.php?c=1&a=3" class="btn btn-warning" role="button">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"></path>
			</svg>
			Thêm tài khoản
		</a>
	</div>
</div>