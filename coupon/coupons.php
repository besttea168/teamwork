<?php
require_once("../db_connect.php");

//計算各狀態優惠券數量
$sqlAll = "SELECT * FROM coupons";
$sqlValid = "SELECT * FROM coupons WHERE valid = 1";
$sqlInvalid = "SELECT * FROM coupons WHERE valid = 0";

$resultAll = $conn->query($sqlAll);
$resultValid = $conn->query($sqlValid);
$resultInvalid = $conn->query($sqlInvalid);

$couponCountAll = $resultAll->num_rows;
$couponCountValid = $resultValid->num_rows;
$couponCountInvalid = $resultInvalid->num_rows;

$page = isset($_GET["p"]) ? $_GET["p"] : 1;
$sort = isset($_GET["sort"]) ? $_GET["sort"] : "id";
$order = isset($_GET["order"]) ? $_GET["order"] : "asc";
$filter = isset($_GET["filter"]) ? $_GET["filter"] : "all";
$type_filter = isset($_GET["type"]) ? $_GET["type"] : "all";
$search = isset($_GET["search"]) ? $_GET["search"] : "";

$start_item = ($page - 1) * 5;
$per_page = 5; //一頁要N筆資料

// 定義有效的排序列
$validColumns = ['id', 'name', 'code', 'valid', 'type', 'discount', 'start_date', 'end_date', 'updated_time', 'usage_limit', 'min_spend'];
$sort = in_array($sort, $validColumns) ? $sort : 'id';

// 根據過濾條件構建 SQL 查詢
$sql = "SELECT * FROM coupons WHERE 1=1";

if ($filter == "valid") {
    $sql .= " AND valid = 1";
} elseif ($filter == "invalid") {
    $sql .= " AND valid = 0";
}

if ($type_filter == "percentage") {
    $sql .= " AND type = 'percentage'";
} elseif ($type_filter == "fixed") {
    $sql .= " AND type = 'fixed'";
}

if ($search != "") {
    $search = $conn->real_escape_string($search);
    $sql .= " AND name LIKE '%$search%'";
}

// 添加排序
$sql .= " ORDER BY `$sort` $order";

// 計算總筆數
$totalItemsSql = str_replace("SELECT *", "SELECT COUNT(*) as count", $sql);
$totalItemsResult = $conn->query($totalItemsSql);
$totalItems = $totalItemsResult->fetch_assoc()['count'];
$total_page = ceil($totalItems / $per_page);

// 添加 LIMIT
$sql .= " LIMIT $start_item, $per_page";

$result = $conn->query($sql);
if ($result === false) {
    die("SQL 錯誤: " . $conn->error . "<br>SQL 查詢: " . $sql);
}

$couponCount = $result->num_rows;

// 排序 URL 生成函數
function getSortUrl($column)
{
    global $sort, $order, $filter, $page, $type_filter, $search;
    $newOrder = ($sort == $column && $order == 'asc') ? 'desc' : 'asc';
    $params = array(
        'filter' => $filter,
        'type' => $type_filter,
        'p' => $page,
        'sort' => $column,
        'order' => $newOrder
    );
    if ($search) {
        $params['search'] = $search;
    }
    return 'coupons.php?' . http_build_query($params);
}

// 排序圖標生成函數
function getSortIcon($column)
{
    global $sort, $order;
    if ($sort == $column) {
        return ($order == 'asc') ? '<i class="fa-solid fa-sort-up"></i>' : '<i class="fa-solid fa-sort-down"></i>';
    }
    return '<i class="fa-solid fa-sort"></i>';
}

// 新增：計算當前篩選後的資料筆數
$filteredCount = $totalItems;

// 新增一個函數來生成分頁 URL
function getPaginationUrl($page)
{
    global $filter, $type_filter, $sort, $order, $search;
    $params = array(
        'filter' => $filter,
        'type' => $type_filter,
        'sort' => $sort,
        'order' => $order,
        'p' => $page
    );
    if ($search) {
        $params['search'] = $search;
    }
    return 'coupons.php?' . http_build_query($params);
}

?>

<!doctype html>
<html lang="en" >

<head>
    <title>coupons</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <?php include("../css.php") ?>
