
<?php
require_once 'init.php';

$title = 'Đổi mật khẩu';

    
    
if(!isset($_SESSION["userID"])){
    $user = findUserByUsername($_POST['username']);
    if(!$user){
        $error = 'Không tìm thấy tài khoản';
    }
    else{
        $_SESSION['userID'] = $_POST['username'];
    }
}


if (isset($_POST['password']) && isset($_POST['confirmpassword'])) {
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $exists = findUserByUsername($_SESSION["userID"]);
    $email=$exists['Email'];
    
    if ($exists) {
        if ($password != $confirmpassword) {
            echo '<div class="alert alert-danger" role="alert">' . 'Nhập lại mật khẩu mới chưa đúng' . '</div>';
             
        } else {
            echo '<div class="alert alert-success" role="alert">' . 'Đổi mật khẩu thành công!' . '</div>';
            $newcode=strtoupper(bin2hex(random_bytes(4)));
            sendEmail($email,'huan doanweb','Mã xác nhận: '.$newcode);//gửi mã xác nhận thay đổi pass
            ChangeCode($_SESSION["userID"],$newcode);//cập nhập lại mã xác nhận để đổi pass
            ChangeUserPassword($_SESSION["userID"], $password);
            header('Location:maxacnhan.php');
             
        }
    }
}
?>

<?php include 'header.php'; ?>

<?php if (isset($error)): ?>
<div class="alert alert-danger" role="alert">
    <?php echo 'Not found user: '. $_POST['username']; ?>
</div>
<?php else: ?>
    <div class="content">
    <?php if (isset($_POST['username'])){ ?>
        <div class="alert alert-success" role="alert">
            Hi <?php echo $_POST['username'];  ?> Mời bạn đổi mật khẩu!
        </div>
        <form action="changePassword.php" method="POST">
        <div class="form-group">
            <label for="password">Mật khẩu mới</label>
            <input type="password" name="password" id="password" class="form-control" title="phải có ít nhất 7 kí tự và có ít nhất 1 chữ hoa hoặc 1 chữ thường hoặc 1 số hoặc 1 kí tự đặc biệt: ~<>?_+=!@#$%^&*(){}|;:,." name="MatKhau" id="MatKhau" onkeyup="checkPassword()"
                                pattern="[~<>?_+=!@#$%^&*(){}|;:,.a-zA-Z0-9]{7,20}" required>
        </div>
        <div class="form-group">
            <label for="confirmpassword">Nhập lại mật khẩu</label>
            <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" title="phải có ít nhất 7 kí tự và có ít nhất 1 chữ hoa hoặc 1 chữ thường hoặc 1 số hoặc 1 kí tự đặc biệt: ~<>?_+=!@#$%^&*(){}|;:,." name="MatKhau" id="MatKhau" onkeyup="checkPassword()"
                                pattern="[~<>?_+=!@#$%^&*(){}|;:,.a-zA-Z0-9]{7,20}" required>
        </div>

        <button button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
    </form>
    <?php } ?>
    </div>
<?php endif; ?>

<?php include 'footer.php'; ?>
    