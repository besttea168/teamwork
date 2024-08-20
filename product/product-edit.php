<?php
if (!isset($_GET["id"])) {
    echo "請正確帶入 get id 變數";
    exit;
}
$id = $_GET["id"];

require_once("../db_connect.php");

$sql = "SELECT * FROM product WHERE id= '$id' ";

$result = $conn->query($sql);
$productCount = $result->num_rows;
$row = $result->fetch_assoc();

if ($productCount > 0) {
    $title = $row["name"];
}else{
    $title = "沒有此商品";
}

?>
<!doctype html>
<html lang="en">

<head>
    <title><?=$title?></title>
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
        <div class="py-2">
            <a class="btn btn-primary" href="products.php?id=<?= $row["id"]?>" title="回產品"><i class="fa-solid fa-left-long"></i></a>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h1>修改商品資料</h1>
                <?php if ($productCount > 0): ?>
                    <form action="doUpdateProduct.php" method="post">
                    <table class="table table-bordered">
                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                        <tr>
                            <th>id</th>
                            <td><?= $row["id"] ?></td>
                        </tr>
                        <tr>
                            <th>name</th>
                            <td>
                                <input type="text" class="form-control" name="name" value="<?= $row["name"] ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>category</th>
                            <td>
                                <input type="text" class="form-control" name="category" value="<?= $row["category"] ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>price</th>
                            <td>
                                <input type="text" class="form-control" name="price" value="<?= $row["price"] ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>created_at</th>
                            <td><?= $row["created_at"] ?></td>
                        </tr>
                    </table>
                    <div>
                        <button class="btn btn-primary" type="submit">
                            儲存
                        </button>
                    </div>
                    </form>
                <?php else: ?>
                    沒有此商品
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>