<?php
require_once("../db_connect.php");

$sqlAll = "SELECT * FROM product WHERE valid=1";
$resultAll = $conn->query($sqlAll);
$productCountAll = $resultAll->num_rows;

$page = 1; //第1頁
$start_item = 0;
$per_page = 20; //一頁要20筆資料

$total_page = ceil($productCountAll / $per_page); //計算分頁要幾頁

if (isset($_GET["search"])) {
    $search = $_GET["search"];

    //改改改改改
    $sql = "SELECT product.*, 
            GROUP_CONCAT(tags.name ORDER BY tags.name ASC SEPARATOR ', ') AS tags
            FROM product 
            LEFT JOIN product_tags ON product.id = product_tags.product_id
            LEFT JOIN tags ON product_tags.tag_id = tags.id
            WHERE product.name LIKE '%$search%' AND product.valid=1
            GROUP BY product.id";

} elseif (isset($_GET["p"]) && isset($_GET["order"])) {

    $order = $_GET["order"];
    $page = $_GET["p"];
    $start_item = ($page - 1) * $per_page;

    switch ($order) {
        case 1:
            $where_clause = "ORDER BY product.id ASC";
            break;
        case 2:
            $where_clause = "ORDER BY product.id DESC";
            break;
        case 3:
            $where_clause = "ORDER BY product.price ASC";
            break;
        case 4:
            $where_clause = "ORDER BY product.price DESC";
            break;
        default:
            header("Location: products.php?p=1&order=1");
    }

    //改改改改改
    $sql = "SELECT product.*, 
            GROUP_CONCAT(tags.name ORDER BY tags.name ASC SEPARATOR ', ') AS tags
            FROM product 
            LEFT JOIN product_tags ON product.id = product_tags.product_id
            LEFT JOIN tags ON product_tags.tag_id = tags.id
            WHERE product.valid=1
            GROUP BY product.id
            $where_clause
            LIMIT $start_item, $per_page";
} else {
    header("Location: products.php?p=1&order=1");
    exit;
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
    <title>products</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <?php include("../css.php") ?>
    <style>
        img {
            width: 100px;
            height: 100px;
        }

    </style>
</head>

<body>
    <div class="container">
        <h1>商品列表</h1>
        <div class="py-2">
            <?php if (isset($_GET["search"])) : ?>
                <a class="btn btn-primary" href="products.php" title="回商品列表"><i class="fa-solid fa-arrow-left"></i></a>
            <?php endif; ?>
            <?php if (!isset($_GET["search"])) : ?>
                <a class="btn btn-primary" href="create-product.php"><i class="fa-solid fa-square-plus"></i></a>
            <?php endif; ?>
        </div>

        <div class="py-2">
            <form action="">
                <div class="input-group">
                    <input type="search" class="form-control" name="search" placeholder="搜尋商品" value="<?php echo isset($_GET["search"]) ? $_GET["search"] : "" ?>">
                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>

        <?php if (isset($_GET["p"])) : ?>
            <div class="py-2 d-flex justify-content-end">
                <div class="btn-group">
                    <a title="id從小到大" class="btn btn-primary <?php if ($order == 1) echo "active" ?>" href="products.php?p=<?= $page ?>&order=1"><i class="fa-solid fa-arrow-down-1-9"></i></a>
                    <a title="id從大到小" class="btn btn-primary <?php if ($order == 2) echo "active" ?>" href="products.php?p=<?= $page ?>&order=2"><i class="fa-solid fa-arrow-down-9-1"></i></a>
                    <a title="price從小到大" class="btn btn-primary <?php if ($order == 3) echo "active" ?>" href="products.php?p=<?= $page ?>&order=3"><i class="fa-solid fa-dollar-sign"></i><i class="fa-solid fa-up-long"></i></a>
                    <a title="price從大到小" class="btn btn-primary <?php if ($order == 4) echo "active" ?>" href="products.php?p=<?= $page ?>&order=4"><i class="fa-solid fa-dollar-sign"></i><i class="fa-solid fa-down-long"></i></a>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($productCount > 0) :
            $rows = $result->fetch_all(MYSQLI_ASSOC);
        ?>
            共有<?= $productCount ?>個商品
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>商品id</th>
                        <th>商品名稱</th>
                        <th>圖片</th>
                        <th>類別</th>
                        <th>價格</th>
                        <th>創立日期</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($rows as $product) : ?>
                        <tr>
                            <td><?= $product["id"] ?></td>
                            <td><?= $product["name"] ?></td>
                            <td><img class="object-fit-cover" src="../product_img/<?= urlencode($product["image"]) ?>" alt="<?= $product["name"] ?>"></td>
                            <!-- 使用 PHP 的 urlencode 函數對圖片名稱進行編碼。這樣可以確保圖片名稱中的特殊字符被正確處理。 -->
                            <td><?= $product["tags"] ?></td>
                            <td><?= $product["price"] ?></td>
                            <td><?= $product["created_at"] ?></td>

                            <td>
                                <a class="btn btn-primary" href="product.php?id=<?= $product["id"] ?>"><i class="fa-solid fa-eye"></i></a>
                                <a class="btn btn-primary" href="product-edit.php?id=<?= $product["id"]?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php if (isset($_GET["p"])) : ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php
                        $visible_pages = 5; // Number of visible pagination links
                        $start_page = max(1, $page - floor($visible_pages / 2));
                        $end_page = min($total_page, $start_page + $visible_pages - 1);

                        if ($start_page > 1) {
                            echo '<li class="page-item"><a class="page-link" href="products.php?p=1&order=' . $order . '"> << </a></li>';
                        }

                        if ($page > 1) {
                            echo '<li class="page-item"><a class="page-link" href="products.php?p=' . ($page - 1) . '&order=' . $order . '"> < </a></li>';
                        }

                        for ($i = $start_page; $i <= $end_page; $i++) : ?>
                            <li class="page-item <?php if ($page == $i) echo "active"; ?>"><a class="page-link" href="products.php?p=<?= $i ?>&order=<?= $order ?>"><?= $i ?></a></li>
                        <?php endfor;

                        if ($page < $total_page) {
                            echo '<li class="page-item"><a class="page-link" href="products.php?p=' . ($page + 1) . '&order=' . $order . '"> > </a></li>';
                        }

                        if ($end_page < $total_page) {
                            echo '<li class="page-item"><a class="page-link" href="products.php?p=' . $total_page . '&order=' . $order . '"> >> </a></li>';
                        }
                        ?>
                    </ul>
                </nav>
            <?php endif; ?>

        <?php else : ?>
            目前沒有商品
        <?php endif; ?>
    </div>
</body>
<?php
$conn->close();
?>

</html>