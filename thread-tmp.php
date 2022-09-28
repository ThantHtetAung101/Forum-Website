<?php
    include("db/db.php");
    $db = mysql();
    $id = $_GET["id"];
    $result = $db->query("SELECT * FROM `$id`");
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
    <title>Thread</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .div1 {
            height: 200px;
        }
        .h3 {
            line-height: 200px;
        }
        .warp {
            height: 100%!important;
        }
        .profile {
            display: inline-block;
            width: 7%;
            height: 100%;
            border-radius: 50px;
            background-color: aqua!important;
        }
        .center {
            line-height: 60px;
            font-size: 2rem;
        }
        .hidden {
            display: hidden!important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand ms-3 fw-bolder">Forum Website</a>
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
            <?php $row = $result->fetch() ?>
            <h1 class="h3 lineheight text-light div1"><?=$row->title?></h1>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <?php if($row->name === $_SESSION["user"]) :?>
                    <div class="col mt-3 ms-3 me-auto">
                        <a href="_actions/del.php?id=<?=$_GET['id']?>" class="btn btn-outline-primary">
                            Delete
                        </a>
                    </div>
                <?php endif ?>
            </div>
            <div class="col-10">
                <ul class="list-group">
                    <div class="warp container-fluids">
                    <div class="row mt-3 cursor" id="<?=$row->id?>">
                            <div class="col-2 bg-light text-center profile me-auto">
                                <span class="center">
                                    <?php echo substr($row->name, 0, 1)?>
                                </span>
                            </div>
                            <div class="col mt-1">
                                <span class="h4 text-black ms-3"><?=$row->content?></span>
                                <br>
                                <span class="h6 text-black-50 ms-3 mt-2">
                                <?=$row->name?> created
                                </span>
                            </div>
                    <?php while($row = $result->fetch()) : ?>
                        <div class="row mt-3 cursor" id="<?=$row->id?>">
                            <div class="col-2 bg-light text-center profile me-auto">
                                <span class="center">
                                    <?php echo substr($row->name, 0, 1)?>
                                </span>
                            </div>
                            <div class="col mt-1">
                                <span class="h4 text-black ms-3"><?=$row->content?></span>
                                <br>
                                <span class="h6 text-black-50 ms-3 mt-2">
                                <?=$row->name?> created
                                </span>
                            </div>
                        </div>
                    <?php endwhile ?>
                    </div>
                </ul>
                <h1 class="h2 mt-5 mb-3">Reply Here</h1>
                <form action="_actions/reply.php?id=<?=$id?>" method="post">
                    <label for="content">Content</label>
                    <input type="hidden" name="name" value="<?=$_SESSION["user"]?>">
                    <textarea type="text" class="form-control w-50 mt-2" name="content" placeholder="Type your content here"></textarea>
                    <input type="submit" value="Reply" class="btn btn-primary btn-lg mt-3">
                </form>
            </div>
        </div>
</body>
</html>