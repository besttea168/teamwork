<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <div class="container">
            <form action="doImageUpload.php" method="post" enctype="multipart/form-data">
                <div class="mb-2">
                    <label for="">title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-2">
                    <label for="">選取檔案</label>
                    <input type="file" name="image" class="form-control">
                </div> 
                <button type="submit" class="btn btn=primary">送出</button>
            </form>
        </div>
    </body>
</html>
