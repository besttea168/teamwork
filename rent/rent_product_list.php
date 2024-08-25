<?php
require_once("../db_connect.php");

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 5; // 每頁顯示的記錄數量
$start_item = ($page - 1) * $per_page;

// 取得搜尋條件
$search = isset($_GET['search']) ? $_GET['search'] : '';
$order = isset($_GET['order']) ? $_GET['order'] : 'asc'; // 預設為小到大排序

// 計算符合搜尋條件的總數量
$count_sql = "SELECT COUNT(DISTINCT rp.product_id) AS total
              FROM rent_product rp
              INNER JOIN product p ON rp.product_id = p.id
              WHERE (rp.product_id LIKE '%$search%' OR p.name LIKE '%$search%')
              AND rp.valid = 1"; // 加入 valid=1 的條件
$count_result = $conn->query($count_sql);
$total_rows = $count_result->fetch_assoc()['total'];
$total_page = ceil($total_rows / $per_page);

// 設定排序方式
$order_by = $order === 'desc' ? 'DESC' : 'ASC';

// 查詢包含分頁功能、搜尋功能並根據 product_id 排序
$sql = "SELECT 
            rp.product_id,
            COUNT(rp.product_id) AS product_count, 
            SUM(CASE WHEN rp.status = 'true' THEN 1 ELSE 0 END) AS available_count, -- 可出租的數量
            SUM(CASE WHEN rp.status = 'false' THEN 1 ELSE 0 END) AS rented_count,  -- 尚未歸還的數量
            MIN(rp.id) AS rent_product_id,  
            p.name AS product_name, 
            p.image AS product_image,
            MIN(rp.price) AS price,
            MIN(rp.deposit) AS deposit, 
            MIN(rp.created_at) AS created_at,
            MAX(rp.updated_time) AS updated_time
        FROM 
            rent_product rp
        INNER JOIN 
            product p 
        ON 
            rp.product_id = p.id  
        WHERE 
            (rp.product_id LIKE '%$search%' OR p.name LIKE '%$search%')
            AND rp.valid = 1  -- 加入 valid=1 的條件
        GROUP BY 
            rp.product_id, p.name, p.image
        ORDER BY  
            rp.product_id $order_by
        LIMIT $start_item, $per_page";

$result = $conn->query($sql);

if (!$result) {
    die("Query Failed: " . $conn->error);
}

$rows = $result->fetch_all(MYSQLI_ASSOC);
?>

<!doctype html>
<html lang="zh-Hant" data-bs-theme="light">

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

            <div class="d-flex justify-content-between align-items-center py-2">
                <div>
                    <?php if ($search): ?>
                        <a class="btn btn-secondary" href="rent_product_list.php" title="回商品租借列表"><i class="fa-solid fa-arrow-left"></i></a>
                    <?php endif; ?>
                    <a class="btn btn-primary" href="create-rent-product.php"><i class="fa-solid fa-plus"> 新增</i></a>
                </div>
                <div>
                    <!-- 選擇從大到小或從小到大 -->
                    <a class="btn btn-primary" href="?search=<?= $search ?>&order=asc&page=<?= $page ?>">ID<i class="fa-solid fa-arrow-up"></i></a>
                    <a class="btn btn-primary" href="?search=<?= $search ?>&order=desc&page=<?= $page ?>">ID<i class="fa-solid fa-arrow-down"></i></a>
                </div>
            </div>

            <div class="py-2">
                <form action="">
                    <div class="input-group">
                        <input type="search" class="form-control" name="search" placeholder="請輸入商品名稱或ID" value="<?php echo $search ?>">
                        <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>

            <table class="table table-bordered table-hover align-middle">
                <thead>
                    <tr class="text-center">
                        <th>商品ID</th>
                        <th>商品名稱</th>
                        <th>商品圖片</th>
                        <th>商品租借價格</th>
                        <th>押金</th>
                        <th>罰金</th>
                        <th>商品<br>總量</th>
                        <th>出租狀態</th>
                        <th>上架時間</th>
                        <th>最後更新時間</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0) : ?>
                        <?php foreach ($rows as $row) : ?>
                            <tr class="text-center">
                                <td><?= $row["product_id"] ?></td>
                                <td><?= $row["product_name"] ?></td>
                                <td><img src="../product_img/<?= urlencode($row["product_image"]) ?>" alt="" width="100" /></td>
                                <td><?= $row["price"] ?>元/天</td>
                                <td><?= $row["deposit"] ?>元</td>
                                <td><?= round($row["price"] * 1.5) ?>元/天</td>
                                <td><?= $row["product_count"] ?></td> <!-- 顯示商品總量 -->
                                <td>
                                    可出租: <?= $row["available_count"] ?><br>
                                    尚未歸還: <?= $row["rented_count"] ?>
                                </td>
                                <td><?= $row["created_at"] ?></td>
                                <td><?= $row["updated_time"] ?></td>
                                <td>
                                    <a class="btn btn-primary m-1" href="edit-same-rent-product.php?id=<?= $row["rent_product_id"] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a class="btn btn-secondary m-1" href="rent-product.php?id=<?= $row["rent_product_id"] ?>"><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="12" class="text-center">尚無符合條件的商品</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- 分頁按鈕 -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <!-- 上一頁 -->
                    <li class="page-item <?php if ($page <= 1) {
                                                echo 'disabled';
                                            } ?>">
                        <a class="page-link" href="<?php if ($page > 1) {
                                                        echo "?search=$search&order=$order&page=" . ($page - 1);
                                                    } ?>">上一頁</a>
                    </li>

                    <!-- 如果總頁數大於 7，則顯示縮減的頁碼 -->
                    <?php
                    $start = max(1, $page - 2);
                    $end = min($total_page, $page + 2);

                    if ($start > 1) {
                        echo '<li class="page-item"><a class="page-link" href="?search=' . $search . '&order=' . $order . '&page=1">1</a></li>';
                        if ($start > 2) {
                            echo '<li class="page-item disabled"><a class="page-link">...</a></li>';
                        }
                    }

                    for ($i = $start; $i <= $end; $i++): ?>
                        <li class="page-item <?php if ($i == $page) {
                                                    echo 'active';
                                                } ?>">
                            <a class="page-link" href="?search=<?= $search ?>&order=<?= $order ?>&page=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                    <?php endfor;

                    if ($end < $total_page) {
                        if ($end < $total_page - 1) {
                            echo '<li class="page-item disabled"><a class="page-link">...</a></li>';
                        }
                        echo '<li class="page-item"><a class="page-link" href="?search=' . $search . '&order=' . $order . '&page=' . $total_page . '">' . $total_page . '</a></li>';
                    }
                    ?>

                    <!-- 下一頁 -->
                    <li class="page-item <?php if ($page >= $total_page) {
                                                echo 'disabled';
                                            } ?>">
                        <a class="page-link" href="<?php if ($page < $total_page) {
                                                        echo "?search=$search&order=$order&page=" . ($page + 1);
                                                    } ?>">下一頁</a>
                    </li>
                </ul>
            </nav>

            <?php
            $conn->close();
            ?>
        </div>
    </div>
</body>

</html>