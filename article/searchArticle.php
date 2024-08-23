<!doctype html>
<html lang="en">

<head>
    <title>檢索現有文章</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <?php include("../css.php") ?>
    <?php include("style.php") ?>
</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>
    <main class="main-content pp-3 px-3 ">
        <h1 class="main-title">檢索文章</h1>
        <div class="container ps-5 pe-5">
            <div class="mb-3">
                <input type="number" class="form-control mb-3" name="" id="searchTitle" aria-describedby="helpId"
                   method="post" />
                <small id="helpId" class="form-text text-muted">請輸入文章ID</small>
                <button type="button" class="btn btn-primary">
                    檢索ID
                </button>
            </div>
        </div>
        <div class="container ps-5 pe-5">
            <div class="mb-3">
                <input type="text" class="form-control mb-3" name="" id="searchTitle" aria-describedby="helpId"
                    placeholder="我的標題" method="post" />
                <small id="helpId" class="form-text text-muted">請輸入文章標題</small>
                <button type="button" class="btn btn-primary">
                    檢索標題
                </button>
            </div>
        </div>
        <div class="container ps-5 pe-5">
            <div class="mb-3">
                <input type="text" class="form-control mb-3" name="" id="searchTitle" aria-describedby="helpId"
                    placeholder="我的桌遊心得" method="post" />
                <small id="helpId" class="form-text text-muted">請輸入文章分類</small>
                <button type="button" class="btn btn-primary">
                    檢索
                </button>
            </div>
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