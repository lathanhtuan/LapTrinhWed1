<?php
    require_once 'init.php';

    $title = 'Đăng nhập';

    if(isset($_POST['TenDangNhap']) && isset($_POST['MatKhau'])){
        
        $username = $_POST['TenDangNhap'];
        $password = $_POST['MatKhau'];   
        $user = findUserByUsername($username);
                
        if(!$user){
            $error = 'Không tìm thấy tài khoản!';
        } else {
            if(password_verify($password,$user['MatKhau'])){
                
                $error = 'Mật khẩu không đúng';
            } else {
                $_SESSION['userId'] = $user['MaTaiKhoan'];
                header('Location:index.php');
                exit();
            }
        }
    }

    
?>

<?php include 'header.php'; ?>


<?php if (isset($error)): ?>
<div class="alert alert-danger" role="alert">
    <?php echo $error; ?>
</div>
<?php else: ?>
<form action="login.php" method="POST">
<div class="form-group">
        <label  for="TenDangNhap">Tên đăng nhập</label>       
        <input type="text" name="TenDangNhap" id="TenDangNhap" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="MatKhau">Mật khẩu</label>
        <input type="password" name="MatKhau" id="MatKhau" class="form-control" required>
    </div>
    <!-- <div class="checkbox">

    <label>

        <input type="checkbox"> Nhớ tài khoản

    </label> -->

</div>
<button button type="submit" class="btn btn-primary">Đăng nhập</button>
</form>
<?php endif; ?>
<?php include 'footer.php'; ?>