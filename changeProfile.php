
<?php
require_once 'init.php';

$title = 'Đổi thông tin cá nhân';

    
 
// if(isset($_SESSION['userId'] )){
//     $user = findUserByUsername('username');
//     if(!$user){
//         $error = 'Không tìm thấy tài khoản';
//     }
//     else{
//         $_SESSION['userID'] = $_POST['username'];
//     }
// }

if (isset($_POST['tenhienthi'])&&isset($_POST['diachi'])&&isset($_POST['dienthoai'])
    &&isset($_POST['email'])) {
    $name = $_POST['tenhienthi'];
    $ad=$_POST['diachi'];
    $tel=$_POST['dienthoai'];
    $mail=$_POST['email'];
     
    //$confirmpassword = $_POST['confirmpassword'];
    //$exists = findUserByUsername($_SESSION["userID"]);
    //echo $exists;
    // if ($exists) {
    //     if ($password != $confirmpassword) {
    //         echo '<div class="alert alert-danger" role="alert">' . 'Password incorrect' . '</div>';
    //     } else {
            ChangeUserName($_SESSION['userId'], $name);
            ChangeUserAd($_SESSION['userId'], $ad);
            ChangeUserTel($_SESSION['userId'], $tel);
            ChangeUserMail($_SESSION['userId'], $mail);
            echo '<div class="alert alert-success" role="alert">' . 'Cập nhập thành công!' . '</div>';
           
            // header('Location:Profile.php');
            // exit();
            
            //unset($_SESSION['userID']);
    //     }
    // }
}

?>

<?php include 'header.php'; ?>

<?php if (!isset($_SESSION['userId'])): ?>
<div class="alert alert-danger" role="alert">
    <?php echo 'Không tìm thấy tài khoản: '. $_SESSION['userId']; ?>
</div>
<?php else: ?>
    <div class="content">
    <?php if (isset($_SESSION['userId'])){ ?>
        <div class="alert alert-success" role="alert">
            Mời bạn cập nhập thông tin cá nhân!
        </div>
        <form action="changeProfile.php" method="POST">
        <div class="form-group">
            <label for="tenhienthi">Tên Hiển Thị</label>
            <input type="text" name="tenhienthi" id="tenhienthi" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="diachi">Địa Chỉ</label>
            <input type="text" name="diachi" id="diachi" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="dienthoai">Điện Thoại</label>
            <input type="text" name="dienthoai" id="dienthoai" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" required>
        </div>
        <button button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
    </form>
    <?php } ?>
    </div>
<?php endif; ?>

<?php include 'footer.php'; ?>
    