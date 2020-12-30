<?php



function findUserByUsername($username){
    global $db;
    $stmt=$db->prepare("SELECT * FROM taikhoan WHERE TenDangNhap=?");
    $stmt->execute(array($username));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function findUserById($mataikhoan){
    global $db;
    $stmt=$db->prepare("SELECT * FROM taikhoan WHERE MaTaiKhoan=?");
    $stmt->execute(array($mataikhoan));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}



function getCurrentUser(){
    if(isset($_SESSION['userId'])){
        return findUserById($_SESSION['userId']);
    }
    return null;
}
function createUser($username, $password,$name,$add,$tel,$mail,$bx,$ml)
{
    global $db;
    $stmt=$db->prepare("INSERT INTO taikhoan(TenDangNhap, MatKhau, TenHienThi, DiaChi, DienThoai, Email,BiXoa,MaLoaiTaiKhoan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute(array($username,$password,$name,$add,$tel,$mail,$bx,$ml));
    return findUserById($db->lastInsertId());
}
// function ChangeUserPassword($email, $password){
//     global $db;
// 	$stmt = $db->prepare("UPDATE users SET password=? WHERE email=?");
//     $stmt->execute (array($password,$email)); 

// }


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
function createPost($userId, $content) {
    global $db;
    $stmt = $db->prepare("INSERT INTO posts (userId, content, createAt) VALUE (?, ?, CURRENT_TIMESTAMP())");
    $stmt->execute(array($userId, $content));
    return $db->lastInsertId();
}

function getNewFeedsForUserId($userId) {
    global $db;
    $stmt = $db->prepare("SELECT p.id, p.userId, u.username, p.content, p.createAt FROM posts as p LEFT JOIN users as u ON u.id = p.userId WHERE p.userId = $userId ORDER BY createAt DESC");
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
}