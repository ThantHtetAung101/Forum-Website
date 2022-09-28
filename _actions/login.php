<?php 

session_start();
include("../db/db.php");
$db = mysql();

$email = $_POST["email"];
$password = $_POST["password"];
$name = $db->prepare("SELECT username FROM users WHERE email = :email");
$name->execute([
    ':email' => $email,
]);
$result = $db->prepare("SELECT * FROM users WHERE email = :email");
$result->execute([
    ':email' => $email,
]);
$result1 = $db->prepare("SELECT password FROM `users` WHERE email = :email");
$result1->execute([
    ':email' => $email,
]);
$user = $result->fetch();
$pass = $result1->fetch();
$username = $name->fetch();
if($user && password_verify($password, $pass->password)) {
    $_SESSION['user'] = $username->username;
    header("location: ../index.php");
} else {
    header('location: ../login-form.php?incorrect');
};