<?php
if ($q->login === false || $q->role !== "admin") {
    header("Location: index.php?type=danger&msg=Halaman tidak dapat diakses");
}

$q->getCount();
$q->getCountR();
$q->getCountT();
$q->select("SELECT * FROM tbl_siswa ORDER BY jumlah_piket DESC, jumlah_tidak_piket ASC");

echo "<script>let count = $q->count;let countR = $q->countR;let countT = $q->countT;</script>";
?>

<section id="statistic" class="pb-5">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="container mb-5 pb-5">
					<div class="row">
						<h1 class="fs-4" style="margin-left: -8px;">Statistic Dasar</h1>
						<div class="col-md-4 mb-4">
						<div class="card bg-primary">
						    <div class="card-body text-white">
							    <h3 class="fs-5">Jumlah Data</h3>
							    <h4 class="fs-1 text-center mt-4 mb-3"><?=$q->count?></h4>
						    </div>
						</div>		
						</div>					
						<div class="col-md-4 mb-4">
							<div class="card bg-success">
							    <div class="card-body text-white">
								    <h3 class="fs-5">Orang Rajin</h3>
								    <h4 class="fs-1 text-center mt-4 mb-3"><?=$q->countR?></h4>
							    </div>
							</div>		
						</div>
						<div class="col-md-4">
							<div class="card bg-danger">
							    <div class="card-body text-white">
									<h3 class="fs-5">Tidak Rajin</h3>
									<h4 class="fs-1 text-center mt-4 mb-3"><?=$q->countT?></h4>
							    </div>
							</div>		
						</div>
					</div>
				</div>
				<canvas id="chart"></canvas>
				<a href="" class="btn mt-5 btn-primary"><i><img src="assets/feather/share.svg" alt=""></i> Bagikan Gambar</a>
				<div class="container mt-5">
					<div class="row">
						<h1 class="fs-4" style="margin-bottom: -20px !important; margin-left: -13px;">Statistic Lanjutan</h1>
						<p style="margin-left: -5px;">Urutan orang paling rajin</p>
                        <table class="table table-striped mt-3">
                            <thead>
                    			<th>#</th>
                    			<th style="min-width: 200px;">Nama</th>
                    			<td class="text-center">Piket</td>
                    			<td class="text-center">Tidak Piket</td>
                    		</thead>
                    		<tbody>
                    			<?php $i = 0; while ($row = mysqli_fetch_object($q->result)): $i++ ?>
                    				<tr>
                    					<td><?=$i?></td>
                    					<td><?=$row->nama?></td>
                    					<td class="text-center"><?=$row->jumlah_piket?> Kali</td>
                    					<td class="text-center"><?=$row->jumlah_tidak_piket?> Kali</td>
                    				</tr>
                    			<?php endwhile; ?>
                    		</tbody>
                    	</table>
					</div>
				</div>
				<a href="" class="btn mt-3 btn-primary"><i><img src="assets/feather/printer.svg" alt=""></i> Print Data</a>
			</div>
		</div>
		
		
	</div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>

<script>
	let c = document.getElementById("chart").getContext("2d");
    
	let chart = new Chart(c, {
		type: "bar",
		data:{
			labels:["Jumlah Data", "Orang Rajin", "Orang Tidak Rajin"],
			datasets:[{
				label:"Perbandingan",
				data:[
				count, countR, countT],
				backgroundColor:[
				"#1b47d6", "#198754", "#dc3545"
				]
			}]
		}
	});
</script>