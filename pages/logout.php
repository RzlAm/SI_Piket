<?php
if ($q->login === false) {
    header("Location: index.php?type=danger&msg=Halaman tidak bisa diakses.");
}
$q->logout();
?>