<?php

include("../db/db.php");
$db = mysql();

$content = $_POST['content'];
$name = $_POST['name'];
$id = $_GET['id'];
$hashcontent = md5($content);

$result = $db->prepare("INSERT INTO `$id` (content, name) VALUES (:content, :name)");
$result->execute([
    ':content' => $content,
    ':name' => $name,
]);
header("location: ../thread-tmp.php?id=$id");