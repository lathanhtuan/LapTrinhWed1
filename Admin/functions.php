<?php
function findUserByEmail ($email)
{	global $db;
	$stmt = $db->prepare("SELECT * FROM user WHERE email=? ");
	$stmt->execute(array($email));
	$users = $stmt->fetch(PDO::FETCH_ASSOC);
	return $users;
}
//tìm user theo ID
function findUserById ($id)
{	global $db;
	$stmt = $db->prepare("SELECT * FROM user WHERE id=? ");
	$stmt->execute(array($id));
	$users = $stmt->fetch(PDO::FETCH_ASSOC);
	return $users;
}
//lấy user hiện tại
function getCurrentUser()
{
	if( isset($_SESSION['userId']))
	{
		return findUserById($_SESSION['userId']);
	}
	return null;
}
//Danh sách tài khoản
function DSTaiKhoan()
{
	global $db;
	$count =1;
	$stmt = $db->prepare('SELECT tk.MaTaiKhoan as mataikhoan, tk.TenDangNhap as tendangnhap, tk.MatKhau as matkhau, tk.TenHienThi as tenhienthi, tk.DiaChi as diachi, tk.DienThoai as sdt, tk.Email as email, ltk.TenLoaiTaiKhoan as loaitaikhoan FROM TaiKhoan tk, LoaiTaiKhoan ltk WHERE ltk.MaLoaiTaiKhoan = tk.MaLoaiTaiKhoan');
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute();
	$resultSet = $stmt->fetchAll();
	foreach ($resultSet as $row) 
	{
	echo '
	<tr>
	<th scope="row">' .$count .'</th>
	<td>' .$row["mataikhoan"].'</td>
	<td>' .$row["tendangnhap"].'</td>
    <td>' .$row["matkhau"].'</td>
    <td>' .$row["tenhienthi"].'</td>
    <td>' .$row["diachi"].'</td>
    <td>' .$row["sdt"].'</td>
    <td>' .$row["email"].'</td>
    <td>' .$row["loaitaikhoan"].'</td>
			  <td>
			<a href="index.php?c=1&a=1&id='.$row["mataikhoan"].'" class="btn btn-outline-primary" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
            </svg>
			</a>
			<a href="index.php?c=1&a=2&id='.$row["mataikhoan"].'" class="btn btn-outline-primary" role="button">
				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"></path>
				</svg>
			</a>
		  </td>
	</tr>
	';
	$count +=1;
	}
}
function ThongTinTaiKhoan($userid)
{
	global $db;
	$stmt = $db->prepare('SELECT tk.MaTaiKhoan as mataikhoan, tk.TenDangNhap as tendangnhap, tk.MatKhau as matkhau, tk.TenHienThi as tenhienthi, tk.DiaChi as diachi, tk.DienThoai as sdt, tk.Email as email, ltk.TenLoaiTaiKhoan as loaitaikhoan FROM TaiKhoan tk, LoaiTaiKhoan ltk WHERE tk.MaTaiKhoan=? and ltk.MaLoaiTaiKhoan = tk.MaLoaiTaiKhoan');
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute(array($userid));
	$resultSet = $stmt->fetchAll();
	foreach ($resultSet as $row) 
	{
	echo '
	<!-- dòng input Mã tài khoản -->
					<div class ="row">
						<div class="form-group mb-2 w-100" id ="input">
							<div class="col-3">
								<label class="font-weight-bold">
									<p class="text-right w-100 mb-0">Mã tài khoản :</p>   
								</label>
							</div >
							<div class="col">
								<input type="text" readonly class="form-control m-1" name="txtMaTaiKhoan" id="txtMaTaiKhoan" title="Mã tài khoản" value="' .$row["mataikhoan"].'" >
								
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
								<input type="text" class="form-control m-1 w-75" name="txtTenDangNhap" id="txtTenDangNhap" title="Tên đăng nhập vào tài khoản" value="' .$row["tendangnhap"].'" >
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
								<input type="text" class="form-control m-1 w-75" name="txtMatKhau" id="txtMatKhau" title="Mật khẩu tài khoản" value="' .$row["matkhau"].'" >
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
								<input type="text" class="form-control m-1 w-75" name="txtTenHienThi" id="txtTenHienThi" title="Tên hiển thị với người khác" value="' .$row["tenhienthi"].'" >
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
								<input type="text" class="form-control m-1 w-100" name="txtDiaChi" id="txtDiaChi" title="Vui lòng nhập địa chỉ chính xác" value="' .$row["diachi"].'" >
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
								<input type="text" class="form-control m-1" name="txtSdt" id="txtSdt" title="Số điện thoại di động cá nhân" value="' .$row["sdt"].'" >
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
								<input type="text" class="form-control m-1" name="txtEmail" id="txtEmail" title="Địa chỉ email cá nhân" value="' .$row["email"].'" >
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
									<select class="custom-select  m-1" name="cbbLoaiTaiKhoan" id="cbbLoaiTaiKhoan">
										<option value="" disabled selected>Choose option</option>
										<option value="User">User</option>
										<option value="Admin">Admin</option>
									</select>
								</div>
							</div>
					</div>
	';
	}
}
function CapNhatTaiKhoan ($userid, $tendangnhap, $matkhau, $tenhienthi, $diachi, $sdt, $email, $maloaitaikhoan)
{	global $db;
	$loai=0;
	if($maloaitaikhoan == "User")
		$loai =1;
	else
		$loai =2;
	$stmt = $db->prepare("UPDATE taikhoan set TenDangNhap=?,MatKhau=?, TenHienThi = ?, DiaChi =?, DienThoai =?, Email =?, MaLoaiTaiKhoan =? WHERE MaTaiKhoan=?");
	$stmt->execute(array( $tendangnhap, $matkhau, $tenhienthi, $diachi, $sdt, $email, $loai, $userid));
}

function ThemTaiKhoan ( $tendangnhap, $matkhau, $tenhienthi, $diachi, $sdt, $email, $maloaitaikhoan)
{	global $db;
	$loai=0;
	if($maloaitaikhoan == "User")
		$loai =1;
	else
		$loai =2;
	$stmt = $db->prepare("INSERT into taikhoan(TenDangNhap,MatKhau,TenHienThi,DiaChi,DienThoai,Email,BiXoa,MaLoaiTaiKhoan) value( ?,?, ?, ?, ?, ?,0, ?)");
	$stmt->execute(array( $tendangnhap, $matkhau, $tenhienthi, $diachi, $sdt, $email, $loai));
}

function XoaTaiKhoan ( $userid)
{	global $db;
	$stmt = $db->prepare("DELETE from taikhoan where MaTaiKhoan=?");
	$stmt->execute(array($userid ));
}
?>