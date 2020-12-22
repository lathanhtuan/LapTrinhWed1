<div class="container-fluid">
	<div class = "row">
		<div class ="col">
			<div  class="p-3 mb-2 bg-secondary text-white">
				<h3 class="text-center">.:THÊM TÀI KHOẢN:.</h3>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col"></div>
		<div class="col-10">
			<form class="form-inline" method="POST" id="myform">
				<div class ="container">
						<!-- dòng input Mã tài khoản -->
                        <div class ="row">
						<div class="form-group mb-2 w-100" id ="input">
							<div class="col-3">
								<label class="font-weight-bold">
									<p class="text-right w-100 mb-0">Mã tài khoản :</p>   
								</label>
							</div >
							<div class="col">
								<input type="text" readonly class="form-control m-1" name="txtMaTaiKhoan" id="txtMaTaiKhoan" title="Mã tài khoản" value="" >
								
							</div>
						</div>
					</div>
					<!-- dòng input tên đăng nhập user -->
					<div class="row">
						<div class="form-group mb-2 w-100" id ="input">
							<div class="col-3">
								<label class="font-weight-bold">
									<p class="text-right w-100 mb-0">Tên đăng nhập :</p>   
								</label>
							</div>
							<div class="col-8">
								<input type="text" class="form-control m-1 w-75" name="txtTenDangNhap" id="txtTenDangNhap" title="Tên đăng nhập vào tài khoản" value="" >
							</div>
						</div>
					</div>
					<!-- dòng input mật khẩu user -->
					<div class="row">
						<div class="form-group mb-2 w-100" id ="input">
							<div class="col-3">
								<label class="font-weight-bold">
									<p class="text-right w-100 mb-0">Mât khẩu :</p>   
								</label>
							</div>
							<div class="col-8">
								<input type="text" class="form-control m-1 w-75" name="txtMatKhau" id="txtMatKhau" title="Mật khẩu tài khoản" value="" >
							</div>
						</div>
					</div>
					<!-- dòng input tên hiển thị user -->
					<div class="row">
						<div class="form-group mb-2 w-100" id ="input">
							<div class="col-3">
								<label class="font-weight-bold">
									<p class="text-right w-100 mb-0">Tên hiển thị :</p>   
								</label>
							</div>
							<div class="col-8">
								<input type="text" class="form-control m-1 w-75" name="txtTenHienThi" id="txtTenHienThi" title="Tên hiển thị với người khác" value="" >
							</div>
						</div>
					</div>
					<!-- dòng input Địa chỉ user -->
					<div class="row">
						<div class="form-group mb-2 w-100" id ="input">
							<div class="col-3">
								<label class="font-weight-bold">
									<p class="text-right w-100 mb-0">Địa chỉ :</p>   
								</label>
							</div>
							<div class="col-8">
								<input type="text" class="form-control m-1 w-100" name="txtDiaChi" id="txtDiaChi" title="Vui lòng nhập địa chỉ chính xác" value="" >
							</div>
						</div>
					</div>
					<!-- dòng input sdt user -->
					<div class="row">
						<div class="form-group mb-2 w-100" id ="input">
							<div class="col-3">
								<label class="font-weight-bold">
									<p class="text-right w-100 mb-0">Điện thoại :</p>   
								</label>
							</div>
							<div class="col-8">
								<input type="text" class="form-control m-1" name="txtSdt" id="txtSdt" title="Số điện thoại di động cá nhân" value="" >
							</div>
						</div>
					</div>
					<!-- dòng input email cas nhan -->
					<div class="row">
						<div class="form-group mb-2 w-100">
							<div class="col-3">
								<label class="font-weight-bold">
									<p class="text-right w-100 mb-0">Email :</p>   
								</label>
							</div>
							<div class="col-8">
								<input type="text" class="form-control m-1" name="txtEmail" id="txtEmail" title="Địa chỉ email cá nhân" value="" >
							</div>
						</div>
					</div>
					<!-- dòng input loại tài khoản user -->
					<div class="row">
							<div class="form-inline mb-2 w-100" id ="input">
								<div class="col-3">
									<label class="font-weight-bold">
										<p class="text-right w-100 mb-0">Loại tài khoản :</p>   
									</label>
								</div>
								<!-- dòng input tháng -->
								<div class="col-auto">
									<select class="custom-select  m-1" name="cbbLoaiTaiKhoan1" id="cbbLoaiTaiKhoan1">
										<option value="" disabled selected>Choose option</option>
										<option value="User">User</option>
										<option value="Admin">Admin</option>
									</select>
								</div>
							</div>
					</div>
					<div class="row justify-content-center w-50">
						<button type="submit" class="btn btn-primary mb-2" name="submitpost1">Thêm mới</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>