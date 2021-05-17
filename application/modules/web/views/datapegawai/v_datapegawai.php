<div role="main" class="main">
				<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" style="background-image: url(<?php echo base_url() ?>assets/front-end/web2/bahan/tes11.jpg);padding-top: 100px;padding-bottom: 100px;">
					<div class="container">
						<div class="row mt-5">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-9 font-weight-bold">Data Pegawai</h1>
								<span class="sub-title">Dinas Perindustrian</span>
							</div>
							<div class="col-md-12 align-self-center order-1">
								<ul class="breadcrumb breadcrumb-light d-block text-center">
									<li><a href="<?php echo base_url() ?>">Beranda</a></li>
									<li class="active">Data Pegawai</li>
								</ul>
							</div>
						</div>
					</div>
				</section>
			

				<div class="container">

					<div class="row">
						<div class="col">
					

							<div>
							<table class="table  datable table-hover" id="table-1" style="font-size:12px">
		<thead>
			<tr>

				<th>Nama</th>
				<th>NIP</th>
				<th>Jenis Kelamin</th>
				<th>Tempat Lahir</th>
				<th>Tanggal Lahir</th>
				<th>Pangkat</th>
				<th>Jabatan</th>
			</tr>
		</thead>
		<tbody>
			<?php
					foreach($data->result_array() as $row){
						echo "
							<tr>
								<td>".$row['nama']."</td>
								<td>".$row['nip']."</td>
								<td>".$row['jk']."</td>
								<td>".$row['tempat_lahir']."</td>
								<td>";
								if ($row['tanggal_lahir']!="0000-00-00") echo tanggal($row['tanggal_lahir']);
								echo "</td>
								<td>".$row['pangkat']."</td>
								<td>".$row['nama_jabatan']."</td>
							
							</tr>
						";
					}
				?>
		</tbody>
	</table>
							</div>
							

						

						</div>
					</div>
					
					

				</div>

				