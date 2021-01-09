<?php
    require_once 'init.php';

    $title = 'Xác thực Email';

    if(isset($_POST['maxacnhan'])){
        $mxn = $_POST['maxacnhan'];
        

        //$user = findUserByUsername($username);

        if(!$mxn){
            $error = 'Mã không hợp lệ';
        } else {                         
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
<form action="login.php" method="POST">
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