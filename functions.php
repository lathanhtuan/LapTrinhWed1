<?php



function findUserByemail($email){
    global $db;
    $stmt=$db->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute(array($email));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function findUserById($id){
    global $db;
    $stmt=$db->prepare("SELECT * FROM users WHERE id=?");
    $stmt->execute(array($id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}



function getCurrentUser(){
    if(isset($_SESSION['userId'])){
        return findUserById($_SESSION['userId']);
    }
    return null;
}
function createUser($email, $password)
{
    global $db;
    $stmt=$db->prepare("INSERT INTO users(email, password) VALUES (?,?)");
    $stmt->execute(array($email,$password));
    return findUserById($db->lastInsertId());
}
function ChangeUserPassword($email, $password){
    global $db;
	$stmt = $db->prepare("UPDATE users SET password=? WHERE email=?");
    $stmt->execute (array($password,$email)); 

}

function requireLoggedIn(){
    global $currentUser;
    if(!$currentUser){
        header('Location: index.php');
        exit();
    }
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