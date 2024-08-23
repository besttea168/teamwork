<?php
session_start();
// session_destroy();
?>

<!doctype html>
<html lang="en">

<head>
    <title>登入</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
    <style>
        .pos {
            width: 800px;
            margin: 200px auto 0px;
            text-align: center;
        }
    </style>
    <?php include("../css.php"); ?>
</head>

<body>
    <?php include("nav-login.php") ?>
    <?php include("sidebar-login.php") ?>
    <div class="pos">
        <div class="container">
            <h1>登入</h1>
            <form action="do-login.php" method="post">
                <div class="mb-3">
                    <label for="">帳號</label>
                    <input type="account" name="account">
                </div>
                <div class="mb-3">
                    <label for="">密碼</label>
                    <input type="password" name="password">
                </div>
                <?php if(isset($_SESSION["error"]["login"])): ?>
                <div class="text-danger"><?= $_SESSION["error"]["login"]; ?></div>
                <?php unset($_SESSION["error"]["login"]); endif; ?>
                <button class="btn btn-primary mt-1">登入</button>
            </form>
        </div>
    </div>
</body>

</html>