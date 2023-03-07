<section id="jadwal">
	<h1 class="fs-5 text-center">Jadwal Piket</h1>
	<div class="container table-responsive">
		<table class="table table-striped mt-2">
			<thead>
				<tr>
					<th>Senin</th>
					<th>Selasa</th>
					<th>Rabu</th>
					<th>Kamis</th>
					<th>Jumat</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php for ($i = 1; $i <= 5; $i++) : ?>
						<td>
							<ol class="ps-3">
								<li>PABP</li>
								<li>PJOK</li>
								<li>S.INDO</li>
								<li>B.INGGRIS</li>
								<li>PPKN</li>
							</ol>
						</td>
					<?php endfor; ?>
				</tr>
			</tbody>
		</table>
	</div>
</section>