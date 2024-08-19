<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <div class="container">
            <form action="doCreateProduct.php" method="post">
                <div class="mb-2">
                    <label class="form-label" for="name">產品名稱</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="category">產品分類</label>
                    <input type="text" class="form-control" name="category">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="price">產品價格</label>
                    <input type="text" class="form-control" name="price">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="image">產品圖片</label>
                    <input type="text" class="form-control" name="image">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="content">產品內容</label>
                    <input type="text" class="form-control" name="content">
                </div>
                <button class="btn btn-primary" type="submit">送出</button>
            </form>
        </div>
    </body>
</html>
