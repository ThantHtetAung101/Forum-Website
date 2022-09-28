<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel = "stylesheet" href="css/bootstrap.min.css">
    <style>
        .warp {
            margin: auto;
            width: 30%;
        }
    </style>
</head>
<body class="bg-dark">
<div class="warp text-center bg-light rounded-pill mt-5 p-5 pt-3">
        <h1 class="fw-bolder mt-5">Register</h1>
        <?php
            if(isset($_GET['error'])) :?>
                <div class="alert alert-warning">
                    Username is already in used. Try another!
                </div>
        <?php endif ?>
        <?php
            if(isset($_GET['check'])) :?>
                <div class="alert alert-danger">
                    Please agree terms and conditions!!
                </div>
        <?php endif ?>
        <form action="verify-form.php" class="mt-3 mb-3" method="post">
            <input type="text" name="username" class="form-control mt-3" placeholder="Username"><br>
            <input type="email" name="email" class="form-control mt-2" placeholder="Email"><br>
            <input type="password" name="password" class="form-control" placeholder="Password"><br>
            <input class="form-check-input" name="check" type="checkbox" id="check">
            <label for="check" class="form-check-label">Agree to terms and conditions</label>
            <input type="submit" value="Register" class="btn w-50 mt-4 btn-primary"><br>
            <a href="login-form.php" class="btn mt-2 w-50 btn-outline-primary">Login</a>
        </form>
    </div>
</body>
</html>