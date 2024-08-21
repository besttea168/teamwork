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
        <div class="container">
            <div id="editor">
                <p>Hello World!</p>
                <p>Some initial <strong>bold</strong> text</p>
                <p><br /></p>
            </div>
        </div>


    </main>

    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow'
        });
    </script>
</body>