<?php
    // Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



function findUserByUsername($username){
    global $db;
    $stmt=$db->prepare("SELECT * FROM taikhoan WHERE TenDangNhap=?");
    $stmt->execute(array($username));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
 
function findUserById($id){
    global $db;
    $stmt=$db->prepare("SELECT * FROM taikhoan WHERE MaTaiKhoan=?");
    $stmt->execute(array($id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}



function getCurrentUser(){
    if(isset($_SESSION['userId'])){
        return findUserById($_SESSION['userId']);
    }
    return null;
}
function createUser($username, $password,$name,$add, $tel, $mail, $bx,$ml,$mxn)
{
     
    global $db;
    $stmt=$db->prepare("INSERT INTO taikhoan(TenDangNhap, MatKhau,TenHienThi,DiaChi,DienThoai,Email,BiXoa,MaLoaiTaiKhoan,MaXacNhan) VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt->execute(array($username,$password,$name,$add, $tel, $mail, $bx,$ml,$mxn));
    return findUserById($db->lastInsertId());
}

function ChangeUserPassword($username, $password){
    global $db;
	$stmt = $db->prepare("UPDATE taikhoan SET MatKhau=? WHERE TenDangNhap=?");
    $stmt->execute (array($password,$username)); 

}
//thay đổi mã xác nhận
function ChangeCode($username,$newcode){
    global $db;
	$stmt = $db->prepare("UPDATE taikhoan SET MaXacNhan=? WHERE TenDangNhap=?");
    $stmt->execute (array($newcode,$username)); 

}
function ChangeUserName($mtk,$name){
    global $db;
	$stmt = $db->prepare("UPDATE taikhoan SET TenHienThi=? WHERE MaTaiKhoan=?");
    $stmt->execute (array($name,$mtk)); 

}
//Thay đổi địa chỉ
function ChangeUserAd($mtk,$ad){
    global $db;
	$stmt = $db->prepare("UPDATE taikhoan SET DiaChi=? WHERE MaTaiKhoan=?");
    $stmt->execute (array($ad,$mtk)); 

}
//Thay đổi điện thoại
function ChangeUserTel($mtk,$tel){
    global $db;
	$stmt = $db->prepare("UPDATE taikhoan SET DienThoai=? WHERE MaTaiKhoan=?");
    $stmt->execute (array($tel,$mtk)); 

}//Thay đổi email
function ChangeUserMail($mtk,$mail){
    global $db;
	$stmt = $db->prepare("UPDATE taikhoan SET Email=? WHERE MaTaiKhoan=?");
    $stmt->execute (array($mail,$mtk)); 

}
function resizeImage($filename, $max_width, $max_height)
{
  list($orig_width, $orig_height) = getimagesize($filename);

  $width = $orig_width;
  $height = $orig_height;

  # taller
  if ($height > $max_height) {
      $width = ($max_height / $height) * $width;
      $height = $max_height;
  }

  # wider
  if ($width > $max_width) {
      $height = ($max_width / $width) * $height;
      $width = $max_width;
  }

  $image_p = imagecreatetruecolor($width, $height);

  $image = imagecreatefromjpeg($filename);

  imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);

  return $image_p;
}

function requireLoggedIn(){
    global $currentUser;
    if(!$currentUser){
        header('Location: index.php');
        exit();
    }
}
 function sendEmail($to,$subject,$content){

 $mail = new PHPMailer(true);

try {
    //Server settings
                         // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'doanwebk18@gmail.com';                     // SMTP username
    $mail->Password   = 'toilaai12@!';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('doanwebk18@gmail.com', 'huan doanweb');
    $mail->addAddress($to);     // Add a recipient
   

   
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $content;
    

    $mail->send();
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
 }
