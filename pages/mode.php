<?php
if ($q->login === false || $q->role !== "admin") {
    header("Location: index.php?type=danger&msg=Halaman tidak dapat diakses");
}

$mode = (isset($_GET["q"])) ? $_GET['q'] : "";

if ($mode === "dark") {
	setcookie("theme", "dark", time() + 60 * 60);
	header("Location: index.php?page=dashboard&data=statistic");
} else if ($mode === "light") {
	setcookie("theme", "light", time() + 60 * 60);
	header("Location: index.php?page=dashboard&data=statistic");
} else {
	setcookie("theme", "dark", time() + 60 * 60);
	header("Location: index.php?page=dashboard&data=statistic");
}

?>
