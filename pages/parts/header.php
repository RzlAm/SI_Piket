<?php
if(!defined("ACCESS")) {
    header("Location: ../../index.php");
}
?>
<nav class="navbar px-3 px-md-0 fixed-top navbar-expand-lg">
	<div class="container">
		<a class="navbar-brand" href="index.php">SI Piket</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
					<a class="nav-link <?=($page === "home") ? "active" : ""?> "href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?=($page === "jadwal") ? "active" : ""?>" href="index.php?page=jadwal">Jadwal</a>
				</li>
				<li class="nav-item me-3">
					<a class="nav-link <?=($page === "piket") ? "active" : ""?>" href="index.php?page=piket">Piket</a>
				</li>
				<li class="nav-item">
				    <?php if ($q->login === true) { ?>
                        <a href="index.php?page=detail-akun&u=<?=$q->username?>" class="btn btn-dark form-control"><i><img src="assets/feather/user.svg" alt=""></i> <?=$q->user?></a>
				    <?php } else { ?>
				    	<a class="btn btn-primary form-control" href="index.php?page=login"><i><img src="assets/feather/log-in.svg" alt=""></i> Login</a>
					<?php } ?>
				</li>
			</ul>
		</div>
	</div>
</nav>