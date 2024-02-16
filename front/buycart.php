<?php
if (!isset($_SESSION['mem'])) to("?do=login");
if (!isset($_GET['id'])) {
    echo "<h2 class='ct'>購物車中尚無商品</h2>";
} else {
    echo "<h2 class='ct'>" . $_SESSION['mem'] . "的購物車</h2>";
}
