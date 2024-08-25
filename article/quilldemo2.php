<?php require_once("../article/db_connect.php");?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
</head>

<body>
    <h3>Edit</h3>
    <form id="form">
        <div id="editor" style="background: #fff">
            <p>Hello World</p>
        </div>
        <input type="submit" value="Save" />
    </form>
    <hr />
    <h3>Result</h3>
    <div id="result"></div>
    <script>

        function load() {
            quill.setContents([
                { insert: 'ABC', attributes: { bold: true } }
            ]);
        }

        function result() {
            // 將Delta格式轉成HTML，並輸出到前端
            var el = document.createElement("div"),
                ql = new Quill(el, {});
            ql.setContents(JSON.parse(DATA).ops);
            document.getElementById("result").innerHTML = ql.root.innerHTML;
            el = null;
        }

        document.getElementById("form").onsubmit = function () {
            DATA = JSON.stringify(quill.getContents());
            console.log("Delta: " + JSON.stringify(quill.getContents())); // Delta格式
            console.log("HTML: " + quill.root.innerHTML); // HTML格式
            console.log("Text: " + quill.getText()); //文字格式
            result(); // 輸出到前端
            return false;
        };


        var quill = new Quill("#editor", {
            theme: "snow", // 模板
            modules: {
                toolbar: [
                    // 工具列列表[註1]
                    ['bold', 'italic', 'underline', 'strike'], // 粗體、斜體、底線和刪節線
                    ['blockquote', 'code-block'], // 區塊、程式區塊
                    [{ 'header': 1 }, { 'header': 2 }], // 標題1、標題2
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }], // 清單
                    [{ 'script': 'sub' }, { 'script': 'super' }], // 上標、下標
                    [{ 'indent': '-1' }, { 'indent': '+1' }], // 縮排
                    [{ 'direction': 'rtl' }], // 文字方向
                    [{ 'size': ['small', false, 'large', 'huge'] }], // 文字大小
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],// 標題
                    [{ 'color': [] }, { 'background': [] }], // 顏色
                    [{ 'font': [] }], // 字體
                    [{ 'align': [] }], // 文字方向
                    ['clean'] // 清除文字格是
                ]
            }
        });
            
    </script>
</body>
</body>

</html>