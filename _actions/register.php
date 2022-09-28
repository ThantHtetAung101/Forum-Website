<?php 

session_start();

include("../db/db.php");
$db = mysql();
$username = $_SESSION["data"]['username'];
$email = $_SESSION["data"]['email'];
$password = password_hash($_SESSION["data"]['password'], PASSWORD_DEFAULT);
$check = $_SESSION["data"]['check'];
$code = $_SESSION["code"]['randCode'];

$check = $db->prepare("SELECT * FROM users WHERE email = :email");
$check->execute([
    ':email'=>$email,
]);
$checkname = $check->fetch();
if($checkname->email === $email ) {
    header("location: ../register-form.php?error=true");
    exit();
}
if(!isset($check)) {
    header("location: ../register-form.php?check=false");
    exit();
}
$statement = $db->prepare("INSERT INTO users (username, email, password, verify_code) VALUES (:username, :email, :password, :verify_code)");
$statement->execute([
    ':username' => $username,
    ':email' => $email,
    ':password' => $password,
    ':verify_code' => $code,
]);

unset($_SESSION["data"]);
header("location: ../login-form.php");