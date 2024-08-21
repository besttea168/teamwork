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
    <!-- Bootstrap CSS v5.2.1 -->
    <?php include("../css.php"); ?>
</head>

<body>
    <div class="container">
        <div class="py-2">
            <a class="btn btn-primary" href="create-product.php"><i class="fa-solid fa-square-plus"></i></a>
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
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        <?php else: ?>
            目前沒有商品
        <?php endif; ?>
    </div>
</body>
<?php $conn->close(); ?>

</html>