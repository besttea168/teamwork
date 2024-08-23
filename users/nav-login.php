
<header class="main-header d-flex justify-content-between bg-dark align-items-center fixed-top shadow border-bottom border-secondary">
        <a href="" class="h3 brand p-3 bg-dark text-white text-decoration-none"><i class="fa-solid fa-dice"></i> 第一組</a>
        <div class="d-flex align-items-center">
            <div class="text-white">
                <?php if(isset($_SESSION["user"]["name"])): ?>
                hi, <?=$_SESSION["user"]["name"]?>
                <?php else: unset($_SESSION["user"]["name"]);
                endif; ?>
            </div>

            <a href="creat-user.php" class="btn btn-dark me-3">
                <button type="button" class="btn btn-warning"><i class="fa-solid fa-user-plus me-2 fa-fw"></i>Creat user</button>
            </a>

            <a href="login.php" class="btn btn-dark me-3">
                <button type="button" class="btn btn-warning"><i class="fa-solid fa-right-to-bracket me-2 fa-fw"></i>Sign in</button>
            </a>
        </div>
    </header>