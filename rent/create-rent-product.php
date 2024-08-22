<?php
require_once("../db_connect.php");
$sql = "SELECT * FROM product ORDER BY id ASC";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);




?>
<!doctype html>
<html lang="en">

<head>
    <title>新增租借商品</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />


    <?php include("../css.php"); ?>
</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>

    <div class="main-content">
        <div class="container py-4">
            <h1>新增租借商品</h1>
            <div class="py-2">
                <a class="btn btn-primary" href="products.php" title="回產品列表"><i class="fa-solid fa-left-long"></i></a>
            </div>
            <form action="doCreate-rent-Product.php" method="post">
                <div class="mb-2">
                    <label class="form-label" for="name">租借產品</label>
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr class="text-center">
                                <th>目前選擇產品ID</th>
                                <th>目前選擇產品名稱</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td id="id"><input type="hidden" name="id" value="id">未選擇</td>
                                <td> <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="select">
                                        <option selected>選擇要出租的商品</option>
                                        <?php foreach ($rows as $product): ?>
                                            <option value="<?= $product["id"] ?>" project_id="<?= $product["id"] ?>"> <?= $product["name"] ?></option>
                                        <?php endforeach; ?>
                                    </select></td>

                            </tr>
                            
                                    
                                    
                                    <input type="hidden" name="id" value="" id="hiddenInput">
                                
                        </tbody>
                    </table>


                </div>
                <div class="mb-2">
                    <label class="form-label" for="price">產品租借價格</label>
                    <input type="number" class="form-control" name="price" required>
                </div>

                <div class="mb-2">
                    <label class="form-label" for="deposit">產品租借押金</label>
                    <input type="number" class="form-control" name="deposit" required>
                </div>

                <div class="mb-2">
                    <label class="form-label" for="amount">新增商品數量</label>
                    <input type="number" class="form-control" name="amount" min="1" required>
                </div>

                <input type="hidden" name="status" value="true" >

                <button class="btn btn-primary" type="submit">送出</button>
            </form>


        </div>
    </div>
    <script>

        document.addEventListener("DOMContentLoaded", function() {
            const select = document.querySelector("#select");
            const showId = document.querySelector("#id");
            const showName = document.querySelector("#name");
            const hiddenInput = document.querySelector("#hiddenInput");

            select.addEventListener("change", () => {
                const option = select.options[select.selectedIndex];
                console.log("Selected Option:", option); // Debugging Line
                const productId = option.value;

                showId.innerHTML = productId ? productId : "未選擇";

                hiddenInput.value = productId;
             
            });
        });
    </script>
</body>

</html>