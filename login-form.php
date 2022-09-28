<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel = "stylesheet" href="css/bootstrap.min.css">
    <style>
        .warp {
            margin: auto;
            width: 30%;
        }
    </style>
</head>
<body class="bg-dark">
    <div class="warp text-center bg-light rounded-pill p-5 pt-3 mt-5">
        <h1 class="fw-bolder mt-5">Login</h1>
        <?php
            if(isset($_GET['incorrect'])) :?>
                <div class="alert alert-warning">
                    Incorrect Username or Password
                </div>
        <?php endif ?>
        <form action="_actions/login.php" class="mt-3 mb-3" method="post">
            <input type="email" name="email" class="form-control mt-3" placeholder="Email"><br>
            <input type="password" name="password" class="form-control" placeholder="Password"><br>
            <input type="submit" value="Login" class="btn w-50 mt-2 btn-primary"><br>
            <a href="register-form.php" class="btn mt-2 w-50 btn-outline-primary">Register</a>
        </form>
    </div>
</body>
</html>