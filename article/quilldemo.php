<?php require_once("../article/db_connect.php");

?>

<html lang="en">

<head>
    <title>quilldemo</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <?php include("../css.php") ?>
    <?php include("style.php") ?>
</head>

<body>
    <?php include("../article/nav.php") ?>
    <?php include("../article/sidebar.php") ?>
    <main class="main-content pp-3 px-3">
        <h1>Quill Demo</h1>
        <hr>
        <div class="container text-editor">
            <form action="doCreateArticle.php" method="post">
                <!--標題-->
                <label for="title">請輸入標題</label>
                <input type="text" name="title" id="titleInput">
                <!--簡介-->
                <label for="description">請輸入簡介</label>
                <input type="text" name="description" id="descriptionInput">
                <label for="content"></label>
                <input type="hidden" id="contentInput" name="content">
            </form>
            <!---編輯器-->
            <div id="editor">
                <p>Hello World!</p>
                <p>Some initial <strong>bold</strong> text</p>
                <p><br /></p>
            </div>
            <button type="submit" id="submitBtn" class="btn btn-primary">save</button>





        </div>


    </main>

    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


    <!-- Initialize Quill editor -->
    <script>
        const form = document.querySelector("form");

        const quill = new Quill('#editor', {
            theme: 'snow'
        });

        document.getElementById("titleInput").addEventListener("focus", function () {

            const descriptionContent = quill.getText(0, 10)
            document.getElementById("titleInput").value = descriptionContent;
        });

        document.getElementById("descriptionInput").addEventListener("focus", function () {

            const descriptionContent = quill.getText(0, 30)
            document.getElementById("descriptionInput").value = descriptionContent;
        });

        document.getElementById("submitBtn").addEventListener("click", function () {
            const textLength = quill.getLength();
            //const content = document.querySelector("#editor").innerHTML;
            const content = quill.getContents(0, textLength);
            const contentString = JSON.stringify(content);
            document.getElementById("contentInput").value = contentString;
            //console.log(contentString);
            form.submit();
        }
        );


    </script>
</body>