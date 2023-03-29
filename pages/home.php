<?php
$q->getCount();
$q->getCountR();
$q->getCountT();
echo "<script>let count = $q->count;let countR = $q->countR;let countT = $q->countT;</script>";
?>

<section id="home">
	<section class="hero d-flex justify-content-center align-items-center mb-5">
		<div class="container px-4 px-md-3">
			<div class="row align-items-center">
				<div class="col-md-6" style="z-index: 900;">
					<h1>Sistem Informasi Piket</h1>
					<p>Sistem Informasi piket kelas X TJKT 2. Website ini bertujuan untuk mencatat keaktifan piket siswa dan siswi. Hal ini bertujuan agar mudah untuk mengetahui siapa yang aktif dan tidak aktif dalam piket.</p>
					<div class="container px-0">
						<div class="row">
							<div class="col d-flex gap-2">
								<a href="index.php?page=jadwal" class="btn btn-primary rounded-0">Lihat Jadwal</a>
								<a href="index.php?page=piket" class="btn btn-outline-primary rounded-0">Lihat Piket</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6" style="z-index: 900;">
					<img src="assets/images/sipiket.svg" class="float" alt="Data ilustration by storyset.com">
				</div>
			</div>
		</div>
	</section>

	<section class="data container px-md-3 px-4">
	    <h2 class="fs-4 mb-5" data-aos="fade-up" data-aos-duration="1100">Data keseluruhan piket</h2>
        <canvas id="chart" data-aos="fade-up" data-aos-duration="1100"></canvas>
	</section>

	<section class="about">
		<div class="container px-4 px-md-3">
			<div class="row align-items-center pb-5">
				<h2 class="mb-5 fs-4" data-aos="fade-up" data-aos-duration="1100">About</h2>
				<div class="col-md-4 mb-5 mb-md-0" data-aos="fade-up" data-aos-duration="1100">
					<img src="assets/images/jadwal-piket.jpg" class="img-fluid" alt="jadwal piket kelas X TJKT 2">
				</div>
				<div class="col-md-8">
					<p data-aos="fade-up" data-aos-duration="1100"><b>Apa itu piket?</b> <br> Piket adalah sebuah kegiatan yang telah ditentukan oleh jadwal yang biasanya kegiatannya tentang membersihkan sebuah kelas. Namun tugas piket bukan sebatas itu, salah satu tugas lainnya adalah meminjam buku paket dari perpustakaan untuk satu kelas disaat sedang pelajarannya.</p>
					<a href="index.php?page=jadwal" data-aos-duration="1200" data-aos="fade-up" class="btn btn-primary rounded-0">Lihar Jadwal</a>
				</div>
			</div>
			<hr>	
			<div class="row align-items-center mt-5">
				<div class="col-md-8">
					<p class="text-start text-md-start" data-aos-duration="1100" data-aos="fade-up"><b>Informasi Lainnya</b> <br> Terimakasih sudah mengunjungi website ini, kunjungi juga website kelas kami baik website utama maupun website kelas X TJKT 2. Berikan saran dan kritik anda di sana.</p>
					<div class="container px-0">
						<div class="row">
							<div data-aos="fade-up" data-aos-duration="1100" class="col d-flex gap-2 justify-content-start justify-content-md-start justify-content-lg-start">
								<a href="tjkt2.rf.gd/" class="btn btn-primary rounded-0">Lihat website</a>
	            </div>
						</div>
					</div>
				</div>
				<div class="col-md-4 mt-5 mt-md-0" data-aos-duration="1100" data-aos="fade-up">
					<img src="assets/images/logo-tjkt.png" class="img-fluid" alt="logo TJKT">
				</div>
			</div>
		</div>
	</section>
	    
</section>



<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>


<script>
	let c = document.getElementById("chart").getContext("2d");
    
	let chart = new Chart(c, {
		type: "bar",
		data:{
			labels:["Jumlah Data", "Piket", "Tidak Piket"],
			datasets:[{
				label:"Perbandingan",
				data:[
				count, countR, countT],
				backgroundColor:[
				"#2B3BD2", "#3BD22B", "#D22B3B"
				]
			}]
		}
	});
</script>