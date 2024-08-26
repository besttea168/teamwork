<?php require_once("../db_connect.php");

// 設定每頁顯示的資料條數
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// 構建查詢
if (isset($_POST["searchBytitle"])) {
    $title = $_POST["searchBytitle"];
    $sql = "SELECT * FROM article_main WHERE title LIKE '%$title%' ORDER BY id ASC LIMIT $limit OFFSET $offset";
    $countSql = "SELECT COUNT(*) FROM article_main WHERE title LIKE '%$title%'";
} elseif (isset($_POST["searchByid"])) {
    $id = $_POST["searchByid"];
    $sql = "SELECT * FROM article_main WHERE id='$id' ORDER BY id ASC LIMIT $limit OFFSET $offset";
    $countSql = "SELECT COUNT(*) FROM article_main WHERE id='$id'";
} else {
    $sql = "SELECT * FROM article_main ORDER BY id ASC LIMIT $limit OFFSET $offset";
    $countSql = "SELECT COUNT(*) FROM article_main";
}

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

$countResult = $conn->query($countSql);
$totalRows = $countResult->fetch_array()[0];
$totalPages = ceil($totalRows / $limit);
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
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
                            <h2><?= $row["title"] ?></h2>
                            <h5>文章ID: <?= $row["id"] ?></h5>
                            <p><?= $row["description"] ?></p>
                            <a href="edit.php?id=<?= $row['id']; ?>">修改</a>
                            <a href="delete.php?id=<?= $row['id']; ?>">刪除</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

            <nav>
                <ul class="pagination">
                    <?php if ($page > 1): ?>
                        <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>">上一頁</a></li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= $i == $page ? 'active' : '' ?>"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor; ?>

                    <?php if ($page < $totalPages): ?>
                        <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>">下一頁</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>