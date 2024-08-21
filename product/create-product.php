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
        <?php include("../css.php"); ?>
    </head>

    <body>
        <div class="container">
        <div class="py-2">
            <a class="btn btn-primary" href="products.php" title="回產品列表"><i class="fa-solid fa-left-long"></i></a>
        </div>
        <h1>新增商品</h1>
        <form action="doCreateProduct.php" method="post">
                <div class="mb-2">
                    <label class="form-label" for="name">產品名稱</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="category_tag">產品分類</label>
                    <input type="text" class="form-control" name="category_tag">
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
                    <label class="form-label" for="descrition">產品敘述</label>
                    <input type="text" class="form-control" name="descrition">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="min_users">建議最少遊玩人數</label>
                    <input type="text" class="form-control" name="min_users">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="max_users">建議最多遊玩人數</label>
                    <input type="text" class="form-control" name="max_users">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="min_age">建議最小遊玩年齡</label>
                    <input type="text" class="form-control" name="min_age">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="playtime">建議遊玩時間</label>
                    <input type="text" class="form-control" name="playtime">
                </div>
                <button class="btn btn-primary" type="submit">送出</button>
            </form>
        </div>
    </body>
</html>
