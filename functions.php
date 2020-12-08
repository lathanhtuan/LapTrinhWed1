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
