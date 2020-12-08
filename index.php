<?php
    require_once 'init.php';
    unset($_SESSION['userID']);
    $title = 'TRANG CHỦ';
?>

<?php include 'header.php'; ?>

<?php if (isset($currentUser)): ?>
<div class="alert alert-success" role="alert">
    Hello <?php echo $currentUser['email']?>, chúc bạn một ngày tốt lành
</div>
<?php else : ?>
<div class="alert alert-secondary" role="alert">
    Bạn chưa đăng nhập!
</div>
<?php endif; ?>

<?php include 'footer.php'; ?>