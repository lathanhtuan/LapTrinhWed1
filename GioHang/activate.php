<?php
require_once 'init.php';

$title = 'Kích hoạt email';

$code = $_GET['code'];
$id = $_GET['id'];
$user = findUserById($id);
if($user)
{
    if($user['code'])
    {
        if($user['code']==$code)
        {
            activateUser($id);
            $_SESSION['userId'] = $id;
            header('Location: index.php');
        }
        else
        {
            $error ='Mã kích hoạt không hợp lệ';
        }
    }
    else
    {
        $error ='Tài khoản đã kích hoạt';
    }
}
else
{
    $error ='Không tìm thấy tài khoản';
}
?>

<?php include 'header.php'; ?>
<?php if (isset($error)): ?>
 <div class="alert alert-danger" role="alert">
	<?php echo $error; ?>
</div>
<?php endif; ?>
<?php include 'footer.php'; ?>
