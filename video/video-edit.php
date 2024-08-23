<?php
if (!isset($_GET["id"])) {
    echo "請正確帶入 get id 變數";
    exit;
}

$id = $_GET["id"];

require_once("./db_connect.php");

$sql = "SELECT * FROM video
WHERE id = '$id'
";

$result = $conn->query($sql);
$videoCount = $result->num_rows;
$row = $result->fetch_assoc();

if ($videoCount > 0) {
    $title = $row["title"];
} else {
    $title = "使用者不存在";
}


?>
<!doctype html>
<html lang="en">

<head>



    <title><?= $title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <?php include("../css.php") ?>
</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>

    <div class="container ">


        <div class="col-lg-5">
            <h1>修改資料</h1>
            <div class="py-4 ">
                <a class="btn btn-primary" href="videos.php?id=<?= $row["id"] ?>" title="回影片列表"><i class="fa-solid fa-left-long"></i></a>
            </div>
            <?php if ($videoCount > 0) : ?>
                <form action="doupdateVideo.php" method="post">
                    <table class="table table-bordered">
                        <input type="hidden" name="id"
                            value="<?= $row["id"] ?>">
                        <tr>
                            <th>id</th>
                            <td><?= $row["id"] ?></td>
                        </tr>
                        <tr>
                            <th>標題</th>
                            <td>
                                <input type="text"
                                    class="form-control"
                                    name="title"
                                    value="<?= $row["title"]
                                            ?>">
                            </td>
                        </tr>

                        <tr>
                            <th>網址</th>
                            <td class="text-break">
                                <input type="text"
                                    class="form-control text-break"
                                    name="yt_url"
                                    value="<?= $row["yt_url"]
                                            ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>分類</th>
                            <td>
                                <input type="text"
                                    class="form-control"
                                    name="category"
                                    value="<?= $row["category"]
                                            ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>影片長度</th>
                            <td><input type="text"
                                    class="form-control"
                                    name="video_duration"
                                    value="<?= $row["video_duration"]
                                            ?>">
                            </td>
                        </tr>
                    </table>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary"
                            type="submit"><i class="fa-solid fa-folder-minus"></i></button>

                        <a class="btn btn-warning" href="doDeleteUvideo.php?id=<?= $row["id"] ?>">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>

                </form>
            <?php else : ?>
                使用者不存在
            <?php endif; ?>
        </div>
    </div>


</body>

</html>