<!-- <?php 
require_once("../db_connect.php");
$sql = "SELECT * FROM rent_product ORDER BY id ASC";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);




?> -->
<!doctype html>
<html lang="en">
    <head>
  <title>桌遊租借管理</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <?php include("../css.php")?>
    </head>

    <body>
       
        <div class="main-content">
            <div class="container py-4">
                <h1>商品租借列表</h1>

                <div class="py-2">
                <?php if (isset($_GET["search"])) : ?>
                    <a class="btn btn-secondary" href="rent_product_list.php" title="回商品租借列表"><i class="fa-solid fa-arrow-left"></i></a>
                <?php endif; ?>
                <a class="btn btn-secondary" href="create-coupon.php"><i class="fa-solid fa-plus"> 新增</i></a>
                </div>
                
                <div class="py-2">
                    <form action="">
                        <div class="input-group">
                            <input type="search" class="form-control" name="search" placeholder="請輸入商品名稱" value="<?php echo isset($_GET["search"]) ? $_GET["search"] : "" ?>">
                            <button class="btn btn-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
                
                <p>當前有 <span class="badge bg-secondary"><?= $filteredCount ?></span> 筆資料</p>
                <table class="table table-bordered table-hover align-middle">
                    <thead>
                        <tr class="text-center">
                            <th>ID <a href="<?= getSortUrl('id') ?>" class="text-decoration-none text-secondary"><?= getSortIcon('id') ?></a></th>
                            <th>商品名稱 <a href="<?= getSortUrl('name') ?>" class="text-decoration-none text-secondary"><?= getSortIcon('name') ?></a></th>
                            <th>商品租借價格</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($couponCount > 0) :
                            while ($row = $result->fetch_assoc()) : ?>
                                <tr class="text-center">
                                    <td><?= $row["id"] ?></td>
                                    <td><?= $row["name"] ?></td>
                                    <td><?= $row["price"] ?></td>
                                </tr>
                            <?php endwhile; else : ?>
                            <tr>
                                <td colspan="12" class="text-center">尚無商品</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </body>
</html>
