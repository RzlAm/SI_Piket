<?php

include("query/Query.php");
$q = new Query();

$q->checkLogin();
$q->checkRole();

$page = (isset($_GET['page'])) ? $_GET['page'] : "home";
$mode = (isset($_COOKIE['theme'])) ? $_COOKIE['theme'] : "dark";
$type = (isset($_GET["type"])) ? $_GET["type"] : "";
$msg = (isset($_GET["msg"])) ? $_GET["msg"] : "";

if ($q->role === "admin" && $page !== "dashboard") {
    header("Location: index.php?page=dashboard");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Piket - X TJKT 2</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body <?=($page === "dashboard" && $mode === "dark") ? 'data-bs-theme="dark"' : ""?>>
    
    <div class="toast toast-<?=$type?>" role="alert" id="toastLiveExample" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="..." class="rounded me-2" alt="...">
        <strong class="me-auto"><?=$type?></strong>
        <small class="text-muted">Baru</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body"><?=$msg?></div>
    </div>
    
    
    
	<?php
	if ($page === "dashboard") {
		include("pages/parts/dashboard.php");
	} else if ($page !== "login") {
		include("pages/parts/header.php");

	}
	
	($page === "dashboard") ? "" : include("pages/$page.php");
	($page === "dashboard" || $page === "login") ? "" : include("pages/parts/footer.php");
	?>

	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <?=(!empty($type) && !empty($msg)) ? "<script>const toast = new bootstrap.Toast(toastLiveExample);toast.show();</script>" : ""?>
    <div class="modal modal-dialog modal-dialog-scrollable">
        halo
    </div>
</body>
</html>