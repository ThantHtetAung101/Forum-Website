<?php

function mysql() {
    $db = new PDO("mysql:dbhost=localhost;dbname=forum", "root", "", [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    ]);
    return $db;
}