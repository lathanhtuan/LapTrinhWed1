<?php
    require_once 'init.php';

    $title = 'Xác thực Email';
    global $c;
    if(isset($_POST['maxacnhan'])&&isset($_POST['maxacnhan'])){
        $username = $_POST['username'];
        $mxn = $_POST['maxacnhan'];   
      
        $user = findUserByUsername($username);
    if(!$user){
        $error = 'Không tìm thấy tên đăng nhập!';
        header('Location:maxacnhan.php');
    } else {
         
        
        if($mxn!=$user['MaXacNhan']){
            
            echo '<div class="alert alert-success" role="alert">' . 'Mã xác nhận không hợp lệ!Vui long nhập lại' . '</div>';
        } else {
             
            
            header('Location:login.php');
            exit();
        }
    }
}
?>

<?php include 'header.php'; ?>


<?php if (isset($error)): ?>
<div class="alert alert-danger" role="alert">
    <?php echo $error;?> 
  
</div>
<?php else: ?>
<form action="maxacnhan.php" method="POST">
<div class="form-group">
        <label for="username">Nhập lại tên đăng nhập</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="maxacnhan">Mã xác nhận</label>
        <input type="text" name="maxacnhan" id="maxacnhan" class="form-control" required>
    </div>
    <!-- <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div> -->
    <button button type="submit" class="btn btn-primary">Xác nhận</button>


</form>
<?php endif; ?>
<?php include 'footer.php'; ?>