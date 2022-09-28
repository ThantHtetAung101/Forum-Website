<?php

session_start();

include("../db/db.php");
$db = mysql();

$code = $_POST["code"];
$checkcode = $_SESSION["code"]['randCode'];

if($checkcode = $code) {
    header("location: register.php");
} else {
    header("location: ../verify-form.php?wrong");
}