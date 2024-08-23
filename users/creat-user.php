<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <title>註冊帳號</title>
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
        .box {
            width: 400px;
            margin-inline: auto;
        }
    </style>
    <?php include("../css.php") ?>
</head>

<body>
    <?php include("nav-login.php") ?>
    <?php include("sidebar-login.php") ?>

    <div class="main-content">
        <div class="  text-center box">
            <h1>註冊帳號</h1>
            <form action="do-creat-user.php" method="post">
                <div class="form-floating mb-3">
                    <input type="account" class="form-control" name="account">
                    <label for="floatingInput">帳號</label>
                    <?php if (isset($_SESSION["error"]["account"])): ?>
                        <div class="text-danger"><?= $_SESSION["error"]["account"]; ?></div>
                    <?php unset($_SESSION["error"]["account"]);
                    endif; ?>
                    <?php if (isset($_SESSION["error"]["isset"])): ?>
                        <div class="text-danger"><?= $_SESSION["error"]["isset"]; ?></div>
                    <?php unset($_SESSION["error"]["isset"]);
                    endif; ?>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password">
                    <label for="floatingPassword">密碼</label>
                    <?php if (isset($_SESSION["error"]["password"])): ?>
                        <div class="text-danger"><?= $_SESSION["error"]["password"]; ?></div>
                    <?php unset($_SESSION["error"]["password"]);
                    endif; ?>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="repassword">
                    <label for="floatingPassword">再輸入一次密碼</label>
                    <?php if (isset($_SESSION["error"]["repassword"])): ?>
                        <div class="text-danger"><?= $_SESSION["error"]["repassword"]; ?></div>
                    <?php unset($_SESSION["error"]["repassword"]);
                    endif; ?>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name">
                    <label for="floatingPassword">姓名</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email">
                    <label for="floatingPassword">信箱</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="tel" class="form-control" name="phone">
                    <label for="floatingPassword">電話</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="address" class="form-control" name="address">
                    <label for="floatingPassword">地址</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" name="birthday">
                    <label for="floatingPassword">生日</label>
                </div>
                <select class="form-select mb-3" aria-label="Default select example" name="gender">
                    <option value="男">男</option>
                    <option value="女">女</option>
                </select>

                <button class="btn btn-primary">註冊</button>

            </form>
        </div>
    </div>
</body>

</html>