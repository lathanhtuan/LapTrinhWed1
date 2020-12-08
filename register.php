<?php
    require_once 'init.php';

    $title = 'Đăng ký';

    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = findUserByemail($email);

        if($user){
            $error = 'Tài khoản đã tồn tại';
        } else {
                $user= createUser($email,password_hash($password,PASSWORD_DEFAULT));
                $_SESSION['userId'] = $user['id'];
                header('Location:index.php');
                exit();
            
        }
    }

    
?>

<?php include 'header.php'; ?>


<?php if (isset($error)): ?>
<div class="alert alert-danger" role="alert">
    <?php echo $error; ?>
</div>
<?php else: ?>
     
<form method="POST">
    <div class="form-group col-sm-6">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="Enter email" required>
    </div>
    <div class="form-group col-sm-6">
        <label for="password">PassWord</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
    </div>
    <button button type="submit" class="btn btn-success btn-lg pull-right ">Đăng Kí</button>
</form>
<?php endif; ?>
<?php include 'footer.php'; ?>