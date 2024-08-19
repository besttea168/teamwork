<?php
if (!isset($_GET["id"])) {
    echo "請正確帶入GET ID變數";
    exit;
}

require_once("../db_connect.php");

$id = $_GET["id"];
$sql = "SELECT * FROM coupons WHERE id = '$id'";
$result = $conn->query($sql);
$couponCount = $result->num_rows;
$row = $result->fetch_assoc();

if ($couponCount > 0) {

    $title = $row["name"];
} else {

    $title = "優惠券不存在";
}

?>


<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>coupon edit<?= "->" . $title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <div class="py-2">
            <a class="btn btn-secondary" href="coupons.php" title="回優惠券列表"><i class="fa-solid fa-arrow-left"></i></a>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-5">
                <?php if ($couponCount > 0) : ?>
                    <H2>優惠券編輯<?= "：" . $title ?></H2>
                    <form action="doUpdateCoupon.php" method="POST">
                        <table class="table table-bordered align-middle">
                            <tr>
                                <th>ID</th>
                                <td><?= $row["id"] ?></td>
                                <input type="hidden" name="id" value="<?= $row["id"] ?>">
                            </tr>

                            <tr>
                                <th>優惠券名稱</th>
                                <td>
                                    <input type="text" class="form-control" name="name" value="<?= $row["name"] ?>" required>
                                </td>
                            </tr>

                            <tr>
                                <th>優惠券代碼</th>
                                <td>
                                    <input type="text" class="form-control" name="code" value="<?= $row["code"] ?>" required>
                                </td>
                            </tr>

                            <tr>
                                <th>優惠券狀態</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="coupon_status" id="coupon_status2" value="1" <?= $row["valid"] == "1" ? "checked" : "" ?>>
                                        <label class="form-check-label" for="coupon_status1">
                                            啟用
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="coupon_status" id="coupon_status1" value="0" <?= $row["valid"] == "0" ? "checked" : "" ?>>

                                        <label class="form-check-label" for="coupon_status2">
                                            停用
                                        </label>
                                    </div>
                                </td>
                            </tr>


                            <tr>
                                <th>折扣類型</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="discount_type" id="discount_type_1" value="percentage" <?= $row["type"] == "percentage" ? "checked" : "" ?>>
                                        <label class="form-check-label" for="discount_type_1">
                                            百分比折扣
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="discount_type" id="discount_type_2" value="fixed" <?= $row["type"] == "fixed" ? "checked" : "" ?>>
                                        <label class="form-check-label" for="discount_type_2">
                                            固定數值折扣
                                        </label>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th>折扣面額</th>
                                <td>
                                    <input type="number" class="form-control" name="discount" id="discount_value" value="<?= $row["discount"] ?>" min="1" required>
                                </td>

                            </tr>

                            <tr>
                                <th>可使用次數</th>
                                <td>
                                    <input type="number" class="form-control" name="usage_limit" value="<?= $row["usage_limit"] ?>" min="0" value="0" required>
                                </td>
                            </tr>

                            <tr>
                                <th>最低消費金額</th>
                                <td>
                                    <input type="number" class="form-control" name="min_spend" value="<?= $row["min_spend"] ?>" min="0" value="0" required>
                                </td>
                            </tr>

                            <tr>
                                <th>開始日期</th>
                                <td>
                                    <input type="date" id="start_date" name="start_date" value="<?= $row["start_date"] ?>">
                                </td>
                            </tr>

                            <tr>
                                <th>到期日期</th>
                                <td>
                                    <input type="date" id="end_date" name="end_date" value="<?= $row["end_date"] == "0000-00-00" ? "" : $row["end_date"] ?>">
                                </td>
                            </tr>

                            <tr>
                                <th>建立時間</th>
                                <td>
                                    <?= $row["created_time"] ?>
                                </td>
                            </tr>
                        </table>

                        <div class="d-flex justify-content-between">
                            <button class="btn btn-secondary" type="submit"><i class="fa-solid fa-floppy-disk"> 儲存</i></button>

                            <a class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delButton"><i class="fa-solid fa-trash"> 刪除</i></a>
                        </div>
                    </form>


                    <!-- Modal -->
                    <div class="modal fade" id="delButton" tabindex="-1" aria-labelledby="delButtonLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="delButtonLabel">確定要刪除這筆資料嗎？</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <span class="text-danger">*刪除操作將永久移除該資料，是否繼續?*</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                                    <a type="button" class="btn btn-danger" href="doDeleteCoupon.php?id=<?= $row["id"] ?>">確認</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php else : ?>
                    優惠券不存在
                <?php endif; ?>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        // 判斷折扣數值輸入
        const percentageRadio = document.querySelector("#discount_type_1");
        const fixedRadio = document.querySelector("#discount_type_2");
        const discountValue = document.querySelector("#discount_value");

        function updateInput() {
            if (percentageRadio.checked) {
                discountValue.max = "99";
                discountValue.placeholder = "請輸入1-99之間的數值";
            } else {
                discountValue.removeAttribute('max'); //移除最大值
                discountValue.placeholder = "請輸入折扣金額";
            }
        }

        percentageRadio.addEventListener('change', updateInput);
        fixedRadio.addEventListener('change', updateInput);

        updateInput();
    </script>

    <script>
        // 判斷結束日期不能早於開始日期

        const startDateInput = document.querySelector('#start_date');
        const endDateInput = document.querySelector('#end_date');

        startDateInput.addEventListener('change', function() {
            endDateInput.min = this.value;
            if (endDateInput.value && endDateInput.value < this.value) {
                endDateInput.value = this.value;
            }
        });

        endDateInput.addEventListener('change', function() {
            if (this.value < startDateInput.value) {
                this.value = startDateInput.value;
            }
        });

        
    </script>
</body>


</html>