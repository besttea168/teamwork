<?php
require_once("../db_connect.php");

// 獲取搜索、排序和分頁參數
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$sort = isset($_GET['sort']) ? $conn->real_escape_string($_GET['sort']) : 'id';
$order = isset($_GET['order']) ? $conn->real_escape_string($_GET['order']) : 'ASC';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 10; // 每頁顯示的記錄數

// 準備 SQL 查詢
$sql = "SELECT * FROM users WHERE valid=0 AND name LIKE '%$search%' ORDER BY $sort $order";
$count_sql = "SELECT COUNT(*) as total FROM users WHERE valid=0 AND name  LIKE '%$search%'";

// 計算總記錄數和總頁數
$result = $conn->query($count_sql);
$row = $result->fetch_assoc();
$total_records = $row['total'];
$total_pages = ceil($total_records / $per_page);

// 計算 LIMIT 子句
$offset = ($page - 1) * $per_page;

// 執行分頁查詢
$sql .= " LIMIT $offset, $per_page";
$result = $conn->query($sql);


$sql_userCount = "SELECT * FROM users WHERE valid=0";
$result_userCount = $conn->query($sql_userCount);
$userCount = $result_userCount->num_rows;
$P_userCount = $result->num_rows;

?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>已封鎖使用者</title>
    <style>
        a {
            text-decoration: none;
        }
    </style>
    <?php include("../css.php") ?>

</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>
    <div class="main-content">
        <div class="container">
            <div class="d-flex">
                <div class="m-2">
                    <button class="btn btn-primary"><a href="users.php"><i style="color:white" class="fa-solid fa-arrow-left"></i></a></button>
                </div>
                <div>
                    <h1 class="text-danger">已封鎖使用者</h1>
                </div>
            </div>
            <form class="search-form m-3" method="GET">
                <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="搜尋名子">
                <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <div class="d-flex justify-content-between">
                <div class="mb-2">
                    排序：
                    <button class="btn btn-secondary" onclick="sortBy('id', 'ASC')">↑</button>
                    <button class="btn btn-secondary" onclick="sortBy('id', 'DESC')">↓</button>
                    <!-- <button onclick="sortBy('name', 'ASC')">名稱 升序</button>
            <button onclick="sortBy('name', 'DESC')">名稱 降序</button> -->
                </div>
                <div class="mt-2">
                    <p>共有:&nbsp; <span class="text-success"> <?= $userCount ?></span>&nbsp; 位使用者</p>
                </div>
            </div>

            <?php if ($result->num_rows > 0): ?>
                <table class="table table-bordered text-center border-secondary ">
                    <tr>
                        <td>id</td>
                        <td>帳號</td>
                        <td>姓名</td>
                        <td>信箱</td>
                        <td>電話</td>
                        <td>地址</td>
                        <td>性別</td>
                        <td>生日</td>
                        <td>valid</td>
                        <td>註冊時間</td>
                        <td>恢復</td>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['account']); ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td><?php echo htmlspecialchars($row['address']); ?></td>
                            <td><?php echo htmlspecialchars($row['gender']); ?></td>
                            <td><?php echo htmlspecialchars($row['birthday']); ?></td>
                            <td><?php echo htmlspecialchars($row['valid']); ?></td>
                            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                            <td> <a href="do-reset-users.php?id=<?= $row["id"] ?>"><i class="fa-solid fa-rotate-right"></i></a> </td>
                        </tr>
                    <?php endwhile; ?>
                </table>



                <nav aria-label="" class="justify-content-center d-flex">
                    <ul class="pagination pagination-sm">
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item <?php if ($page == $i) echo "active"; ?>" aria-current="">

                                <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>&sort=<?php echo $sort; ?>&order=<?php echo $order; ?>" <?php echo $page == $i ? 'class="active"' : ''; ?>><?php echo $i; ?></a>

                            <?php endfor; ?>
                            </li>

                    </ul>
                </nav>
                <p class="text-end">有:&nbsp;<?= $P_userCount ?>&nbsp;位/頁</p>
            <?php else: ?>
                <table class="table table-bordered  text-center ">
                    <tr>
                        <td>id</td>
                        <td>帳號</td>
                        <td>姓名</td>
                        <td>信箱</td>
                        <td>電話</td>
                        <td>地址</td>
                        <td>性別</td>
                        <td>生日</td>
                        <td>valid</td>
                        <td>註冊時間</td>
                        <td>修改</td>
                        <td>封鎖</td>
                    </tr>
                <?php endif; ?>
        </div>
    </div>

    <script>
        function sortBy(field, order) {
            var urlParams = new URLSearchParams(window.location.search);
            urlParams.set('sort', field);
            urlParams.set('order', order);
            window.location.search = urlParams.toString();
        }
    </script>
</body>

</html>

<?php
// 關閉連接
$conn->close();
?>