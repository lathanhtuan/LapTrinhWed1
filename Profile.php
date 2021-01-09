		
<?php
require_once 'init.php';
$title = 'Cá Nhân';
requireLoggedIn();

if (isset($_FILES['avatar'])) {
	$file = $_FILES['avatar'];
    $newImage = resizeImage($file['tmp_name'], 250, 250);
    imagejpeg($newImage, './avatar/' . $currentUser['MaTaiKhoan'] .'.jpg');
} 
?>
<?php include 'header.php'; ?>

<?php if (isset($error)) : ?>
	<div class="alert alert-danger" role="alert">
		<?php echo $error; ?>
	</div>
<?php else : ?>
    <img src="./avatar/<?php echo $currentUser['MaTaiKhoan']; ?>.jpg">
	<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
    <label for="avatar"><h5 class="text-warning">Ảnh đại diện</h5></label>
   
    <input type="file" class="form-control-file" id="avatar" name="avatar" >
    </div>                                    
		<button type="submit" class="btn btn-success">Cập nhật</button>     
 	</form>
   <?php 
    $tk=$currentUser['MaTaiKhoan'];

 global $db;
 $sql =$db->query("SELECT TenHienThi, DiaChi, DienThoai,
 Email FROM taikhoan WHERE MaTaiKhoan=$tk");  

// echo "Query Executed"; 
  // loop will iterate until all data is fetched 
  while ( $da=$sql->fetch(PDO::FETCH_ASSOC)) 
  { 
   
      
      echo '               '.'<br>';
      echo  '<h4 class="text-dark">'. $da['TenHienThi'].'</h4>'.'<br>';
      echo '<h6 class="text-dark">'. 'Nơi sống:      '.$da['DiaChi'].'</h6>'.' '.'<br>';
      
      echo '<h6 class="text-dark">'.'Thông tin liên hệ: '.'</h6>'.'<br>';
      echo '<h6 class="text-dark">'.'Điện thoại:'.$da['DienThoai'].'</h6>'.' '.'<br>';
      echo '<h6 class="text-dark">'.'Email:'.$da['Email'].'</h6>'.' '.'<br>';
      
     
  } 
?>
<div>
<a class="nav-link bg-warning text-white font-weight-bold lead" href="changeProfile.php">Thay đổi thông tin cá nhân</a>

</div>
         
     </div>
<?php endif; ?>
<?php include 'footer.php'; ?>

