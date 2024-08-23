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
