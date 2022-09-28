<?php
    include("db/db.php");
    $db = mysql();
    $result = $db->query("SELECT * FROM threads");
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
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>Home Page</title>
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
        .cursor:hover {
            cursor: pointer;
        }
        .hidden {
            display: hidden!important;
        }
        .deco {
            text-decoration: none;
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
            <h1 class="h3 text-light div1">Welcome From The Forum Website</h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <a href="newthread-form.php" class="btn ms-3 mt-3 btn-primary">
                        Start A New Thread
                    </a>
                </div>
                <div class="col">
                    <ul class="list-group">
                        <div class="warp container-fluids">
                            <?php while($row = $result->fetch()) : ?>
                                <a href="thread-tmp.php?id=<?=$row->id?>" class="deco">
                                    <div class="row mt-3 cursor" id="<?=$row->id?>">
                                        <div class="col-2 bg-light text-center profile me-auto">
                                            <span class="center">
                                                <?php echo substr($row->name, 0, 1)?>
                                            </span>
                                        </div>
                                        <div class="col mt-1">
                                            <span class="h4 text-black ms-3"><?=$row->title?></span>
                                            <br>
                                            <span class="h6 text-black-50 ms-3 mt-2">
                                            <?=$row->name?> created
                                        </span>
                                        </div>
                                    </div>
                                </a>
                            <?php endwhile ?>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        function del() {
            location.replace("_actions/del.php")
        }
    </script>
</body>
</html>