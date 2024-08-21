<!doctype html>
<html lang="en">

<head>
    <title>新增租借商品</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />


    <?php include("../css.php"); ?>
</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>

    <div class="main-content">
        <div class="container py-4">
            <h1>新增租借商品</h1>
            <div class="py-2">
                <a class="btn btn-primary" href="products.php" title="回產品列表"><i class="fa-solid fa-left-long"></i></a>
            </div>
            <form action="doCreateProduct.php" method="post">
                <div class="mb-2">

                    <label class="form-label" for="name">租借產品</label>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected>選擇要出租的商品</option>
                        <option value="">One</option>
                    </select>

                </div>
                <div class="mb-2">
                    <label class="form-label" for="rent_price">產品租借價格</label>
                    <input type="text" class="form-control" name="rent_price">
                </div>

                <div class="mb-2">
                    <label class="form-label" for="deposit">產品租借押金</label>
                    <input type="text" class="form-control" name="deposit">
                </div>

                <div class="mb-2">
                    <label class="form-label" for="amount">存貨</label>
                    <input type="text" class="form-control" name="amount">
                </div>

                <button class="btn btn-primary" type="submit">送出</button>
            </form>
        </div>
    </div>
</body>

</html>