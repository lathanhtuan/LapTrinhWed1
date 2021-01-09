<?php
    require_once 'init.php';

    $title = 'Quên mật khẩu?';

?>

<?php include 'header.php'; ?>

<form action="changeProfile.php" method="POST">
    <div class="form-group">
        <label for="username">Tên</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <button button type="submit" class="btn btn-primary">Gửi dữ liệu</button>
</form>

<?php include 'footer.php'; ?>