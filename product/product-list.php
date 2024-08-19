<?php
require_once("../db_connect.php");

$sql = "SELECT * FROM product ORDER BY id ASC";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

?>
<!doctype html>
<html lang="en">

<head>
  <title>Products</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />

</head>

<body>
  <div class="container">
    <div class="row row-clos-lg-4 row-clos-md-3 row-clos-sm-2">
      <?php foreach ($rows as $row): ?>
        <div class="col">
          <div class="ratio ratio-4x3">
            <img class="object-fit-cover" src="/images/<?= $rows["img"] ?>" alt="<? ["name"] ?>">
          </div>
          <h2 class="h4"><?= $row["name"] ?></h2>
          <div class="text-end h5 text-danger">$<?= $row["price"] ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>

</html>