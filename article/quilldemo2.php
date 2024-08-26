<?php
/*php require_once("../article/db_connect.php");*/
$servername = "localhost";
$username = "admin";
$password = "12345";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// 檢查連線
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
} else {
    echo "連線成功<br>";
}

?>

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
    <div id="editor-container"></div>
    <script>
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: {
                    container: [
                        ['bold', 'italic', 'underline'],
                        ['image'], // Add the image button to the toolbar
                    ],
                    handlers: {
                        'image': imageHandler
                    }
                }
            }
        });

        function imageHandler() {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.click();

            input.onchange = function () {
                var file = input.files[0];
                var formData = new FormData();
                formData.append('file', file);

                // Upload the image to the server
                fetch('upload.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.url) {
                            // Insert the image URL into the editor
                            var range = quill.getSelection();
                            quill.insertEmbed(range.index, 'image', data.url);
                        } else {
                            console.error('Image upload failed');
                        }
                    })
                    .catch(error => {
                        console.error('Image upload failed:', error);
                    });
            };
        }
    </script>
    <!----<script>

        /* function load() {
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
         };*/


        // Initialize Quill editor
        /* var quill = new Quill('#editor', {
             modules: {
                 toolbar: {
                     container: [
                         [{ 'header': '1' }, { 'header': '2' }],
                         ['bold', 'italic', 'underline'],
                         ['link', 'image'],
                         [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                         [{ 'indent': '-1' }, { 'indent': '+1' }],
                         [{ 'align': [] }],
                         ['clean']
                     ],
                     handlers: {
                         'image': imageHandler
                     }
                 }
             },
             theme: 'snow'
         });*/





        /*function imageHandler() {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.click();

            input.onchange = () => {
                const file = input.files[0];
                if (file) {
                    const formData = new FormData();
                    formData.append('file', file);

                    // Replace with your image upload endpoint
                    fetch('doCreateArticle.php', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.json())
                        .then(data => {
                            // Insert image into editor
                            const range = quill.getSelection();
                            quill.insertEmbed(range.index, 'image', data.imageUrl);
                        })
                        .catch(error => {
                            console.error('Error uploading image:', error);
                        });
                }
            };
        }*/

        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: {
                    container: [
                        ['bold', 'italic', 'underline'],
                        ['image'],  // 添加圖片按鈕
                        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                        [{ 'align': [] }],
                        [{ 'indent': '-1' }, { 'indent': '+1' }],
                        [{ 'size': ['small', 'medium', 'large', 'huge'] }],
                        [{ 'font': [] }],
                        [{ 'color': [] }, { 'background': [] }],
                        ['clean']
                    ],
                    handlers: {
                        'image': imageHandler
                    }
                }
            }
        });

        function imageHandler() {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.click();

            input.onchange = function () {
                var file = input.files[0];
                var formData = new FormData();
                formData.append('file', file);

                // 上傳圖片到伺服器
                fetch('upload.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.url) {
                            // 插入圖片到編輯器
                            var range = quill.getSelection();
                            quill.insertEmbed(range.index, 'image', data.url);
                        } else {
                            console.error('圖片上傳失敗');
                        }
                    })
                    .catch(error => {
                        console.error('圖片上傳失敗:', error);
                    });
            };
        }


    </script>--->
</body>
</body>

</html>