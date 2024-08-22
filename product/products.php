<?php
require_once("../db_connect.php");

$sqlAll = "SELECT * FROM product WHERE valid = 1";
$resultAll = $conn->query($sqlAll);
$productCountAll = $resultAll->num_rows;

$page = 1; // 預設的頁數
$per_page = 6; // 每頁顯示的筆數
$start_item = 0; // 起始筆數

$total_page = ceil($productCountAll / $per_page); // 總頁數

if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $sql = "SELECT * FROM product WHERE name LIKE '%$search%' AND valid = 1";
} elseif (isset($GET["p"]) && isset($_GET["order"])) {
    $order = $GET["order"]; // 預設的排序
    $page = $GET["p"]; // 預設的頁數
    $start_item = ($page - 1) * $per_page; // 起始筆數

    switch($order){
        case 1:
            $sql = "SELECT * FROM product WHERE valid = 1  ORDER BY name LIMIT $start_item, $per_page";
    }
    
} else {
    // header("location: products.php?p=1&order=1");
    $sql = "SELECT * FROM product WHERE valid = 1 LIMIT $start_item, $per_page";
}

$result = $conn->query($sql);

if (isset($_GET["search"])) {
    $productCount = $result->num_rows;
} else {
    $productCount = $productCountAll;
}

?>
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
        <h1>商品列表</h1>
        <div class="py-2">
            <?php if (isset($_GET["search"])): ?>
                <a class="btn btn-primary" href="products.php" title="回使用者列表"><i class="fa-solid fa-left-long"></i></a>
            <?php endif; ?>
            <a class="btn btn-primary" href="create-product.php"><i class="fa-solid fa-square-plus"></i></a>
        </div>
        <div class="py-2">
            <form action="">
                <div class="input-group">
                    <input type="search" class="form-control" name="search" value="<?php echo isset($_GET["search"]) ? $_GET["search"] : "" ?>" placeholder="搜尋商品">
                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
        <div class="py-2">
            <div class="btn-group">
                <a class="btn btn-primary" href="">name 小到大</a>
            </div>
        </div>
        <?php if ($productCount > 0):
            $rows = $result->fetch_all(MYSQLI_ASSOC);
        ?>
            共有 <?= $productCount ?> 個商品
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>category</th>
                        <th>price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $product): ?>
                        <tr>
                            <td><?= $product["id"] ?></td>
                            <td><?= $product["name"] ?></td>
                            <td><?= $product["category"] ?></td>
                            <td><?= $product["price"] ?></td>
                            <td>
                                <a class="btn btn-primary" href="product.php?id=<?= $product["id"] ?>"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if (isset($GET["p"])): ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $total_page; $i++): ?>
                        <li class="page-item <?php if ($page == $i) echo "active"; ?>"><a class="page-link" href="products.php?p=<?= $i ?>&order=<?=$order?>"><?= $i ?></a></li>
                    <?php endfor; ?>
                </ul>
            </nav>
            <?php endif; ?>
        <?php else: ?>
            目前沒有商品
        <?php endif; ?>
    </div>
</body>
<?php $conn->close(); ?>

</html>