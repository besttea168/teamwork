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
<html lang="en">

<head>
    <title>coupon<?= "->" . $title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <?php include("../css.php") ?>
</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>

    <div class="main-content">
        <div class="container py-4">


            <div class="row d-flex justify-content-center">
                <div class="col-5">

                    <div class="py-2">
                        <a class="btn btn-secondary" href="coupons.php" title="回優惠券列表"><i class="fa-solid fa-arrow-left"></i>返回</a>
                    </div>

                    <?php if ($couponCount > 0) : ?>
                        <H2 class="my-3">優惠券詳細</H2>

                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <td><?= $row["id"] ?></td>
                            </tr>

                            <tr>
                                <th>優惠券名稱</th>
                                <td><?= $row["name"] ?></td>
                            </tr>

                            <tr>
                                <th>優惠券代碼</th>
                                <td><?= $row["code"] ?></td>
                            </tr>

                            <tr>
                                <th>優惠券狀態</th>
                                <td><?= $row["valid"] == 1 ? "可使用" : "已停用" ?></td>
                            </tr>

                            <tr>
                                <th>折扣類型</th>
                                <td><?= $row["type"] == "percentage" ? "百分比" : "固定值" ?></td>
                            </tr>

                            <tr>
                                <th>折扣面額</th>
                                <td><?= number_format($row["discount"]) ?></td>
                            </tr>

                            <tr>
                                <th>可使用次數</th>
                                <td><?= number_format($row["usage_limit"]) ?></td>
                            </tr>

                            <tr>
                                <th>最低消費金額</th>
                                <td><?= number_format($row["min_spend"]) ?></td>
                            </tr>

                            <tr>
                                <th>開始日期</th>
                                <td><?= $row["start_date"] ?></td>
                            </tr>

                            <tr>
                                <th>到期日期</th>
                                <td><?= (empty($row["end_date"]) || $row["end_date"] == "0000-00-00") ? "未設定" : $row["end_date"] ?></td>
                            </tr>

                            <tr>
                                <th>建立時間</th>
                                <td><?= $row["created_time"] ?></td>
                            </tr>

                            <tr>
                                <th>更新時間</th>
                                <td><?= $row["updated_time"] ?></td>
                            </tr>

                        </table>

                        <div class="">
                            <a href="coupon-edit.php?id=<?= $row["id"] ?>" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"> 編輯</i></a>
                        </div>

                    <?php else : ?>
                        優惠券不存在
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>