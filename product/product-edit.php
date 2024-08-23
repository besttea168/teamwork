<?php
if (!isset($_GET["id"])) {
    echo "請正確帶入 get id 變數";
    exit;
}
$id = $_GET["id"];

require_once("../db_connect.php");

$sql = "SELECT * FROM product WHERE id= '$id' ";

$result = $conn->query($sql);
$productCount = $result->num_rows;
$row = $result->fetch_assoc();

$productTags = [];
$sqlTags = "SELECT tag_id FROM product_tags WHERE product_id = $id";
$resultTags = $conn->query($sqlTags);
if ($resultTags->num_rows > 0) {
    while($rowTag = $resultTags->fetch_assoc()) {
        $productTags[] = $rowTag['tag_id'];
    }
}

if ($productCount > 0) {
    $title = $row["name"];
} else {
    $title = "沒有此商品";
}

?>
<!doctype html>
<html lang="en">

<head>
    <title><?= $title ?></title>
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
            <a class="btn btn-primary" href="products.php?id=<?= $row["id"] ?>" title="回產品"><i class="fa-solid fa-left-long"></i></a>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h1>修改商品資料</h1>
                <?php if ($productCount > 0): ?>
                    <form action="doUpdateProduct.php" method="post">
                        <table class="table table-bordered">
                            <input type="hidden" name="id" value="<?= $row["id"] ?>">
                            <tr>
                                <th>id</th>
                                <td><?= $row["id"] ?></td>
                            </tr>
                            <tr>
                                <th>名稱</th>
                                <td>
                                    <input type="text" class="form-control" name="name" value="<?= $row["name"] ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>分類</th>
                                <td>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name="product_tags[]" value="1" id="checkbox_1" <?php echo in_array(1, $productTags) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="checkbox_1">大腦</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name="product_tags[]" value="2" id="checkbox_2" <?php echo in_array(2, $productTags) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="checkbox_2">派對</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name="product_tags[]" value="3" id="checkbox_3" <?php echo in_array(3, $productTags) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="checkbox_3">樂齡</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name="product_tags[]" value="4" id="checkbox_4" <?php echo in_array(4, $productTags) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="checkbox_4">幼兒</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name="product_tags[]" value="5" id="checkbox_5" <?php echo in_array(5, $productTags) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="checkbox_5">紙牌</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name="product_tags[]" value="6" id="checkbox_6" <?php echo in_array(6, $productTags) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="checkbox_6">猜心</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name="product_tags[]" value="7" id="checkbox_7" <?php echo in_array(7, $productTags) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="checkbox_7">輕策略</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name="product_tags[]" value="8" id="checkbox_8" <?php echo in_array(8, $productTags) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="checkbox_8">競速</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name="product_tags[]" value="9" id="checkbox_9" <?php echo in_array(9, $productTags) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="checkbox_9">台灣作家</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name="product_tags[]" value="10" id="checkbox_10" <?php echo in_array(10, $productTags) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="checkbox_10">骰子</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name="product_tags[]" value="11" id="checkbox_11" <?php echo in_array(11, $productTags) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="checkbox_11">巧手</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name="product_tags[]" value="12" id="checkbox_12" <?php echo in_array(12, $productTags) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="checkbox_12">合作</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name="product_tags[]" value="13" id="checkbox_13" <?php echo in_array(13, $productTags) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="checkbox_13">言語</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name="product_tags[]" value="14" id="checkbox_14" <?php echo in_array(14, $productTags) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="checkbox_14">陣營</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name="product_tags[]" value="15" id="checkbox_15" <?php echo in_array(15, $productTags) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="checkbox_15">中策略</label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name="product_tags[]" value="heavy_16" id="checkbox_heavy_16" <?php echo in_array('heavy_16', $productTags) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="checkbox_heavy_16">重策略</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>price</th>
                                <td>
                                    <input type="text" class="form-control" name="price" value="<?= $row["price"] ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>created_at</th>
                                <td><?= $row["created_at"] ?></td>
                            </tr>
                        </table>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary" type="submit">
                                儲存
                            </button>

                            <a class="btn btn-danger" href="doDeleteProduct.php?id=<?= $row["id"] ?>" onclick="return confirm('確定刪除此商品嗎?')">刪除
                            </a>
                        </div>
                    </form>
                <?php else: ?>
                    沒有此商品
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
<?php $conn->close(); ?>

</html>