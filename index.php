<?php
    require_once 'init.php';
    unset($_SESSION['userID']);
    $title = 'SHOP';
?>

<?php include 'header.php'; ?>

<?php if (isset($currentUser)): ?>
<div class="alert alert-success text-warning font-weight-bold " role="alert">
    Chào mừng bạn đã đến với SHOP
</div>
<?php else : ?>
<div class="alert alert-secondary text-danger font-weight-bold" role="alert">
    Mời bạn đăng nhập!
</div>
<?php endif; ?>

<?php include 'footer.php'; ?>