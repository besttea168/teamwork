<!doctype html>
<html lang="en">

<head>
    <title>create coupon</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <?php include("../css.php") ?>
</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>

    <div class="main-content">
        <div class="container py-2">
            <div class="row d-flex justify-content-center">

                <div class="col-5">
                    <div class="py-1">
                        <a class="btn btn-secondary" href="coupons.php" title="回優惠券列表"><i class="fa-solid fa-arrow-left"></i>返回</a>
                    </div>

                    <h2 class="text-center">建立新優惠券</h2>
                    <form action="doCreateCoupon.php" method="post">
                        <div class="mb-4">
                            <label class="form-label" for="name">優惠券名稱</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="code">優惠券代碼</label>
                            <input type="text" class="form-control" name="code" required>
                        </div>



                        <div class="mb-2">
                            <label class="form-label" for="discount_type">折價類型</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="discount_type" id="discount_type_1" value="percentage" checked>
                                <label class="form-check-label" for="discount_type_1">
                                    百分比折扣
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="discount_type" id="discount_type_2" value="fixed">
                                <label class="form-check-label" for="discount_type_2">
                                    固定數值折扣
                                </label>
                            </div>
                        </div>


                        <div class="mb-4">
                            <label class="form-label" for="discount">折價數值</label>
                            <input type="number" class="form-control" id="discount" name="discount" min="1" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="eventDate">優惠券有效期間：</label>

                            <input type="date" id="start_date" name="start_date" required>
                            至
                            <input type="date" id="end_date" name="end_date">
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="usage_limit">可使用次數</label>
                            <input type="number" class="form-control" name="usage_limit" min="0" value="0" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="min_spend">最低消費金額</label>
                            <input type="number" class="form-control" name="min_spend" min="0" value="0" required>
                        </div>

                        <div class="mb-4">
                            <label for="form-label">優惠券狀態</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="coupon_status" id="coupon_status2" value="1" checked>
                                <label class="form-check-label" for="coupon_status1">
                                    啟用
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="coupon_status" id="coupon_status1" value="0">

                                <label class="form-check-label" for="coupon_status2">
                                    停用
                                </label>
                            </div>
                        </div>

                        <button class="btn btn-secondary" type="submit">送出</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // 判斷折扣數值輸入
        const percentageRadio = document.querySelector("#discount_type_1");
        const fixedRadio = document.querySelector("#discount_type_2");
        const discountValue = document.querySelector("#discount");

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