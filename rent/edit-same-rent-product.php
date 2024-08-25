<?php
if (!isset($_GET["id"])) {
    echo "請正確帶入 get id 變數";
    exit;
}
$id = $_GET["id"];

require_once("../db_connect.php");

// 取得當前商品資料
$sql = "SELECT * FROM rent_product WHERE id = ? AND valid = 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    echo "找不到該商品";
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>編輯商品</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?php include("../css.php"); ?>
</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>
    <div class="main-content">
        <div class="container py-4">
            <h1>編輯租借商品</h1>
            <form action="doUpdate-same-rent-product.php" method="post">
                <input type="hidden" name="product_id" value="<?= htmlspecialchars($row['product_id']) ?>">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>商品ID</th>
                            <th>價格（元/天）</th>
                            <th>押金（元）</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= htmlspecialchars($row['product_id']) ?></td>
                            <td>
                                <input type="number" class="form-control" name="price" value="<?= htmlspecialchars($row['price']) ?>" required>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="deposit" value="<?= htmlspecialchars($row['deposit']) ?>" required>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">提交</button>
                <a class="btn btn-secondary" href="rent-product.php?id=<?= htmlspecialchars($id) ?>">取消</a>
            </form>
        </div>
    </div>
</body>

</html>