<?php
require_once("../db_connect.php");

$sql = "SELECT 
                video.*,  
                product.name AS product_name, 
                product.image AS product_image,
                product.category_tag AS product_category
            FROM 
                video 
            INNER JOIN 
                product 
            ON 
                video.product_id = product.id  
            ORDER BY  
                video.id ASC";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$productCount = count($rows);


$sqlAll = "SELECT * FROM video WHERE valid=1";
$resultAll = $conn->query($sqlAll);
$videoCountAll = $resultAll->num_rows;

$page = 1;
$start_item = 0;
$per_page = 5;
$total_page = ceil($videoCountAll / $per_page);




if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $sql = "SELECT * FROM video WHERE title LIKE '%$search%' AND valid=1";
} elseif (isset($_GET["p"]) && isset($_GET["order"])) {
    $order = $_GET["order"];
    $page = $_GET["p"];
    $start_item = ($page - 1) * $per_page;

    switch ($order) {
        case 1:
            $where_clause = "ORDER BY id ASC";
            break;
        case 2:
            $where_clause = "ORDER BY id DESC";
            break;
        default:
            header("location:videos.php?p=1&order=1");
            break;
    }


    $sql = "SELECT * FROM video WHERE valid=1 $where_clause LIMIT $start_item, $per_page";
} else {
    header("location:videos.php?p=1&order=1");
}

$result = $conn->query($sql);

if (isset($_GET["search"])) {
    $videoCount = $result->num_rows;
} else {
    $videoCount = $videoCountAll;
}


$pagedRows = array_slice($rows,$start_item, $per_page,);

?>


<!doctype html>
<html lang="en">

<head>
    <title>教學影片管理</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <?php include("../css.php") ?>


</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>

    <div class="main-content">
        <div class="container py-4  ">
            <h1>教學影片管理列表</h1>
            <div class="py-2">
                <form action="">
                    <div class="input-group">
                        <input type="search" class="form-control" name="search" value="<?php echo isset($_GET["search"]) ? $_GET["search"] : "" ?>" placeholder="搜尋影片">
                        <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
            <div class="container d-flex justify-content-start p-0">
                <div class=" py-3">
                    <div class="btn-group py-2  ">
                        <?php if (isset($_GET["search"])) : ?>
                            <a class="btn btn-primary mx-3 rounded-2" href="videos.php" title="回教學影片列表"><i class="fa-solid fa-left-long"></i></a>
                        <?php endif; ?>
                        <a href="create-video.php" class="btn btn-primary rounded-2"><i class="fa-solid fa-square-plus"></i> 新增影片</a>
                    </div>
                </div>
            </div>


            <?php if ($videoCount > 0) :
                $rows = $result->fetch_all(MYSQLI_ASSOC);
            ?>

                共有 <?= $videoCount ?> 部教學影片
                <div class="container form-control border-0  px-0">
                    <table class="table table-bordered table-hover align-items-center">
                        <thead>
                            <tr class=" text-center">
                                <th>
                                    <?php if (isset($_GET["p"])) : ?>

                                        <div class="btn-group ">
                                            <a class="btn border-0 btn-secondary
                    <?php if ($order == 1) echo "active" ?>" href="videos.php?p=<?= $page ?>&order=1">
                                                <i class="fa-solid fa-arrow-down-short-wide fa-xs"></i>
                                            </a>
                                            <a class="btn border-0 btn-secondary
                    <?php if ($order == 2) echo "active" ?>
                    " href="videos.php?p=<?= $page ?>&order=2">
                                                <i class="fa-solid fa-arrow-up-short-wide fa-xs"></i>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    ID
                                </th>
                                <th>影片標題</th>
                                <th>圖片顯示</th>
                                <th>影片網址</th>
                                <th>影片長度</th>
                                <th>內容分類</th>
                                <th>上傳日期</th>
                                <th>最後更新</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pagedRows as $row) : ?>
                                <tr class="text-center">
                                    <td><?= $row["id"] ?></td>
                                    <td><?= $row["title"] ?></td>
                                    <td><img  src="../product_img/<?= urlencode($row["product_image"]) ?> " alt="" width="100" /></td>
                                    <td><a href="<?= $row["yt_url"] ?>"><?= $row["yt_url"] ?></a></td>
                                    <td><?= $row["video_duration"] ?></td>
                                    <td><?= ($row["product_category"]) ?></td>
                                    <td><?= date('Y-m-d', strtotime($row["created_time"])) ?></td>
                                    <td><?= date('Y-m-d', strtotime($row["updated_time"])) ?></td>
                                    <td>
                                        <a class="btn btn-secondary m-1" href="video-edit.php?id=<?= $row["id"] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-warning m-1" href="delete-video.php?id=<?= $row["id"] ?>"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php if (isset($_GET["p"])) : ?>
                    <nav aria-label="Page navigation example ">
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                                <li class="page-item 
                                <?php
                                if ($page == $i) echo "active";?>">
                                <a class="page-link" href="videos.php?p=<?= $i ?>&order=<?= $order ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                <?php endif; ?>
            <?php else : ?>
                沒有相關影片
            <?php endif; ?>
        </div>
    </div>

</body>
<?php $conn->close(); ?>

</html>