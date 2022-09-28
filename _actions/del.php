<?php

include("../db/db.php");
$db = mysql();

$id = $_GET['id'];
$statement = $db->query("DROP TABLE `$id`");
$statement2 = $db->query("DELETE FROM `threads` WHERE id = $id");


header("location: ../index.php");