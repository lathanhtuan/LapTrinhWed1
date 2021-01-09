<?php
    require_once 'init.php';

    $title = 'Đăng kí';

    if(isset($_POST['TenDangNhap']) && isset($_POST['MatKhau']) && isset($_POST['TenHienThi'])
    && isset($_POST['DiaChi']) && isset($_POST['DienThoai'])&& isset($_POST['Email'])){
        $username = $_POST['TenDangNhap'];
        $password = $_POST['MatKhau'];
        $name = $_POST['TenHienThi'];
        $add= $_POST['DiaChi'];
        $tel= $_POST['DienThoai'];
        $email= $_POST['Email'];
        $bx=0;
        $ml=0;
        $user = findUserByUsername($username);

        if($user){
            $error = 'Tài khoản đã tồn tại';
            
        } else {
                $code=strtoupper(bin2hex(random_bytes(4)));
                sendEmail($email,'huan doanweb','Mã xác nhận:'.$code);//gửi mã xác nhận  
                $user= createUser($username,$password,$name,$add, $tel, $email,$bx,$ml,$code);
                $_SESSION['userId'] = $user['MaTaiKhoan'];
                header('Location:maxacnhan.php');
                unset($_SESSION['userId']);
            
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
    <div class="form-group">
        <label for="TenDangNhap">Tên đăng nhập</label>
        <input type="text" name="TenDangNhap" id="TenDangNhap" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="MatKhau">Mật khẩu</label>
        <input type="password" name="MatKhau" id="MatKhau" class="form-control" title="phải có ít nhất 7 kí tự và có ít nhất 1 chữ hoa hoặc 1 chữ thường hoặc 1 số hoặc 1 kí tự đặc biệt: ~<>?_+=!@#$%^&*(){}|;:,." name="MatKhau" id="MatKhau" onkeyup="checkPassword()"
                                pattern="[~<>?_+=!@#$%^&*(){}|;:,.a-zA-Z0-9]{7,20}" required>
    </div>
    <div class="form-group">
        <label for="TenHienThi">Tên Hiển Thị</label>
        <input type="text" name="TenHienThi" id="TenHienThi" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="DiaChi">Địa chỉ</label>
        <input type="text" name="DiaChi" id="DiaChi" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="DienThoai">Điện Thoại</label>
        <input type="text" name="DienThoai" id="DienThoai" class="form-control" pattern="[0-9]{10,11}" title="Số điện thoại phải là số 0-9 và từ 10-11 kí tự"  required>
    </div>
    <div class="form-group">
        <label for="Email">Email</label>
        <input type="text" name="Email" id="Email" class="form-control" pattern="[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]" title="Email phải là số 0-9 và có kí tự chữ cái và @!"  required>
    </div>
    <button button type="submit" class="btn btn-primary">Đăng Kí</button>
</form>
<?php endif; ?>
<?php include 'footer.php'; ?>