</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>

    <div class="main-content">
        <div class="container py-4">
            <h1 class="text-center">優惠券列表</h1>

            <div class="py-2">
                <?php if (isset($_GET["search"])) : ?>
                    <a class="btn btn-secondary" href="coupons.php" title="回優惠券列表"><i class="fa-solid fa-arrow-left"></i></a>
                <?php endif; ?>
                <a class="btn btn-secondary" href="create-coupon.php"><i class="fa-solid fa-plus"> 新增</i></a>
            </div>

            <div class="py-2">
                <form action="">
                    <div class="input-group">
                        <input type="search" class="form-control" name="search" placeholder="請輸入優惠券名稱" value="<?php echo isset($_GET["search"]) ? $_GET["search"] : "" ?>">
                        <button class="btn btn-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>

            <div class="d-flex justify-content-around py-3">
                <div class="btn-group py-2">
                    <a href="coupons.php?filter=all" class="btn btn-outline-secondary <?php echo $filter == 'all' ? 'active' : ''; ?>">
                        全部
                    </a>
                    <a href="coupons.php?filter=valid" class="btn btn-outline-secondary <?php echo $filter == 'valid' ? 'active' : ''; ?>">
                        可使用
                    </a>
                    <a href="coupons.php?filter=invalid" class="btn btn-outline-secondary <?php echo $filter == 'invalid' ? 'active' : ''; ?>">
                        已停用
                    </a>
                </div>

                <div class="btn-group py-2">
                    <a href="coupons.php?filter=<?= $filter ?>&type=all" class="btn btn-outline-secondary <?php echo $type_filter == 'all' ? 'active' : ''; ?>">
                        全部
                    </a>
                    <a href="coupons.php?filter=<?= $filter ?>&type=percentage" class="btn btn-outline-secondary <?php echo $type_filter == 'percentage' ? 'active' : ''; ?>">
                        百分比
                    </a>
                    <a href="coupons.php?filter=<?= $filter ?>&type=fixed" class="btn btn-outline-secondary <?php echo $type_filter == 'fixed' ? 'active' : ''; ?>">
                        固定值
                    </a>
                </div>
            </div>

            <p>當前有 <span class="badge bg-secondary"><?= $filteredCount ?></span> 筆資料</p>
            <table class="table table-bordered table-hover align-middle">
                <thead>
                    <tr class="text-center">
                        <th>ID <a href="<?= getSortUrl('id') ?>" class="text-decoration-none text-secondary"><?= getSortIcon('id') ?></a></th>
                        <th>優惠券名稱 <a href="<?= getSortUrl('name') ?>" class="text-decoration-none text-secondary"><?= getSortIcon('name') ?></a></th>
                        <th>優惠券代碼 <a href="<?= getSortUrl('code') ?>" class="text-decoration-none text-secondary"><?= getSortIcon('code') ?></a></th>
                        <th>優惠券狀態</th>
                        <th>折扣類型</th>
                        <th>折扣面額 <a href="<?= getSortUrl('discount') ?>" class="text-decoration-none text-secondary"><?= getSortIcon('discount') ?></a></th>
                        <th>開始日期 <a href="<?= getSortUrl('start_date') ?>" class="text-decoration-none text-secondary"><?= getSortIcon('start_date') ?></a></th>
                        <th>到期日期 <a href="<?= getSortUrl('end_date') ?>" class="text-decoration-none text-secondary"><?= getSortIcon('end_date') ?></a></th>
                        <th>最後更新 <a href="<?= getSortUrl('updated_time') ?>" class="text-decoration-none text-secondary"><?= getSortIcon('updated_time') ?></a></th>
                        <th>可使用次數 <a href="<?= getSortUrl('usage_limit') ?>" class="text-decoration-none text-secondary"><?= getSortIcon('usage_limit') ?></a></th>
                        <th>最低消費金額 <a href="<?= getSortUrl('min_spend') ?>" class="text-decoration-none text-secondary"><?= getSortIcon('min_spend') ?></a></th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($couponCount > 0) :
                        while ($row = $result->fetch_assoc()) : ?>
                            <tr class="text-center">
                                <td><?= $row["id"] ?></td>
                                <td><?= $row["name"] ?></td>
                                <td><?= $row["code"] ?></td>
                                <td><?= $row["valid"] == 1 ? "可使用" : "已停用" ?></td>
                                <td><?= $row["type"] == "percentage" ? "百分比" : "固定值" ?></td>
                                <td class="text-end"><?= number_format($row["discount"]) ?></td>
                                <td><?= $row["start_date"] ?></td>
                                <td><?= (empty($row["end_date"]) || $row["end_date"] == "0000-00-00") ? "未設定" : $row["end_date"] ?></td>
                                <td><?= date('Y-m-d', strtotime($row["updated_time"])) ?></td>
                                <td><?= number_format($row["usage_limit"]) ?></td>
                                <td class="text-end"><?= number_format($row["min_spend"]) ?></td>
                                <td>
                                    <a class="btn btn-secondary m-1" href="coupon.php?id=<?= $row["id"] ?>"><i class="fa-solid fa-eye"></i></a>
                                    <a class="btn btn-secondary m-1" href="coupon-edit.php?id=<?= $row["id"] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                            </tr>
                        <?php endwhile;
                    else : ?>
                        <tr>
                            <td colspan="12" class="text-center">尚無優惠券</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <?php if ($total_page > 1) : ?>
                <nav class="my-5">
                    <div class="btn-group" role="group">
                        <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                            <a class="btn btn-outline-secondary <?php if ($page == $i) echo "active"; ?>"
                                href="<?= getPaginationUrl($i) ?>">
                                <?= $i ?>
                            </a>
                        <?php endfor ?>
                    </div>
                </nav>
            <?php endif; ?>
        </div>
    </div>
</body>
<?php
$conn->close();
?>

</html>