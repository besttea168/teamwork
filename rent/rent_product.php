<?php
if (!isset($_GET["id"])) {
    echo "請正確帶入 get id 變數";
    exit;
}
$id = $_GET["id"];

require_once("../db_connect.php");

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
            ";


$result = $conn->query($sql);
$productCount = $result->num_rows;
$row = $result->fetch_assoc();

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
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>
    <div class="main-content">
        <div class="container py-4">
            <div class="py-2">
                <a class="btn btn-primary" href="rent_product_list.php" title="回產品列表"><i class="fa-solid fa-left-long"></i>回租借產品列表</a>
            </div>
            <h1>產品資訊</h1>
            <div class="row">
                <div class="col-lg-4">
                    <?php if ($productCount > 0): ?>
                        <table class="table table-bordered">
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
                        <div>
                            <a class="btn btn-primary" href="product-edit.php?id=<?= $row["id"] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        </div>
                    <?php else: ?>
                        沒有此商品
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
<?php $conn->close(); ?>

</html>