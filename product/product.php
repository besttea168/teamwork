<?php
if (!isset($_GET["id"])) {
    echo "請正確帶入 get id 變數";
    exit;
}
$id = $_GET["id"];

require_once("../db_connect.php");

$sql = "SELECT * FROM product WHERE id= '$id' AND valid = 1";

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
        <div class="container">
            <div class="py-2">
                <a class="btn btn-primary" href="products.php" title="回產品列表"><i class="fa-solid fa-left-long"></i></a>
            </div>
            <h1>產品資訊</h1>
            <div class="row">
                <div class="col-lg-4">
                    <?php if ($productCount > 0): ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>id</th>
                                <td><?= $row["id"] ?></td>
                            </tr>
                            <tr>
                                <th>name</th>
                                <td><?= $row["name"] ?></td>
                            </tr>
                            <tr>
                                <th>category</th>
                                <td><?= $row["category_tag"] ?></td>
                            </tr>
                            <tr>
                                <th>price</th>
                                <td><?= $row["price"] ?></td>
                            </tr>
                            <tr>
                                <th>created_at</th>
                                <td><?= $row["created_at"] ?></td>
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