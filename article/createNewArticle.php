<!doctype html>
<html lang="en">

<head>
    <title>建立新文章</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?php include("../css.php") ?>
    <?php include("style.php") ?>
    <style>
        textarea {
            height: 500px;
            width: 100%;
            resize: none;
        }
    </style>
</head>

<body>
    <?php include("../article/header.php") ?>
    <main class="main-content pp-3 px-3">
        <div class="container ">
            <div class="mb-3 pt-3">
                <h1>建立新文章</h1>
                <div class="mb-3">
                    <label for="" class="form-label">請輸入標題</label>
                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="" />
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">請輸入簡介</label>
                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="" />
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
                <textarea class="form-control mb-3" name="" id="" rows="3"></textarea>
                <button type="button" class="btn btn-primary">
                    儲存
                </button>
                <button type="button" class="btn btn-primary">
                    發表
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