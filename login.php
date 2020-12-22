<?php
    require_once 'init.php';

    $title = 'Đăng nhập';

    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = findUserByemail($email);

        if(!$user){
            $error = 'Không tìm thấy tài khoản!';
        } else {
            if(!password_verify($password,$user['password'])){
                
                $error = 'Password incorrect';
            } else {
                $_SESSION['userId'] = $user['id'];
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
<div class="form-group col-sm-6">
        <label  for="email">Email</label>
        
        <input type="text" name="email" id="email" class="form-control" placeholder="Enter email" required>
    </div>
    <div class="form-group col-sm-6">
        <label for="password">PassWord</label>
        <input type="password" name="password" id="password" class="form-control " placeholder="Enter password" required>
    </div>
    <div class="checkbox">

    <label>

        <input type="checkbox"> Nhớ tài khoản

    </label>

</div>
    <button button type="submit" class="btn btn-success btn-lg pull-right ">Đăng nhập</button>
</form>
<?php endif; ?>
<?php include 'footer.php'; ?>