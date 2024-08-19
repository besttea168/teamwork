<?php
require_once("../db_connect.php");

$sql = "SELECT * FROM product";
$result = $conn->query($sql);
$productCount = $result->num_rows;

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
</head>

<body>
    <div class="container">
        <?php if ($productCount > 0): 
            $rows=$result->fetch_all(MYSQLI_ASSOC);
            ?>
            共有 <?= $productCount ?> 個商品
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>category</th>
                        <th>price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $product): ?>
                        <tr>
                            <td><?= $product["id"] ?></td>
                            <td><?= $product["name"] ?></td>
                            <td><?= $product["category"] ?></td>
                            <td><?= $product["price"] ?></td>
                        </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            目前沒有商品
        <?php endif; ?>
    </div>
</body>
<?php $conn->close();?>
</html>