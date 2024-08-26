<?php
include 'db_connect.php';
/*if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM article_main WHERE id = $id";
    $result = $conn->query($sql);
    $article = $result->fetch_assoc();
}*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $description = $_POST['description'];
    $sql = "UPDATE article_main SET title='$title', content='$content', description='$description'  WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: mainArticle.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM article_main WHERE id=$id";
    $result = $conn->query($sql);
    $article = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <title>修改文章</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
        <?php include("../css.php") ?>
        <?php include("style.php") ?>
        <style>
            textarea {
                height: 500px;
                width: 100%;
                resize: none;
            }
            a{

            }
        </style>
    </head>
</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>
    <main class="main-content pp-3 px-3">
        <h1>修改文章</h1>
        <hr>
       
        
        <div class="container text-editor">
            <div class="mb-3 pt-3">
                <form action="edit.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
                    <label class="form-label" for="title">標題:</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $article['title']; ?>" required>
                    <br>
                    <label class="form-label" for="title">簡介:</label>
                    <input type="text" name="description"  class="form-control" value="<?php echo $article['description']; ?>">
                   
                    <label for="content">內文:</label>
                    <textarea name="content" required><?php echo $article['content']; ?></textarea><br>
                    <button type="submit" class="btn btn-primary mt-3">確認修改</button>
                </form>
                
            </div>
            <a href="mainArticle.php" type="button" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>回文章總覽</a>
        </div>

       
</body>

</html>

<?php $conn->close(); ?>