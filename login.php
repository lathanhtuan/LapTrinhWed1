<?php
    require_once 'init.php';

    $title = 'Đăng nhập';

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = findUserByUsername($username);

        if(!$user){
            $error = 'Không tìm thấy tài khoản';
        } else {
            if($password!=$user['MatKhau']){
                
                $error = 'Mật khẩu sai';
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
        <label for="username">Tên</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <button button type="submit" class="btn btn-primary">Đăng nhập</button>


</form>
<?php endif; ?>
<?php include 'footer.php'; ?>