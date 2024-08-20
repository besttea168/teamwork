<!doctype html>
<html lang="en">

<head>
    <title>文章管理系統</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <?php include("../css.php") ?>
    <?php include("style.php") ?>
</head>

<body>
    <?php include("../article/header.php") ?>

    <main class="main-content pp-3 px-3">
        <div class="d-flex justify-content-between">
            <h1>功能頁面總覽</h1>
            <div>
                <div class="btn-group">
                    <button class="btn btn-outline-secondary">
                        button
                    </button>
                    <button class="btn btn-outline-secondary">
                        button
                    </button>
                </div>
                <button class="btn btn-outline-secondary">
                    <i class="fa-solid fa-calendar-days"></i>
                    button
                </button>
            </div>
        </div>
        <hr>
        <div class="container">
            <ul class="list-unstyled ">
                <li class="col">
                    <div class="function-box pt-2 ps-4">
                        <a href="../article/createNewArticle.php"><i class="fa-solid fa-pen-nib"></i>建立新文章</a>
                    </div>
                </li>
                <li class="col">
                    <div class="function-box pt-2 ps-4">
                        <a href="../article/mainArticle.html">文章總覽</a>
                    </div>
                </li>
                <li class="col">
                    <div class="function-box pt-2 ps-4">
                        <a href="../article/SearchArticle.html">文章搜尋</a>
                    </div>
                </li>

                </li>
                <li class="col">
                    <div class="function-box pt-2 ps-4">
                        <a href="../article/categroyArticle.html">文章分類總覽</a>
                    </div>
                </li>
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