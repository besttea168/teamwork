<?php
require_once("../article/db_connect.php");

// 設定每頁顯示的資料條數
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// 確保頁數不小於1
if ($page < 1) {
    $page = 1;
}

// 構建查詢語句
$sql = "SELECT * FROM article_main ORDER BY id ASC LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// 計算總資料數量
$countSql = "SELECT COUNT(*) FROM article_main";
$countResult = $conn->query($countSql);
$totalRows = $countResult->fetch_array()[0];
$totalPages = ceil($totalRows / $limit);
?>

<!doctype html>
<html lang="en">

<head>
    <title>文章總覽</title>
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
        <h1 class="main-title">文章總覽</h1>
        <hr>
        <div class="container ps-5 pe-5">
            <form action="doSearchArticle.php" method="post">
                <div class="mb-3">
                    <input type="number" class="form-control mb-3" name="searchByid" id="searchId"
                        aria-describedby="helpId" />
                    <small id="helpId" class="form-text text-muted">請輸入文章ID</small>
                    <button type="submit" class="btn btn-primary">檢索ID</button>
                </div>
            </form>
        </div>
        <form action="doSearchArticle.php" method="post">
            <div class="container ps-5 pe-5">
                <div class="mb-3">
                    <input type="text" class="form-control mb-3" name="searchBytitle" id="searchTitle"
                        aria-describedby="helpId" placeholder="我的標題" />
                    <small id="helpId" class="form-text text-muted">請輸入文章標題</small>
                    <button type="submit" class="btn btn-primary">檢索標題</button>
                </div>

                <div class="container">
                    <ul class="list-unstyled col">
                        <?php foreach ($rows as $row): ?>
                            <li class="row">
                                <div class="article-box mb-3">
                                    <a href="edit.php?id=<?= $row['id']; ?>">
                                        <h2><?= $row["title"] ?></h2>
                                    </a>
                                    <h5>文章ID: <?= $row["id"] ?></h5>
                                    <p><?= $row["description"] ?></p>
                                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-primary"><i class="fa-solid fa-pen"></i> 修改</a>
                                    <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i> 刪除</a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

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
        </form>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>