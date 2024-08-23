<?php
require_once("../db_connect.php");

// 獲取當前頁數並確保為正整數
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$per_page = 20; 
$start_item = ($page - 1) * $per_page;

// 獲取搜索參數，並確保它是安全的
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// 基本 SQL 查詢
$sql = "SELECT 
            rent_product.*,  
            product.name AS product_name, 
            product.image AS product_image
        FROM 
            rent_product 
        INNER JOIN 
            product 
        ON 
            rent_product.product_id = product.id";

// 如果有搜索條件，則添加 WHERE 子句
if ($search) {
    $sql .= " WHERE product.name LIKE '%$search%'";
}

// 添加排序和限制條件
$sql .= " ORDER BY rent_product.id ASC";

// 執行 SQL 查詢
$result = $conn->query($sql);

if (!$result) {
    die("Query Failed: " . $conn->error);
}

// 獲取結果集並計算總數
$rows = $result->fetch_all(MYSQLI_ASSOC);
$productCount = count($rows);
$total_page = ceil($productCount / $per_page);
$pagedRows = array_slice($rows, $start_item, $per_page);

?>
<!doctype html>
<html lang="zh-Hant">

<head>
    <title>桌遊租借管理</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <?php include("../css.php") ?>
</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>
    <div class="main-content">
        <div class="container py-4">
            <h1>商品租借列表</h1>

            <div class="py-2">
                <?php if ($search) : ?>
                    <a class="btn btn-secondary" href="rent_product_list.php" title="回商品租借列表"><i class="fa-solid fa-arrow-left"></i></a>
                <?php endif; ?>
                <a class="btn btn-secondary" href="create-coupon.php"><i class="fa-solid fa-plus"> 新增</i></a>
            </div>

            <div class="py-2">
                <form action="rent_product_list.php" method="GET">
                    <div class="input-group">
                        <input type="search" class="form-control" name="search" placeholder="請輸入商品名稱" value="<?php echo htmlspecialchars($search) ?>">
                        <button class="btn btn-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>

            <table class="table table-bordered table-hover align-middle">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>商品ID</th>
                        <th>商品名稱</th>
                        <th>商品圖片</th>
                        <th>商品租借價格</th>
                        <th>押金</th>
                        <th>商品出租狀態</th>
                        <th>上架時間</th>
                        <th>更新時間</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($productCount > 0) : ?>
                        <?php foreach ($pagedRows as $row) : ?>
                            <tr class="text-center">
                                <td><?= $row["id"] ?></td>
                                <td><?= $row["product_id"] ?></td>
                                <td><?= htmlspecialchars($row["product_name"]) ?></td>
                                <td><img src="../product_img/<?= htmlspecialchars($row["product_image"]) ?>" alt="<?= htmlspecialchars($row["product_name"]) ?>" width="100" /></td>
                                <td><?= htmlspecialchars($row["price"]) ?>/天</td>
                                <td><?= htmlspecialchars($row["deposit"]) ?></td>
                                <td><?= $row["status"] == "true" ? "可出租" : "尚未歸還" ?></td>
                                <td><?= htmlspecialchars($row["created_at"]) ?></td>
                                <td><?= htmlspecialchars($row["updated_time"]) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="9" class="text-center">尚無商品</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <?php if ($total_page > 1): ?>
                <nav>
                    <ul class="pagination justify-content-center">
                        <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>&search=<?= urlencode($search) ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            <?php endif; ?>

        </div>
    </div>
</body>

</html>
