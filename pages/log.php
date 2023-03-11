<?php
if ($q->login === false || $q->role !== "admin") {
    header("Location: index.php?type=danger&msg=Halaman tidak dapat diakses.");
}

$q->select("SELECT * FROM tbl_log ORDER BY id DESC");
?>

<section id="log" class="pb-5">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<h1 class="fs-5">Log Perubahan Database</h1>
			</div>
		</div>
		<div class="table-scrol table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th style="min-width: 170px;">Waktu</th>
						<th style="min-width: 200px;">Nama</th>
						<th style="min-width: 300px;">Log</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
				    <?php $i = 0; while ($row = mysqli_fetch_object($q->result)) : $i++ ?>
						<tr>
							<td><?=$i?></td>
							<td><?=$row->waktu?></td>
							<td><?=$row->nama?></td>
							<td><?=$row->log?></td>
							<td>
								<a href="index.php?page=hapus&data=log&id=<?=md5($row->id)?>" onclick="del();" class="btn btn-light"><i><img src="assets/feather/trash-2.svg" alt=""></i></a>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		<a href="" class="btn mt-3 btn-primary"><i><img src="assets/feather/printer.svg" alt="Printer icon"></i> Print Data</a>
    </div>
</section>

<script>
    function del() {
        if (confirm("Anda yakin ingin menghapus log ini?.") === false) {
            event.preventDefault();
        }
    }
</script>