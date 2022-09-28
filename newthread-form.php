<?php
    session_start();
    if(!isset($_SESSION['user'])) {
        header("location: login-form.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Thread</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .div1 {
            height: 200px;
        }
        .lineheight {
            line-height: 200px;
        }
    </style>
</head>
<body>
<div>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a href="#" class="navbar-brand ms-3 fw-bolder">Forum Website</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link disabled me-3" id="username">
                        <?=$_SESSION["user"]?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="_actions/logout.php" class="nav-link me-3">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="bg-secondary text-center">
        <h1 class="h3 lineheight text-light div1">Welcome From The Forum Website</h1>
    </div>
    <div class="container-fluid">
        <h1 class="h3 mt-5 mb-3">Create A New Thread</h1>
        <form action="_actions/new-thread.php?" method="post">
            <input type="hidden" name="name" value="<?=$_SESSION["user"]?>">
            <label for="title">Thread Title</label>
            <input type="text" class="form-control w-50 mt-2 mb-3" id="title" name="title" placeholder="Title">
            <label for="content">Content</label>
            <textarea type="text" id="content" class="form-control w-50 mt-2" name="content" placeholder="Type your content here"></textarea>
            <input type="submit" id="btn" value="Post" class="btn btn-primary btn-lg mt-3">
        </form>
    </div>
</body>
</html>