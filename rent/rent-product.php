<?php
if (!isset($_GET["id"])) {
    echo "請正確帶入 get id 變數";
    exit;
}
$id = $_GET["id"];

require_once("../db_connect.php");

// 查詢當前商品的詳細資料
$sql = "SELECT 
            rp.*,  
            p.name AS name, 
            p.image AS image
        FROM 
            rent_product rp
        INNER JOIN 
            product p
        ON 
            rp.product_id = p.id  
        AND rp.valid = 1
        WHERE rp.id = $id";

$result = $conn->query($sql);
$productCount = $result->num_rows;
$row = $result->fetch_assoc();

if ($productCount > 0) {
    $title = $row["name"];
} else {
    $title = "沒有此商品";
}

// 查詢相同 product_id 的所有商品（包括本身）
$sql_related = "SELECT 
                    rp.*,  
                    p.name AS name
                FROM 
                    rent_product rp
                INNER JOIN 
                    product p
                ON 
                    rp.product_id = p.id  
                AND rp.valid = 1
                WHERE rp.product_id = " . $row['product_id'];

$result_related = $conn->query($sql_related);
$relatedProductCount = $result_related->num_rows;
?>

<!doctype html>
<html lang="en">

<head>
    <title><?= $title ?>商品資訊</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <?php include("../css.php"); ?>
</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>
    <div class="main-content">
        <div class="container py-4">
            <div class="py-2">
                <a class="btn btn-primary" href="rent_product_list.php" title="回產品列表"><i class="fa-solid fa-left-long"></i>回租借產品列表</a>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <?php if ($productCount > 0): ?>
                        <h1>產品資訊
                            <a class="btn btn-primary" href="edit-same-rent-product.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a class="btn btn-secondary m-1" href="doDelete-same-rent-product.php?id=<?= $row['id'] ?>" onclick="return confirm('確定要刪除這個商品嗎？')"><i class="fa-solid fa-trash"></i></a>
                        </h1>


                        <table class="table table-bordered">
                            <!-- 主要商品資訊 -->
                            <tr>
                                <th>商品ID</th>
                                <td><?= $row["id"] ?></td>
                            </tr>
                            <tr>
                                <th>商品名稱</th>
                                <td><?= $row["name"] ?></td>
                            </tr>
                            <tr>
                                <th>租金</th>
                                <td><?= $row["price"] ?>元/天</td>
                            </tr>
                            <tr>
                                <th>押金</th>
                                <td><?= $row["deposit"] ?>元</td>
                            </tr>
                            <tr>
                                <th>罰金</th>
                                <td><?= round($row["price"] * 1.5) ?>元/天</td>
                            </tr>
                            <tr>
                                <th>商品出租狀態</th>
                                <?php if ($row["status"] == "true"): ?>
                                    <td>可出租</td>
                                <?php else : ?>
                                    <td>尚未歸還</td>
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <th>最初上架時間</th>
                                <td><?= $row["created_at"] ?></td>
                            </tr>
                            <tr>
                                <th>最後更新時間</th>
                                <td><?= $row["updated_time"] ?></td>
                            </tr>
                        </table>

                    <?php else: ?>
                        沒有此商品
                    <?php endif; ?>
                </div>
            </div>

            <!-- 顯示相同 product_id 的所有商品清單 -->
            <h2>相同商品列表</h2>
            <?php if ($relatedProductCount > 0): ?>
                <table class="table table-bordered">
                    <tr>
                        <th>租借商品ID</th>
                        <th>商品名稱</th>
                        <th>租金</th>
                        <th>押金</th>
                        <th>罰金</th>
                        <th>商品出租狀態</th>
                        <th>最初上架時間</th>
                        <th>最後更新時間</th>
                        <th>操作</th>
                    </tr>
                    <?php while ($relatedRow = $result_related->fetch_assoc()): ?>
                        <tr>
                            <td><?= $relatedRow["id"] ?></td>
                            <td><?= $relatedRow["name"] ?></td>
                            <td><?= $relatedRow["price"] ?>元/天</td>
                            <td><?= $relatedRow["deposit"] ?>元</td>
                            <td><?= round($relatedRow["price"] * 1.5) ?>元/天</td>
                            <td><?= $relatedRow["status"] == "true" ? "可出租" : "尚未歸還" ?></td>
                            <td><?= $relatedRow["created_at"] ?></td>
                            <td><?= $relatedRow["updated_time"] ?></td>
                            <td>
                                <a class="btn btn-primary m-1" href="edit-rent-product.php?id=<?= $relatedRow["id"] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a class="btn btn-secondary m-1" href="doDelete-rent-product.php?id=<?= $relatedRow["id"] ?>" onclick="return confirm('確定要刪除這個商品嗎？')"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>
                <p>沒有其他相同商品。</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>