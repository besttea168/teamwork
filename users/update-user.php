<?php
require_once("../db_connect.php");
if (!isset($_GET["id"])) {
    echo "循正常管道";
    exit;
}

$id = $_GET["id"];


$sql = "SELECT * FROM users WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
    <title>修改資料</title>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        i {
            color: white;
        }
    </style>
    <?php include("../css.php") ?>
</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>
    <div class="main-content">
        <div class="container">
            <div class="d-flex">
                <div class="m-2">
                    <button class="btn btn-primary "><a href="users.php"><i class="fa-solid fa-arrow-left"></i></a></button>
                </div>
                <div>
                    <h1> <span class="text-primary"> <?= $row["name"] ?></span>&nbsp;個人資料</h1>
                </div>
            </div>
            <form action="do-update-user.php" method="post">
                <table class="table table-bordered border-secondary">
                    <tr>
                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                        <th>id</th>
                        <td><?= $row["id"] ?></td>
                    </tr>
                    <tr>
                        <th>帳號</th>
                        <td><?= $row["account"] ?></td>
                    </tr>
                    <tr>
                        <th>姓名</th>
                        <td>
                            <input type="text" value="<?= $row["name"] ?>" name="name">
                        </td>
                    </tr>
                    <tr>
                        <th>信箱</th>
                        <td>
                            <input type="email" value="<?= $row["email"] ?>" name="email">
                        </td>
                    </tr>
                    <tr>
                        <th>電話</th>
                        <td>
                            <input type="tel" value="<?= $row["phone"] ?>" name="phone">
                        </td>
                    </tr>
                    <tr>
                        <th>地址</th>
                        <td>
                            <input type="tel" value="<?= $row["address"] ?>" name="address">
                        </td>
                    </tr>
                    <tr>
                        <th>生日</th>
                        <td>
                            <input type="date" value="<?= $row["birthday"] ?>" name="birthday">
                        </td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>
                            <select class="form-select mb-3" value="<?= $row["birthday"] ?>" name="gender">
                                <option value="男">男</option>
                                <option value="女">女</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>valid</th>
                        <td><?= $row["valid"] ?></td>
                    </tr>
                    <tr>
                        <th>註冊時間</th>
                        <td><?= $row["created_at"] ?></td>
                    </tr>
                </table>
                <button class="btn btn-primary">儲存</button>
            </form>
        </div>
    </div>
</body>

</html>