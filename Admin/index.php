<?php
require_once 'init.php';
//demo user
$_SESSION['userId'] = 1;
$currentUser = 1;
	$title = "Hệ thống quản lý";
		$c =0;
		if(isset($_GET["c"]))
			$c=$_GET["c"];
	if(isset($_GET["a"]))
	{
		if($c == 1 && $_GET["a"] == 2 )
		{
			if(isset($_GET["id"]))
				{
					XoaTaiKhoan($_GET["id"]);
					$succes ="Xoá thành công!!";
					
				}
			else
				{
					$error ="Xoá thành công!!";
				}
		}
		else
		{
			if(isset($_POST['submitpost']))
			{
				if(!empty($_POST['cbbLoaiTaiKhoan'])) 
				{
					$selected = $_POST['cbbLoaiTaiKhoan'];
					CapNhatTaiKhoan($_POST['txtMaTaiKhoan'], $_POST['txtTenDangNhap'], $_POST['txtMatKhau'], $_POST['txtTenHienThi'], $_POST['txtDiaChi'], $_POST['txtSdt'], $_POST['txtEmail'], $selected);
					echo '<div class ="alert alert-success" role="alert">
								Cập Nhật thành công!!!
							</div>';
					header("Refresh:0");exit();
				}
				else
					echo '<div class="alert alert-danger" role="alert">
								Vui lòng chọn Loại tài khoản!!
							</div>';
			}
			else if(isset($_POST['submitpost1']))
			{
				if(!empty($_POST['cbbLoaiTaiKhoan1'])) 
				{
					$selected = $_POST['cbbLoaiTaiKhoan1'];
					ThemTaiKhoan($_POST['txtTenDangNhap'], $_POST['txtMatKhau'], $_POST['txtTenHienThi'], $_POST['txtDiaChi'], $_POST['txtSdt'], $_POST['txtEmail'], $selected);
					echo '<div class ="alert alert-success" role="alert">
								Cập Nhật thành công!!!
							</div>';
					header("Refresh:0");exit();
				}
				else
					echo '<div class="alert alert-danger" role="alert">
								Vui lòng chọn Loại tài khoản!!
							</div>';
			}
		}
	}
?>
	<?php include "header.php" ?>
	<div id="content">
		<?php
			switch($c){
			case 0:
				include "pages/pIndex.php";
				break;
			case 1:
				include "pages/qlTaiKhoan/pIndex.php";
				break;
			case 2:
				include "pages/qlSanPham/pIndex.php";
				break;
			case 3:
				include "pages/qlDonDatHang/pIndex.php";
				break;
			default:
				include "pages/pError.php";
				break;
			}
		?>
	</div>
	<?php include "footer.php"; ?>
