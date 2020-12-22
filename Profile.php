<?php
require_once 'init.php';
$title = 'Cá Nhân';
requireLoggedIn();

if (isset($_FILES['avatar'])) {
	$file = $_FILES['avatar'];
    $newImage = resizeImage($file['tmp_name'], 250, 250);
    imagejpeg($newImage, './avatars/' . $currentUser['id'] .'.jpg');
} 
?>
<?php include 'header.php'; ?>

<?php if (isset($error)) : ?>
	<div class="alert alert-danger" role="alert">
		<?php echo $error; ?>
	</div>
<?php else : ?>
    <img src="./avatars/<?php echo $currentUser['id']; ?>.jpg">
	<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
    <label for="avatar">Ảnh đại diện</label>
    <input type="file" class="form-control-file" id="avatar" name="avatar" >
  </div>
		<button type="submit" class="btn btn-success">Cập nhật</button>
	</form>
<?php endif; ?>
<?php include 'footer.php'; ?>