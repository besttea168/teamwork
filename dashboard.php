<?php
// session_start();
// if (!isset($_SESSION["user"])) {
//   header("location: sign-in.php");
//   exit;
// }

?>



<head>

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        :root {
            --aside-width: 240px;
            --top-width: 72px;
        }

        .brand {
            width: var(--aside-width);
        }

        .left-aside {
            width: var(--aside-width);
            padding-top: 72px;
        }

        .main-header{
            height: var(--top-width);
        }

        .main-content {
            margin: var(--top-width) 0 0 var(--aside-width);
        }


        .accordion-button {
            background-color: var(--bs-dark) !important;
            color: white !important;
        }

        .accordion-button:not(.collapsed) {
            background-color: black !important;
            color: white !important;
        }

        /* 移除 accordion 按鈕的 focus outline */
        .accordion-button:focus {
            box-shadow: none;
            outline: none;
            background-color: rgba(0, 0, 0, 0.5);
        }

        /* 修改箭頭顏色 */
        .accordion-button::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23FFD43B'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e") !important;
        }

        /* 修改active狀態下的箭頭顏色 */
        .accordion-button:not(.collapsed)::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23FFD43B'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e") !important;
        }


        /* 移除 accordion 項目之間的邊距 */
        .accordion-item {
            border: none;
            margin-bottom: 0;
        }

        
    </style>
</head>


    <header class="main-header d-flex justify-content-between bg-dark align-items-center fixed-top shadow">
        <a href="" class="brand p-3 bg-dark text-white text-decoration-none">第一組</a>
        <div class="d-flex align-items-center">
            <div class="text-white">
                <!-- hi, $_SESSION["user"]["name"] -->
            </div>

            <a href="doLogout.php" class="btn btn-dark me-3">
                <button type="button" class="btn btn-warning"><i class="fa-solid fa-right-from-bracket me-2 fa-fw"></i>Sign out</button>
            </a>
        </div>
    </header>

    <aside class="left-aside bg-dark border-end vh-100 position-fixed top-0 start-0 overflow-auto">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingUser">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        會員管理
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingUser" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body bg-dark">
                        <div class="list-group text-center">
                            <a href="#" class="list-group-item list-group-item-action">會員列表</a>
                            <a href="#" class="list-group-item list-group-item-action">會員</a>
                            <a href="#" class="list-group-item list-group-item-action">會員</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingProduct">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseProduct" aria-expanded="false" aria-controls="flush-collapseProduct">
                        商品管理
                    </button>
                </h2>
                <div id="flush-collapseProduct" class="accordion-collapse collapse" aria-labelledby="flush-headingProduct" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body bg-dark">
                        <div class="list-group text-center">
                            <a href="#" class="list-group-item list-group-item-action">商品列表</a>
                            <a href="#" class="list-group-item list-group-item-action">新增商品</a>
                            <a href="#" class="list-group-item list-group-item-action">編輯商品</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingCoupon">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseCoupon" aria-expanded="false" aria-controls="flush-collapseCoupon">
                        優惠券管理
                    </button>
                </h2>
                <div id="flush-collapseCoupon" class="accordion-collapse collapse" aria-labelledby="flush-headingCoupon" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body bg-dark">
                        <div class="list-group text-center">
                            <a href="#" class="list-group-item list-group-item-action">優惠券列表</a>
                            <a href="#" class="list-group-item list-group-item-action">新增優惠券</a>
                            <a href="#" class="list-group-item list-group-item-action">編輯優惠券</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</aside>





    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


