
<?php
require_once 'init.php';

$title = 'Đổi mật khẩu';

    
    
if(!isset($_SESSION["userID"])){
    $user = findUserByemail($_POST['email']);
    if(!$user){
        $error = 'Không tìm thấy người dùng';
    }
    else{
        $_SESSION['userID'] = $_POST['email'];
    }
}


if (isset($_POST['password']) && isset($_POST['confirmpassword'])) {
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $exists = findUserByemail($_SESSION["userID"]);
    if ($exists) {
        if ($password != $confirmpassword) {
            echo '<div class="alert alert-danger" role="alert">' . 'Password incorrect' . '</div>';
        } else {
            echo '<div class="alert alert-success" role="alert">' . 'Success' . '</div>';
            ChangeUserPassword($_SESSION["userID"], password_hash($password, PASSWORD_DEFAULT));
            unset($_SESSION['userID']);
        }
    }
}
?>

<?php include 'header.php'; ?>

<?php if (isset($error)): ?>
<div class="alert alert-danger" role="alert">
    <?php echo 'Not found user: '. $_POST['email']; ?>
</div>
<?php else: ?>
    <div class="content">
    <?php if (isset($_POST['email'])){ ?>
        <div class="alert alert-success" role="alert">
            Hello <?php echo $_POST['email'];  ?> Mời bạn đổi mật khẩu!
        </div>
        <form action="changePassword.php" method="POST">
        <div class="form-group col-sm-6">
            <label for="password">Mật khẩu mới</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter email"  required>
        </div>
        <div class="form-group col-sm-6">
            <label for="confirmpassword">Nhập lại mật khẩu</label>
            <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Enter new email"  required>
        </div>
        <button button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
    </form>
    <?php } ?>
    </div>
<?php endif; ?>

<?php include 'footer.php'; ?>
    