		
<?php
require_once 'init.php';
$title = 'Cá Nhân';
// if(isset($_POST['TenHienThi'])){
//     $name = $_POST['TenHienThi'];
//     echo $name;
// }
requireLoggedIn();
// global $db;
// $sql = "SELECT TenHienThi FROM taikhoan";
// $result = mysqli_query($db, $sql);

// if (mysqli_num_rows($result) > 0) {
//   // output data of each row
//   while($row = mysqli_fetch_assoc($result)) {
//     echo  " - Name: " . $row["TenHienThi"].  "<br>";
//   }
// } else {
//   echo "0 results";
// }

// mysqli_close($db);
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
    <label for="avatar">Ảnh đại diện</label>
    <input type="file" class="form-control-file" id="avatar" name="avatar" >
    </div>                                    
		<button type="submit" class="btn btn-success">Cập nhật</button>     
 	</form>
    
    </div>
<?php endif; ?>
<?php include 'footer.php'; ?>

