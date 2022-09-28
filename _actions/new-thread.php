<?php

include("../db/db.php");
$db = mysql();

$title = $_POST['title'];
$content = $_POST['content'];
$name = $_POST['name'];
$hashcontent = md5($content);

$result = $db->prepare("INSERT INTO `threads` (title, content, name, hash_content) VALUES (:title, :content, :name, :hash_content)");
$result->execute([
    ':title' => $title,
    ':content' => $content,
    ':name' => $name,
    ':hash_content' => $hashcontent,
]);
$id =  $db->query("SELECT id FROM `threads` WHERE hash_content = '$hashcontent'");
$string_id = $id->fetch();
$db->query("CREATE TABLE `$string_id->id` (id int PRIMARY KEY AUTO_INCREMENT, title text, content text, name varchar(255))");
$result3 = $db->prepare("INSERT INTO `$string_id->id` (title, content, name) VALUES (:title, :content, :name)");
$result3->execute([
    ':title' => $title,
    ':content' => $content,
    ':name' => $name,
]);
header("location: ../index.php");