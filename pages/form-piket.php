<?php
if ($q->login === false) {
    header("Location: index.php?type=danger&msg=Halaman tidak dapat diakses");
}

$res1 = $q->select("SELECT * FROM tbl_hari");
$res2 = $q->select("SELECT * FROM tbl_siswa ORDER BY absen ASC");

if (isset($_POST["kirim"])) {
    $q->addPiket($_POST);
}

?>

<section id="form-piket">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<h1 class="fs-5 mb-3 mt-1">Form Piket</h1>
						<form action="" method="POST">
							<label for="hari">Hari</label>
							<select name="hari" id="hari" class="form-select input-primary">
								<?php while ($row1 = mysqli_fetch_object($res1)) : ?>
									<option value="<?=$row1->hari?>"><?=$row1->hari?></option>
								<?php endwhile; ?>
							</select>
							<label for="waktu">Waktu</label>
							<input type="date" id="waktu" name="waktu" class="form-control input-primary" value="<?=date("Y-m-d")?>">
							<label for="absen">Nama</label>
							<select name="absen" id="absen" class="form-select input-primary">
								<?php while ($row2 = mysqli_fetch_object($res2)) : ?>
								<option  value="<?=$row2->absen?>"><?=$row2->nama?></option>
							<?php endwhile; ?>
							</select>
							<label for="status">Status</label>
							<select name="status" id="status" class="form-select input-primary">
								<option value="1">✔ Piket</option>
								<option value="0">&times; Tidak Piket</option>
							</select>
							<label for="keterangan">Keterangan</label>
							<textarea name="keterangan" id="keterangan" rows="6" placeholder="Keterangan (optional)" class="form-control input-primary"></textarea>
							<p class="mt-2 mb-0 text-danger"><?= (isset($q->msg)) ? $q->msg : ""?></p>
							<button type="submit" name="kirim" class="btn btn-primary mt-2 form-control">Kirim</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>