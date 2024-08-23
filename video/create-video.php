<!doctype html>
<html lang="en">

<head>
    <title>create-video</title>
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
        <div class="container">
            <h1 class="pt-4 ">新增影片</h1>
            <div class=" py-3">
                <a href="videos.php" title="回影片列表" class="btn btn-secondary"><i class="fa-solid fa-left-long"></i></a>
            </div>
            <form action="docreate-video.php" method="post">
                <div class="mb-2">
                    <label class="form-label" for="title"><span class="text-danger">*</span>標題Title</label>
                    <input type="text" class="form-control" name="title" placeholder="影片標題">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="url"><span class="text-danger">*</span>YT網址</label>
                    <input type="text" class="form-control" name="yt_url" placeholder="輸入網址">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="category">分類</label>
                    <input type="text" class="form-control" name="category" placeholder="輸入分類">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="Video_duration">影片長度</label>
                    <input type="text" class="form-control" name="Video_duration" placeholder="ex: 0:00">
                </div>
                <button
                    type="submit"
                    class="btn btn-primary">送出</button>
            </form>
        </div>
    </div>
</body>

</html>