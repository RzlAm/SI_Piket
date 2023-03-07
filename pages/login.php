<?php
if ($q->login === true) {
    header("Location: index.php?type=danger&msg=Anda sudah login!.");
}

if (isset($_POST["login"])) {
    $q->login($_POST);
}

?>
<!-- rzlamin27 -> rzl72amin% -->
<!-- slsa123 -> sls20%a -->
<section id="login">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card">
					<div class="card-body">
						<h3 class="mb-4">Login</h3>
						<form action="" method="POST">
							<label for="username">Username</label>
							<input required="" autocomplete="off" type="text" name="username" class="form-control input-primary mb-2" placeholder="Username">
							<label for="password">Password</label>
							<div class="input-group mb-3">
								<input required="" autocomplete="off" type="password" class="form-control input-primary" placeholder="Password" id="password" name="password" aria-describedby="basic-addon2">
								<button type="button" class="input-group-text" onclick="pass()" id="basic-addon2"><i><img src="assets/feather/eye.svg" alt=""></i></button>
							</div>
							<div class="list-group-item mt-2">
								<input class="form-check-input me-1" type="checkbox" name="remember" checked id="firstCheckbox">
								<label class="form-check-label" for="firstCheckbox">Ingatkan Saya</label>
							</div>
							<p class="mt-1 mb-0 text-danger"><?=(!empty($q->msg)) ? $q->msg : ""?></p>
							<button type="submit" name="login" class="btn btn-primary mt-1 form-control"><i><img src="assets/feather/log-in.svg" alt=""></i> Login</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	var password = document.getElementById("password");

	function pass() {
		if (password.type === "password") {
			password.type = "text";
		} else {	
			password.type = "password";
		}
	}
</script>