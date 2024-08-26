<?php
require_once("../article/db_connect.php");


if (isset($_POST["searchByid"])) {
    // 搜索 by id
    $id = $_POST["searchByid"];
    $sql = "SELECT * FROM article_main WHERE id = $id ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $title = $row["title"];
    //echo"$title";
} elseif (isset($_POST["searchBytitle"])) {
    $title = $_POST["searchBytitle"];
    $sql = "SELECT * FROM article_main WHERE title LIKE '%$title%'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $title = $row["title"];
} else {
    echo "Error: No valid parameters provided.";
    exit();
} ?>

<!doctype html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <?php include("../css.php") ?>
    <?php include("style.php") ?>
</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>
    <main class="main-content pp-3 px-3">
        <div class="container">
            <h1><?= $row["title"] ?></h1>
            <hr>
            <p><?= $row["description"] ?></p>
            <hr>
            <p id="content"><?= $row["content"] ?></p>
            <div id="editor"></div>
        </div>
       
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script>


    </script>
</body>

</html>