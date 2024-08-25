<?php
require_once("../db_connect.php");

// 查詢所有 `valid=1` 的商品
$sql = "SELECT 
            rp.*, 
            p.name AS name
        FROM 
            rent_product rp
        INNER JOIN 
            product p
        ON 
            rp.product_id = p.id  
        WHERE rp.valid = 1";

$result = $conn->query($sql);
$productCount = $result->num_rows;
?>

<!doctype html>
<html lang="en">

<head>
    <title>管理租借商品</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <?php include("../css.php"); ?>
</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>
    <div class="main-content">
        <div class="container py-4">
            <h1>管理租借商品</h1>
            <?php if ($productCount > 0): ?>
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
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row["id"] ?></td>
                            <td><?= $row["name"] ?></td>
                            <td><?= $row["price"] ?>元/天</td>
                            <td><?= $row["deposit"] ?>元</td>
                            <td><?= round($row["price"] * 1.5) ?>元/天</td>
                            <td><?= $row["status"] == "true" ? "可出租" : "尚未歸還" ?></td>
                            <td><?= $row["created_at"] ?></td>
                            <td><?= $row["updated_time"] ?></td>
                            <td>
                                <a class="btn btn-primary" href="product-edit.php?id=<?= $row["id"] ?>"><i class="fa-solid fa-pen-to-square"></i> 編輯</a>
                                <a class="btn btn-danger" href="rent_product_delete.php?id=<?= $row["id"] ?>" onclick="return confirm('確認刪除？')"><i class="fa-solid fa-trash"></i> 刪除</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>
                <p>目前沒有可管理的商品。</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
