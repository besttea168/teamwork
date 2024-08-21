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
    $sql = "SELECT * FROM product WHERE name LIKE '%$search%' AND valid=1";
} elseif (isset($_GET["p"]) && isset($_GET["order"])) {

    $order = $_GET["order"];
    $page = $_GET["p"];
    $start_item = ($page - 1) * $per_page;

    switch ($order) {
        case 1:
            $where_clause = "ORDER BY id ASC";
            break;

        case 2:
            $where_clause = "ORDER BY id DESC";
            break;

        case 3:
            $where_clause = "ORDER BY name ASC";
            break;

        case 4:
            $where_clause = "ORDER BY name DESC";
            break;
        
        default:
            header("Location: products.php?p=1&order=1");
    }

    $sql = "SELECT * FROM product WHERE valid=1 $where_clause LIMIT $start_item, $per_page";
} else {

    header("Location: products.php?p=1&order=1");
    exit;
    // $sql = "SELECT * FROM users WHERE valid=1 LIMIT $start_item, $per_page";
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
        img{
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
            <a class="btn btn-primary" href="create-product.php"><i class="fa-solid fa-square-plus"></i></a>
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
                    <a class="btn btn-primary <?php if ($order == 1) echo "active" ?>" href="products.php?p=<?= $page ?>&order=1"><i class="fa-solid fa-arrow-down-1-9"></i></a>
                    <a class="btn btn-primary <?php if ($order == 2) echo "active" ?>" href="products.php?p=<?= $page ?>&order=2"><i class="fa-solid fa-arrow-down-9-1"></i></a>
                    <a class="btn btn-primary <?php if ($order == 3) echo "active" ?>" href="products.php?p=<?= $page ?>&order=3"><i class="fa-solid fa-arrow-down-a-z"></i></a>
                    <a class="btn btn-primary <?php if ($order == 4) echo "active" ?>" href="products.php?p=<?= $page ?>&order=4"><i class="fa-solid fa-arrow-down-z-a"></i></a>
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
                        <th>id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Category_tag</th>
                        <th>Price</th>
                        <th>Create_at</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($rows as $product) : ?>
                        <tr>
                            <td><?= $product["id"] ?></td>
                            <td><?= $product["name"] ?></td>
                            <td><img class="object-fit-cover" src="../product_img/<?= urlencode($product["image"]) ?>" alt="<?= $product["name"] ?>"></td>
                            <td><?= $product["category_tag"] ?></td>
                            <td><?= $product["price"] ?></td>
                            <td><?= $product["created_at"] ?></td>
                            <td>
                                <a class="btn btn-primary" href="product.php?id=<?= $product["id"] ?>"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php if (isset($_GET["p"])) : ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                            <li class="page-item <?php if ($page == $i) echo "active"; ?>"><a class="page-link" href="products.php?p=<?= $i ?>&order=<?= $order ?>"><?= $i ?></a></li>
                        <?php endfor ?>
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