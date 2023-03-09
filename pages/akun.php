<?php
if ($q->login === false || $q->role !== "admin") {
    header("Location: index.php?type=danger&msg=Halaman tidak dapat diakses.");
}

$q->select("SELECT * FROM tbl_users ORDER BY id ASC");
?>

<section id="akun">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<h1 class="fs-5">kelola Akun Moderator</h1>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Username</th>
						<th style="min-width: 200px;">Nama</th>
						<th style="min-width: 160px;">Online Terakhir</th>
						<th>Status</th>
						<th style="min-width: 150px;" class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
				    <?php $i = 0; while ($row = mysqli_fetch_object($q->result)): $i++ ?>
						<tr>
							<td><?=$i?></td>
							<td><?=$row->username?></td>
							<td><?=$row->name?></td>
							<td>02-23-2023, 18:00</td>
							<td>Online</td>
							<td>
								<a href="index.php?page=dashboard&q=form-daftar&id=<?=md5($row->id)?>" class="btn btn-light"><i><img src="assets/feather/edit.svg" alt="Edit icon"></i></a>
								<a href="index.php?page=hapus&data=akun&id=<?=md5($row->id)?>" onclick="del();" class="btn btn-light"><i><img src="assets/feather/trash-2.svg" alt="Trash icon"></i></a>
							</td>
						</tr>
					<?php endwhile;?>
				</tbody>
			</table>
		</div>
	<a href="index.php?page=dashboard&q=form-daftar" class="btn mt-3 btn-outline-primary">Tambah</a>
	<a href="" class="btn mt-3 btn-primary"><i><img src="assets/feather/printer.svg" alt="Printer icon"></i> Print Data</a>
	</div>
</section>
<script>

    function del() {

        if (confirm("Anda yakin ingin menghapus data ini?.") === false) {
            event.preventDefault();
        }
    }
</script>