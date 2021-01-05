<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Kích hoạt tài khoản
function activateUser ($id){
	global $db;
	$stmt = $db->prepare("UPDATE user SET code=NULL WHERE id=?");
	$stmt->execute(array($id));
}

//reset password
function resetPassword ($id, $password)
{
	global $db;
	$hashPassword = password_hash($password, PASSWORD_DEFAULT);
	$stmt = $db->prepare("UPDATE user SET resetcode=NULL, password=? WHERE id=?");
	$stmt->execute(array($hashPassword, $id));
}

//Tạo reset code cho tài khoản
function resetCode ($id , $code){
	global $db;
	$stmt = $db->prepare("UPDATE user SET resetcode=? WHERE id=?");
	$stmt->execute(array($code, $id));
}

//tìm user theo email
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
//đăng ký
function Registrer ( $email, $password, $hoten, $sdt, $code){
	global $db;
	$hashPassword = password_hash($password, PASSWORD_DEFAULT);
	$stmt = $db->prepare("INSERT INTO user(email, password, hoten, sdt, code) VALUES(?, ?, ?, ?,?)");
	$stmt->execute(array($email, $hashPassword, $hoten, $sdt, $code));
	// Lấy ID mới nhất
	$user =findUserById($db->lastInsertId());
	return $user;
}
//thay đổi password
function PasswordChange ($password, $id){
	global $db;
	$hashPassword = password_hash($password, PASSWORD_DEFAULT);
	$stmt = $db->prepare("UPDATE user SET password=? WHERE id=?");
	$stmt->execute(array($hashPassword, $id));
}
//chỉnh lại kích thước của ảnh
function resizeImage($filename, $max_width, $max_height)
{
  list($orig_width, $orig_height) = getimagesize($filename);

  $width = $orig_width;
  $height = $orig_height;
  # taller
  if ($height > $max_height) 
  {
      $width = ($max_height / $height) * $width;
      $height = $max_height;
  }

  # wider
  if ($width > $max_width) 
  {
      $height = ($max_width / $width) * $height;
      $width = $max_width;
  }

  $image_p = imagecreatetruecolor($width, $height);

  $image = imagecreatefromjpeg($filename);
  
  imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);

  return $image_p;
}
//yêu cầu đăng nhập trước
function requireLoggedIn()
{
	global $currentUser;
	if(!$currentUser)
	{
	  header('Location: login.php');
  }
}

//lập danh sách newfeed
function listNewfeed()
{
	global $db;
	$stmt = $db->prepare('SELECT u.hoten as hoten, nf.content as content, nf.date as thoigian, nf.imageurl as imageurl FROM user u, newfeed nf WHERE u.id = nf.userid');
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute();
	$resultSet = $stmt->fetchAll();
	foreach ($resultSet as $row) 
	{
	echo '	
	<div class="card" style="width: 28rem;">
		<div class="card-body">
    		<h5 class="card-title">'. $row["hoten"] .'</h5>
    		<h6 class="card-subtitle mb-2 text-muted">'. $row["thoigian"].'</h6>
			<p class="card-text">'. $row["content"].'</p>
			<img src="' . $row["imageurl"].'">
  		</div>
	</div>
	<br />
	';
	}
}

//Tạo newfeed
function createNewfeed($userid, $content, $image)
{
	global $db;
	if($image == NULL)
	{
		$stmt = $db->prepare("INSERT INTO newfeed(userid, content) VALUES(?, ?)");
		$stmt->execute(array($userid, $content));
	}
	else
	{
		
		$stmt = $db->prepare("INSERT INTO newfeed(userid, content, imageurl) VALUES(?, ?, ?)");
		$stmt->execute(array($userid, $content, $image));
	}
	// Lấy ID mới nhất
	//$user =findUserById($db->lastInsertId());
}

