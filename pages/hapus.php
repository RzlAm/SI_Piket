<?php
if ($q->login === false) {
    header("Location: index.php?type=danger&msg=Halaman tidak dapat diakses");
}

$data = (isset($_GET["data"])) ? $_GET["data"] : "";
$id = (isset($_GET["id"])) ? $_GET["id"] : "";
$q->delete($data, $id);
?>