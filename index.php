<?php
define("ACCESS", true);

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
	<meta name="author" content="TJKT 2 ANGKATAN 16 SMEKDAN">
	<meta name="description" content="Sistem informasi piket kelas TJKT 2 untuk mendata dan mengelola data piket setiap harinya berdasarkan data yang dimasukkan admin atau moderator. Nantinya data - data tersebut dapat di hitung dan dapat mengetahui siapa yang jarang piket.">
	<meta name="keywords" content="si, sistem informasi, piket, jadwal piket kelas, jadwal piket kelas aesthetic, contoh gambar jadwal piket kelas yang unik dan kreatif, tjkt 2, tjkt2, tkj2, tkj 2, x tjkt 2, x tjkt 1, tjkt2.rf.gd, tkj, tjkt, tkj me, kelas komputer, rpl, informatika, it, data, rajin, tidak rajin, bootstrap, feather icons, svg, jadwal, jadwal piket, harian, wajib, jumlah data, single page application, spa, framework, backend, frontend, css, javascript, storyset.com, ilustration, colorful, animation, aos, animate on scroll">
	<title>Sistem Informasi Piket - TJKT 2</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
</head>
<body <?=($page === "dashboard" && $mode === "dark") ? 'data-bs-theme="dark"' : ""?>>
    <div class="wrap">
    <div class="toast toast-<?=$type?>" role="alert" id="toastLiveExample" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="assets/feather/<?=$type?>.svg" class="rounded me-2" alt="alert type">
        <strong class="me-auto">Informasi</strong>
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

    </div>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <?=(!empty($type) && !empty($msg)) ? "<script>const toast = new bootstrap.Toast(toastLiveExample);toast.show();</script>" : ""?>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
	    AOS.init();
	</script>
</body>
</html>