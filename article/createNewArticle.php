<?php require_once("../db_connect.php");

?>

<html lang="en">

<head>
    <title>建立新文章</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <?php include("../css.php") ?>
    <?php include("style.php") ?>
    <style>
      
    </style>
</head>

<body>
    <?php include("../nav.php") ?>
    <?php include("../sidebar.php") ?>
    <main class="main-content pp-3 px-3">
        <h1>建立新文章</h1>
        <hr>
        <div class="container text-editor">
            <div class="mb-3 pt-3">
                <h1>建立新文章</h1>
                <form action="doCreateArticle.php" method="post">
                    <!--標題-->
                    <label for="title" class="form-label">請輸入標題</label>
                    <input type="text" class="form-control" name="title" id="titleInput">
                    <!--簡介-->
                    <label for="description" class="form-label">請輸入簡介</label>
                    <input type="text" class="form-control" name="description" id="descriptionInput">
                    <hr>
                    <textarea name="content" id="textinput"></textarea>
                <button type="submit" id="submitBtn" class="btn btn-primary mt-3">儲存</button>

            </div>





        </div>


    </main>

    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


    <!-- Initialize Quill editor -->
   

    </script>
</body>