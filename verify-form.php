<?php
    session_start();

    if(isset($_GET['send'])) {
        echo " ";
    } elseif (isset($_GET['wrong'])) {
        echo $_SESSION["code"]['randCode'];
    } elseif(isset($_GET['error'])) {
        echo " ";
    } else {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $check = $_POST["check"];
        $_SESSION['data'] = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'check' => $check,
        ];
    };

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verify</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <div class="container text-center">
        <div class="card bg-dark mt-5" id="cardOne">
            <?php if(isset($_GET['error'])) :?>
                <div class="alert alert-info">
                    An Error Occured In Our Server. We will fix this right away!
                </div>
            <?php endif ?>
            <div class="card-body">
                <h3 class="card-title text-white">You need to verify your email first!</h3>
                <a onclick="showForm()" href="_actions/mail.php" class="btn btn-primary mt-3">Send Verify Email</a>
            </div>
        </div>
        <?php if(isset($_GET['send'])) :?>
            <script>
                document.querySelector("#cardOne").style.display="none";
            </script>
            <div class="card bg-dark mt-5 text-center" id="cardTwo">
                <div class="card-body">
                    <h3 class="card-title text-white">Enter verification code here!</h3>
                    <?php if(isset($_GET['wrong'])) :?>
                        <div class="alert alert-warning w-50">
                            Invalid Code
                        </div>
                    <?php endif ?>
                    <form action="_actions/code-verify.php" method="post" class="d-flex justify-content-center">
                        <input type="text" class="form-control w-25 mt-5" name="code" placeholder="Enter Code">
                        <input type="submit" class="btn btn-primary mt-5" value="Verify">
                    </form>
                </div>
            </div>
        <?php endif ?>
    </div>
</body>
</html>