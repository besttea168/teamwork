<?php require_once("db_connect.php");


if (isset($_POST["searchBytitle"])) {
    $title = $_POST["searchBytitle"];
    $sql = "SELECT * FROM article_main WHERE title LIKE '%$title%' ORDER by id ASC";
} elseif (isset($_POST["searchByid"])) {
    $id = $_POST["searchByid"];
    $sql = "SELECT * FROM article_main WHERE id='$id' ORDER by id ASC";
}
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
var_dump(
    $row
)
    ?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


    <?php include("../css.php") ?>
    <?php include("style.php") ?>
</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>
    <main class="main-content pp-3 px-3">
        <div class="container">
            <ul class="list-unstyled col">
                <?php foreach ($rows as $row): ?>
                    <li class="row">
                        <div class="article-box mb-3">
                            <a href="articlePage.php">
                                <h2><?= $row["title"] ?></h2>
                            </a>
                            <h5>文章ID:<?= $row["id"] ?></h5>
                            <p><?= $row["description"] ?></p>
                            <a href="edit.php?id=<?php echo $row['id']; ?>">修改</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>">刪除</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
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
</body>

</html>