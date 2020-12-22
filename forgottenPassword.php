<?php
    require_once 'init.php';

    $title = 'Quên mật khẩu?';

?>

<?php include 'header.php'; ?>

<form action="changePassword.php" method="POST">
    <div class="form-group col-sm-6">
        <label  for="email" >Email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="Enter email" required>
    </div>
    <button button type="submit" class="btn btn-primary">Gửi dữ liệu</button>
</form>

<?php include 'footer.php'; ?>