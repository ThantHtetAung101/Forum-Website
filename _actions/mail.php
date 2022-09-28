<?php

session_start();

include("../db/db.php");
$db = mysql();
$email = $_SESSION["data"]['email'];
$receiver = $email;
$subject = "Email Verification";
$code = random_int(10000, 999999);
$_SESSION["code"] = ['randCode'=>$code];

$body = "Use This Code For Verification - $code";
$sender = "galactuscosmic101@gmail.com";
if(mail($receiver, $subject, $body, $sender)){
    header("location: ../verify-form.php?send");
}else{
    header("location: ../verify-form.php?error");
}
?>