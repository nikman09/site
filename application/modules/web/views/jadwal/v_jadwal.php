<div role="main" class="main">
				<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" style="background-image: url(<?php echo base_url() ?>assets/front-end/web2/bahan/tes11.jpg);padding-top: 100px;padding-bottom: 100px;">
					<div class="container">
						<div class="row mt-5">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-9 font-weight-bold">Jadwal <?php echo $datas['nama'] ?></h1>
								<span class="sub-title">Dinas Perindustrian</span>
							</div>
							<div class="col-md-12 align-self-center order-1">
								<ul class="breadcrumb breadcrumb-light d-block text-center">
									<li><a href="<?php echo base_url() ?>">Beranda</a></li>
									<li class="active">Jadwal</li>
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

				<th>#</th>
				<th>Nama Kegiatan</th>
				
				<th>Tanggal</th>
				<th>Keterangan</th>
				<th>#</th>
			</tr>
		</thead>
		<tbody>
			<?php

				$i= 0;
				foreach($data->result_array() as $row){
					$i++;
					echo "
						<tr>
							<td>".$i."</td>
							<td>".$row['nama']."</td>
							<td>".$row['keterangan']."</td>
							
							<td>";
								if ($row['dokumen']!="") {
									echo "<a href='".base_url()."assets/images/jadwal/".$row['dokumen']."' class='' target='_blank'>Unduh</a> ";
								} else {
								
								}
							echo "
							</td>
							<td>".$row['tanggal']."</td>
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

				