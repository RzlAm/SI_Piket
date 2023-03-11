<?php
$q->select("SELECT tbl_siswa.*, tbl_piket.* FROM tbl_piket JOIN tbl_siswa ON tbl_siswa.absen = tbl_piket.absen ORDER BY tbl_piket.id DESC");
?>

<section id="piket">
	<div class="container">
		<div class="row justify-content-center">
			<h1 class="text-center fs-3 mb-4">Data Piket</h1>
			<div class="col-12 col-md-10">
				<form action="" method="GET">
					<div class="input-group">
						<input type="text" class="form-control input-primary" placeholder="Cari berdasarkan tanggal, nama atau keterangan...">
						<button class="btn btn-primary"><i><img src="assets/feather/search.svg" alt=""></i></button>
					</div>
				</form>
			<?php if ($q->login === true) : ?>
				<a href="index.php?page=<?=($q->role === 'admin') ? 'dashboard&q=form-piket' : 'form-piket'?>" class="btn btn-primary mt-5"><i><img src="assets/feather/plus.svg" alt=""></i> Tambah</a>
			<?php endif; ?>
		</div>
	</div>
	<div class="table-responsive mt-4">
		<table class="table table-striped mt-2">
			<thead>
				<tr>
					<td>#</td>
					<th style="min-width: 160px;">Waktu</th>
					<th style="min-width: 200px">Nama</th>
					<th>Absen</th>
					<th class="text-center">Status</th>
					<th style="min-width: 200px;">Keterangan</th>
	            	<?php if ($q->login === true) { ?>
					<th class="text-center">Aksi</th>
				    <?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; while ($row = mysqli_fetch_object($q->result)) : $i++ ?>
				<tr>
					<td><?=$i?></td>
					<td><?=$row->hari?>, <?=$row->waktu?></td>
					<td><?=$row->nama?></td>
					<td class="text-center"><?=$row->absen?></td>
					<td class="text-center">
						<?php if ($row->status === "1") { ?>
							<i class="text-primary"><img src="assets/feather/check.svg" alt=""></i>
						<?php } else { ?>
							<i class="text-primary"><img src="assets/feather/x.svg" alt=""></i>
						<?php } ?>
					</td>
					<td><?=$row->keterangan?></td>
					<?php if ($q->login === true) { ?>
					<td>
						<a href="index.php?page=hapus&data=piket&id=<?=md5($row->id)?>" onclick="del();" class="btn btn-light"><i><img src="assets/feather/trash-2.svg" alt="Trash icon"></i></a>
					</td>
				    <?php } ?>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
	</div>
</div>
</section>

<script>
    function del() {
        if (confirm("Anda yakin ingin menghapus data ini?.") === false) {
            event.preventDefault();
        }
    }
</script>