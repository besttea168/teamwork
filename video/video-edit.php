<?php
if (!isset($_GET["id"])) {
    echo "請正確帶入 get id 變數";
    exit;
}



$id = $_GET["id"];

require_once("../db_connect.php");

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


        <div class="container py-5 mt-5">
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
                            <th>商品id</th>
                            <td>
                                <input type="text"
                                    class="form-control"
                                    name="product_id"
                                    value="<?= $row["product_id"]
                                            ?>">
                            </td>
                        </tr>

                        <tr>
                            <th>網址</th>
                            <td class="text-break">
                                <input type="text" class="form-control text-break" name="yt_url" id="yt-url" value="<?= $row["yt_url"] ?>" oninput="updateVideoPreview()">
                            </td>
                        </tr>
                        <tr>
                            <th>預覽</th>
                            <td class="text-break">
                                <iframe id="videoPreview" width="560" height="315" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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

                        <a class="btn btn-warning m-1" href="dodelete-video.php?id=<?= $row["id"] ?>" onclick="return confirm('確定刪除這支影片嗎?')"><i class="fa-solid fa-trash"></i></a>

                    </div>

                </form>
            <?php else : ?>
                使用者不存在
            <?php endif; ?>
        </div>
    </div>
    <script>
        function updateVideoPreview() {
            var url = document.getElementById("yt-url").value;
            var videoId = extractVideoID(url);

            if (videoId) {
                var iframe = document.getElementById("videoPreview");
                iframe.src = "https://www.youtube.com/embed/" + videoId;
            } else {
                document.getElementById("videoPreview").src = ""; // 如果URL無效，清空iframe
            }
        }

        function extractVideoID(url) {
            var regex = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
            var matches = url.match(regex);
            return matches ? matches[1] : null;
        }

        window.onload = function() {
            updateVideoPreview();
        }
    </script>

</body>

</html>