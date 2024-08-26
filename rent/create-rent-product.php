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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?php include("../css.php"); ?>
    <style>
        #productImage {
            max-width: 150px;
            display: none;
        }
    </style>
</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>

    <div class="main-content">
        <div class="container py-4">
            <h1>新增租借商品</h1>
            <div class="py-2">
                <a class="btn btn-primary" href="rent_product_list.php" title="回產品列表"><i class="fa-solid fa-left-long"></i> 回產品列表</a>
            </div>
            <form action="doCreate-rent-Product.php" method="post">
                <div class="mb-2">
                    <label class="form-label h2 py-2" for="search">搜尋商品</label>
                    <input type="text" class="form-control mb-3" id="search" placeholder="輸入商品名稱以搜尋">
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="select">
                        <option selected>選擇要出租的商品</option>
                        <?php foreach ($rows as $product): ?>
                            <option value="<?= $product["id"] ?>" data-image="<?= $product["image"] ?>" data-price="<?= $product["price"] ?>"><?= $product["name"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-2">
                    <label class="form-label h2 py-2" for="name">商品清單</label>
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr class="text-center">
                                <th class="h4">目前選擇產品ID</th>
                                <th class="h4">目前選擇產品名稱</th>
                                <th class="h4">商品圖片</th>
                                <th class="h4">價格</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td id="id" class="h4">未選擇</td>
                                <td id="name" class="h4">未選擇</td>
                                <td id="img-box"><img id="productImage" src="" alt="選擇的商品圖片"></td>
                                <td id="price" class="h4">原本價格: <span id="originalPrice"></span><br> 建議押金價格: <span id="suggestedDeposit"></span></td>
                            </tr>
                            <input type="hidden" name="id" value="" id="hiddenInput">
                        </tbody>
                    </table>
                </div>

                <div class="mb-2">
                    <label class="form-label h2 py-2" for="price">產品租借價格</label>
                    <input type="number" class="form-control" name="price" required>
                </div>

                <div class="mb-2">
                    <label class="form-label h2 py-2" for="deposit">產品租借押金</label>
                    <input type="number" class="form-control" name="deposit" required>
                </div>

                <div class="mb-2">
                    <label class="form-label h2 py-2" for="amount">新增商品數量</label>
                    <input type="number" class="form-control" name="amount" min="1" required>
                </div>

                <input type="hidden" name="status" value="true">

                <button class="btn btn-primary" type="submit">送出</button>
            </form>
        </div>
    </div>
    <script>
            document.addEventListener("DOMContentLoaded", function() {
            const search = document.querySelector("#search");
            const select = document.querySelector("#select");
            const productImage = document.querySelector("#productImage");
            const originalPrice = document.querySelector("#originalPrice");
            const suggestedDeposit = document.querySelector("#suggestedDeposit");

            search.addEventListener("input", function() {
                const filter = search.value.toLowerCase();
                const options = select.querySelectorAll("option:not([value=''])");
                let hasVisibleOptions = false;

                options.forEach(option => {
                    const text = option.textContent.toLowerCase();
                    if (text.includes(filter)) {
                        option.style.display = "";
                        hasVisibleOptions = true;
                    } else {
                        option.style.display = "none";
                    }
                });

                if (!hasVisibleOptions) {
                    if (!document.querySelector("#no-match-option")) {
                        const noMatchOption = document.createElement("option");
                        noMatchOption.id = "no-match-option";
                        noMatchOption.textContent = "無相關商品";
                        noMatchOption.disabled = true;
                        noMatchOption.selected = true;
                        select.appendChild(noMatchOption);
                    }
                } else {
                    const noMatchOption = document.querySelector("#no-match-option");
                    if (noMatchOption) {
                        noMatchOption.remove();
                    }
                }
            });

            select.addEventListener("change", function() {
                const selectedOption = select.options[select.selectedIndex];
                const productId = selectedOption.value;
                const productName = selectedOption.textContent;
                const imageSrc = selectedOption.getAttribute("data-image");
                const price = selectedOption.getAttribute("data-price");

                if (productId) {
                    document.querySelector("#id").textContent = productId;
                    document.querySelector("#name").textContent = productName;
                    document.querySelector("#hiddenInput").value = productId;

                    if (imageSrc) {
                        productImage.src = "../product_img/" + encodeURIComponent(imageSrc);
                        productImage.style.display = "block";
                    } else {
                        productImage.style.display = "none";
                    }

                    if (price) {
                        originalPrice.textContent = price + " 元";
                        suggestedDeposit.textContent = Math.round(price * 0.8) + " 元";
                    } else {
                        originalPrice.textContent = "未選擇";
                        suggestedDeposit.textContent = "未選擇";
                    }
                } else {
                    // Reset to default "未選擇" state
                    document.querySelector("#id").textContent = "未選擇";
                    document.querySelector("#name").textContent = "未選擇";
                    document.querySelector("#hiddenInput").value = "";
                    productImage.style.display = "none";
                    originalPrice.textContent = "未選擇";
                    suggestedDeposit.textContent = "未選擇";
                }
            });
        });



    </script>
</body>

</html>
