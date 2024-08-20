<!doctype html>
<html lang="en">

<head>
    <title>文章管理系統</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
  <?php include("../css.php") ?>
    <style>
        .function-box {
            height: 50px;
            width: 180px;
            border: 2px solid darkgray;
            border-radius: 15px;

            
        }
    </style>
</head>

<body>

    <header class="main-header d-flex justify-content-between align-items-center fixed-top shadow">
        <a href="" class="brand text-decoration-none link-light p-3 bg-dark">桌遊仔</a>
        <a href="" class="btn btn-dark">系統登出</a>
    </header>

    <aside class="left-aside bg-light border-end vh-100 position-fixed top-0 start-0 overflow-auto">
        <ul class="list-unstyled">
            <li>
                <a href="" class="d-block px-3 py-2 text-decoration-none"><i class="fa-solid fa-house me-2"></i>
                    系統首頁</a>

            </li>
            <li>
                <a href="" class="d-block px-3 py-2 text-decoration-none"><i class="fa-solid fa-file-pen me-2"></i>
                    建立新文章</a>
            </li>
            <li>
                <a href="" class="d-block px-3 py-2 text-decoration-none"><i
                        class="fa-solid fa-magnifying-glass me-2"></i>
                    搜尋現有文章</a>
            </li>
            <li>
                <a href="" class="d-block px-3 py-2 text-decoration-none"><i class="fa-solid fa-book-bookmark me-2"></i>
                    按分類檢索文章</a>
            </li>
            <li>
                <a href="" class="d-block px-3 py-2 text-decoration-none text-muted"><i
                        class="fa-solid fa-trash-can me-2"></i>
                    刪除文章(暫時不做)</a><!----暫時不做-->
            </li>
            <li>
                <a href="" class="d-block px-3 py-2 text-decoration-none"><i
                        class="fa-solid fa-puzzle-piece me-2"></i></i>
                    Intergration</a>
            </li>

        </ul>
        <div class="d-flex justify-content-between px-3 align-items-center ">
            <small class="text-muted">SAVED REPORT</small>
            <a role="button"><i class="fa-solid fa-circle-plus"></i></a>
        </div>
        <ul class="list-unstyled">
            <li>
                <a href="" class="d-block px-3 py-2 text-decoration-none"><i class="fa-regular fa-newspaper me-2"></i>
                    Current Month</a>

            </li>
            <li>
                <a href="" class="d-block px-3 py-2 text-decoration-none"><i class="fa-regular fa-newspaper me-2"></i>
                    Last Quater</a>

            </li>
            <li>
                <a href="" class="d-block px-3 py-2 text-decoration-none"><i class="fa-regular fa-newspaper me-2"></i>
                    Social engagement</a>

            </li>
            <li>
                <a href="" class="d-block px-3 py-2 text-decoration-none"><i class="fa-regular fa-newspaper me-2"></i>
                    Year-end sale</a>
            </li>
        </ul>
        <hr>
        <ul class="list-unstyled">
            <li>
                <a href="" class="d-block px-3 py-2 text-decoration-none"><i class="fa-solid fa-user-gear me-2"></i>
                    系統設定</a>
            </li>
            <li>
                <a href="" class="d-block px-3 py-2 text-decoration-none"><i
                        class="fa-solid fa-right-from-bracket me-2"></i>
                    系統登出</a>
            </li>
        </ul>
    </aside>
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
            <ul class="list-unstyled row">
                <li class="col">
                    <div class="function-box pt-2 ps-4">
                        <a href="">建立新文章</a>
                    </div>
                </li>
                <li class="col">
                    <div class="function-box pt-2 ps-4">
                        <a href="">編輯瀏覽文章</a>
                    </div>
                </li>
                <li class="col">
                    <div class="function-box pt-2 ps-4">
                        <a href="">文章搜尋（按標題）</a>
                    </div>
                </li>
                <li class="col">
                    <div class="function-box pt-2 ps-4">
                        <a href="">文章搜尋（按時間）</a>
                    </div>
                </li>
                <li class="col">
                    <div class="function-box pt-2 ps-4">
                        <a href="">文章分類總覽</a>
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