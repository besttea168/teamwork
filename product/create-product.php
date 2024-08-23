<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <?php include("../css.php"); ?>
</head>

<body>
    <div class="container">
        <div class="py-2">
            <a class="btn btn-primary" href="products.php" title="回產品列表"><i class="fa-solid fa-left-long"></i></a>
        </div>
        <h1>新增商品</h1>
        <form action="doCreateProduct.php" method="post" enctype="multipart/form-data">
            <div class="mb-2">
                <label class="form-label" for="name">產品名稱</label>
                <input type="text" class="form-control" name="name">
            </div>

            <!-- 改改改改改 -->
            <div class="mb-2">
                <label class="form-label" for="category_tag">產品分類</label>
                <!-- <input type="text" class="form-control" name="tag"> -->

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="product_tags[]" value="1" id="checkbox_1">
                            <label class="form-check-label" for="checkbox_1">大腦</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="product_tags[]" value="2" id="checkbox_2">
                            <label class="form-check-label" for="checkbox_2">派對</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="product_tags[]" value="3" id="checkbox_3">
                            <label class="form-check-label" for="checkbox_3">樂齡</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="product_tags[]" value="4" id="checkbox_4">
                            <label class="form-check-label" for="checkbox_4">幼兒</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="product_tags[]" value="5" id="checkbox_5">
                            <label class="form-check-label" for="checkbox_5">紙牌</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="product_tags[]" value="6" id="checkbox_6">
                            <label class="form-check-label" for="checkbox_6">猜心</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="product_tags[]" value="7" id="checkbox_7">
                            <label class="form-check-label" for="checkbox_7">輕策略</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="product_tags[]" value="8" id="checkbox_8">
                            <label class="form-check-label" for="checkbox_8">競速</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="product_tags[]" value="9" id="checkbox_9">
                            <label class="form-check-label" for="checkbox_9">台灣作家</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="product_tags[]" value="10" id="checkbox_10">
                            <label class="form-check-label" for="checkbox_10">骰子</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="product_tags[]" value="11" id="checkbox_11">
                            <label class="form-check-label" for="checkbox_11">巧手</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="product_tags[]" value="12" id="checkbox_12">
                            <label class="form-check-label" for="checkbox_12">合作</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="product_tags[]" value="13" id="checkbox_13">
                            <label class="form-check-label" for="checkbox_13">言語</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="product_tags[]" value="14" id="checkbox_14">
                            <label class="form-check-label" for="checkbox_14">陣營</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="product_tags[]" value="15" id="checkbox_15">
                            <label class="form-check-label" for="checkbox_15">中策略</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="product_tags[]" value="16" id="checkbox_16">
                            <label class="form-check-label" for="checkbox_16">重策略</label>
                        </div>
                    </div>
                </div>
            </div>



            <div class="mb-2">
                <label class="form-label" for="price">產品價格</label>
                <input type="text" class="form-control" name="price">
            </div>
            <div class="mb-2">
                <label class="form-label" for="image">產品圖片</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="mb-2">
                <label class="form-label" for="description">產品敘述</label>
                <input type="text" class="form-control" name="description">
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
            <input class="btn btn-primary" type="submit"></input>
        </form>
    </div>
</body>

</html>