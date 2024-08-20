<?php
require_once("../db_connect.php");

$sql = "SELECT * FROM product WHERE valid = 1 ORDER BY name ASC";
$result = $conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);
?>
<pre>
    <?php
    print_r($rows);
    ?>
</pre>
<?php
$conn->close();