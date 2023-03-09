<?php
if ($q->role !== "admin") {
    header("Location: index.php?type=danger&msg=Halaman tidak dapat diakses");
}

?>

<section id="dashboard">
	<nav class="sidebar bg-dark navbar-dark">
		<button style="z-index: 999;" title="Toggle Menu" class="navbar-toggler" onclick="active();" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a title="Logout" href="index.php?page=logout" class="nav-link d-flex bg-dark border-0 text-center btn-back form-control rounded-0"><span class="sidebar-desc me-2">Logout</span><i><img src="assets/feather/log-out.svg" alt="Logout icon"></i></a>
		<div class="container mt-2">
			<div class="row">
				<a href="index.php?page=dashboard&q=detail-akun&u=<?=md5($q->username)?>"><h1 class="fs-5 text-white">Admin - <?=$q->user?></h1>
				<a title="Home" href="index.php?page=dashboard" class="nav-link d-flex align-items-center gap-3"><i><img src="assets/feather/home.svg" alt="Home icon"></i> <span class="sidebar-desc">Home</span></a>
			</div>
			<div class="row">
				<a title="Lihat Log" href="index.php?page=dashboard&q=log" class="nav-link d-flex align-items-center gap-3"><i><img src="assets/feather/clock.svg" alt="Clock icon"></i> <span class="sidebar-desc">Lihat Log</span></a>
			</div>
			<div class="row">
				<a title="Keaktifan Siswa" href="index.php?page=dashboard&q=piket" class="nav-link d-flex align-items-center gap-3"><i><img src="assets/feather/activity.svg" alt="Activity icon"></i> <span class="sidebar-desc">Keaktifan Siswa</span></a>
			</div>
			<div class="row">
				<a title="Jadwal Piket" href="index.php?page=dashboard&q=jadwal" class="nav-link d-flex align-items-center gap-3"><i><img src="assets/feather/check-circle.svg" alt="check icon circle"></i> <span class="sidebar-desc">Jadwal Piket</span></a>
			</div>
			<div class="row">
				<a title="Kelola Akun" href="index.php?page=dashboard&q=akun" class="nav-link d-flex align-items-center gap-3"><i><img src="assets/feather/user.svg" alt="User icon"></i> <span class="sidebar-desc">Kelola Akun</span></a>
			</div>	
			<div class="row">
				<a title="Ubah Mode" href="index.php?page=mode&q=<?=($mode === 'light') ? 'dark' : 'light';?>" class="nav-link d-flex align-items-center gap-3"><i><img id="icon-mode" src="assets/feather/sun.svg" alt="Sun icon"></i> <span class="sidebar-desc">Mode Siang</span></a>
			</div>	
		</div>
	</nav>
	<?php
	$data = (isset($_GET["q"])) ? $_GET['q'] : "statistic";
	include("pages/$data.php");
	?>
</section>

<script>
	const sidebar = document.querySelector(".sidebar");

	function active() {
		sidebar.classList.toggle("active");
	}
</script>