//gửi email
function sendEmail($to,$subjects, $content)
{

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'hacaoluoc1@gmail.com';                     // SMTP username
    $mail->Password   = 'chitrang123';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    $mail->CharSet = 'UTF-8';
    //Recipients
    $mail->setFrom('hacaoluoc1@gmail.com', 'LTWin 18L1');
    $mail->addAddress($to);     // Add a recipient
    

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subjects;
    $mail->Body    = $content;

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

//update profile image
function updateImage($id, $image)
{
	
	global $db;
	$stmt = $db->prepare("UPDATE user SET imageurl=? WHERE id=?");
	$stmt->execute(array($image, $id));
	
}


//--------------------------------------------------------------------------------------------------------------------------------------

//lập danh sách giỏ hàng
function DSGioHang( $userid)
{
	global $db;
	$count =1;
	$stmt = $db->prepare('SELECT sp.TenSanPham as tensp, sp.GiaSanPham as gia, gh.SoLuong as soluong, gh.MaSanPham as masp FROM sanpham sp, giohang gh WHERE gh.MaNguoiDung = ? and sp.MaSanPham = gh.MaSanPham');
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute(array($userid));
	$resultSet = $stmt->fetchAll();
	foreach ($resultSet as $row) 
	{
	echo '
	<tr>
	<th scope="row">' .$count .'</th>
	<td>' .$row["tensp"].'</td>
	<td>*Hinh url*</td>
	<td>' .$row["gia"].'</td>
	<td>' .$row["soluong"].'</td>
			  <td>
			<a href="xlCapNhatGioHang.php?c=1&id='.$row["masp"].'" class="btn btn-outline-primary" role="button">
				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
				</svg>
			</a>
			<a href="xlCapNhatGioHang.php?c=2&id='.$row["masp"].'" class="btn btn-outline-primary" role="button">
				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"></path>
				</svg>
			</a>
			<a href="xlCapNhatGioHang.php?c=3&id='.$row["masp"].'" class="btn btn-outline-primary" role="button">
				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"></path>
				</svg>
			</a>
		  </td>
	</tr>
	';
	$count +=1;
	};
	
}
//Tính tổng tiền trong giỏ hàng
function TongTien( $userid)
{
	global $db;
	$tien =0;
	$stmt = $db->prepare('SELECT sp.TenSanPham as tensp,sp.GiaSanPham as gia, gh.SoLuong as soluong FROM sanpham sp, giohang gh WHERE gh.MaNguoiDung = ? and sp.MaSanPham = gh.MaSanPham');
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute(array($userid));
	$resultSet = $stmt->fetchAll();
	foreach ($resultSet as $row) 
	{
		$tien += $row["gia"] * $row["soluong"];
	}
	echo ''.$tien.'';
	
}
//Them so luong san pham trong gio hang
function ThemSoLuong($userid, $id)
{
	global $db;
	$stmt = $db->prepare("UPDATE giohang SET SoLuong=SoLuong+1 WHERE MaNguoiDung=? and MaSanPham=?");
	$stmt->execute(array($userid,$id));

}
//Tru so luong san pham trong gio hang
function TruSoLuong($userid, $id)
{
	global $db;
	$stmt = $db->prepare("UPDATE giohang SET SoLuong=SoLuong-1 WHERE MaNguoiDung=? and MaSanPham=?");
	$stmt->execute(array($userid,$id));
	//soluong =0 thi xoa san pham trong gio hang
	$stmt = $db->prepare('SELECT gh.SoLuong as soluong from giohang gh where MaNguoiDung=? and MaSanPham=?');
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute(array($userid,$id));
	$resultSet = $stmt->fetchAll();
	foreach ($resultSet as $row) 
	{
		if($row["soluong"]==0)
		{
			$stmt = $db->prepare("DELETE from giohang WHERE MaNguoiDung=? and MaSanPham=?");
			$stmt->execute(array($userid,$id));
		}
		
	}

}
//Xoa san pham trong gio hang
function XoaSoLuong($userid, $id)
{
	global $db;
	$stmt = $db->prepare("DELETE from giohang WHERE MaNguoiDung=? and MaSanPham=?");
	$stmt->execute(array($userid,$id));
}
//button dat hang
function DatHang($userid, $ten, $diachi, $sdt)
{
	global $db;
	//Tong tien
	$tien =0;
	$stmt = $db->prepare('SELECT sp.TenSanPham as tensp,sp.GiaSanPham as gia, gh.SoLuong as soluong FROM sanpham sp, giohang gh WHERE gh.MaNguoiDung = ? and sp.MaSanPham = gh.MaSanPham');
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute(array($userid));
	$resultSet = $stmt->fetchAll();
	foreach ($resultSet as $row) 
	{
		$tien += $row["gia"] * $row["soluong"];
	}
	//them Don Dat hang
	$stmt = $db->prepare("INSERT into dondathang(NgayLap,TongThanhTien,MaTaiKhoan,MaTinhTrang,TenKhachHang,DiaChiGiaoHang,DienThoai) values( CURRENT_TIMESTAMP(),?,?,1,?,?,?)");
	$stmt->execute(array($tien,$userid,$ten,$diachi,$sdt));
	//insert san pham vao don dat hang
	$stmt = $db->prepare('SELECT MaDonDatHang as madondat from dondathang where MaTaiKhoan = ? GROUP BY MaDonDatHang ORDER BY MaDonDatHang DESC LIMIT 1');
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute(array($userid));
	$resultSet = $stmt->fetchAll();
	foreach ($resultSet as $row) 
	{
		$stmt = $db->prepare('SELECT gh.MaSanPham as masp , gh.SoLuong as soluong FROM  giohang gh WHERE gh.MaNguoiDung = ?');
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute(array($userid));
		$resultSet1 = $stmt->fetchAll();
		foreach ($resultSet1 as $row1) 
		{
			$stmt = $db->prepare("INSERT into dondathang_sanpham(MaDonDatHang,MaSanPham,SoLuong) values(?,?,?)");
			$stmt->execute(array($row["madondat"],$row1["masp"],$row1["soluong"]));
		}
	}

	//Xoa san pham trong gio hang
	$stmt = $db->prepare("DELETE from giohang WHERE MaNguoiDung=?");
	$stmt->execute(array($userid));

}
function DSDonHang($userid)
{
	global $db;
	$count =1;
	$stmt = $db->prepare('SELECT dh.MaDonDatHang as madon, dh.TongThanhTien as tongtien, tt.TenTinhTrang as tinhtrang, dh.NgayLap as ngaylap FROM tinhtrang tt, dondathang dh WHERE dh.MaTaiKhoan = ? and dh.MaTinhTrang = tt.MaTinhTrang');
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute(array($userid));
	$resultSet = $stmt->fetchAll();
	foreach ($resultSet as $row) 
	{
	echo '
	<tr>
	<th scope="row">' .$count .'</th>
	<td>' .$row["madon"].'</td>
	<td>' .$row["ngaylap"].'</td>
	<td>' .$row["tongtien"].'</td>
	<td>' .$row["tinhtrang"].'</td>
			  <td>
			  <a href="pDonHang.php?id='.$row["madon"].'" class="btn btn-outline-primary" role="button">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-square-fill" viewBox="0 0 16 16">
					<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
		  		</svg>
			</a>
		  </td>
	</tr>
	';
	$count +=1;
	};
	
}

function ChiTietDonHang($id)
{
	global $db;
	$stmt = $db->prepare('SELECT dh.MaDonDatHang as madon, dh.SoLuong as soluong, sp.GiaSanPham as gia, sp.TenSanPham as tensp from dondathang_sanpham dh, sanpham sp where dh.MaDonDatHang = ? and sp.MaSanPham = dh.MaSanPham ');
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute(array($id));
	$resultSet = $stmt->fetchAll();
	foreach ($resultSet as $row) 
	{
	echo '
	<tr>
	<td>' .$row["madon"].'</td>
	<td>' .$row["tensp"].'</td>
	<td>*Hình*</td>
	<td>' .$row["gia"].'</td>
	<td>' .$row["soluong"].'</td>
	</tr>
	';
	};
}

?> 