<?php
if ($q->login === false || $q->login === true && $q->role !== "admin") {
    header("Location: index.php?type=danger&msg=Halaman tidak bisa diakses.");
}

$id = (isset($_GET["id"])) ? $_GET["id"] : "";
$q->select("SELECT * FROM tbl_users WHERE md5(id) = '$id'");
$row = mysqli_fetch_object($q->result);

if (isset($_POST["login"])) {
    if (empty($id)) {
        $q->addAkun($_POST);
    } else {
        $q->editAkun($_POST, $id);
    }
}
?>

<section id="login">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card">
					<div class="card-body">
						<h3 class="mb-4">Daftar</h3>
						<form action="" method="POST">
							<label for="name">Nama</label>
							<input value="<?=(!empty($id)) ? $row->name : ""?>" autocomplete="off" type="text" name="name" class="form-control input-primary mb-2" placeholder="Name">
							<label for="username">Username</label>
							<input value="<?=(!empty($id)) ? $row->username : ""?>" autocomplete="off" type="text" name="username" class="form-control input-primary mb-2" placeholder="Username">
							<label for="role">Sebagai</label>
							<select name="role" class="form-select input-primary">
							    <option value="moderator">Moderator</option>
							    <option <?=(!empty($id) && $row->role === "admin") ? "selected" : ""?> value="admin">Admin</option>
							</select>
							<label for="password">Password</label>
							<div class="input-group mb-3">
								<input type="password" class="form-control input-primary" placeholder="Password" id="password" name="password" aria-describedby="basic-addon">
								<button type="button" class="input-group-text" onclick="pass()" id="basic-addon2"><i><img src="assets/feather/eye.svg" alt=""></i></button>
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