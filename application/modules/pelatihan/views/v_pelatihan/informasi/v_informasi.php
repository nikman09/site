<div class="container">
	<div class="row">
		<div class="col-md-12">
			<hr class="no-top-margin" />
		</div>
	</div>	
</div>
<div class="container">
	<div class="row vspace">
		<div class="col-md-12">
		<h3 align="center">Informasi Pelatihan</h3>
		<table class="table  table-strip datable nowrap" id="table-1" style="font-size:12px;width:100%" >
		<thead>
			<tr>

				<th>Pelatihan</th>
				<th>Kategori</th>
				<th>Periode Pendaftaran</th>
				<th>Tanggal Pelatihan</th>
				<th>Tempat Pelatihan</th>
				<th>Persyaratan</th>
				<th>Daftar</th>
			</tr>
		</thead>8
		<tbody>
		
			<?php
					foreach($data->result_array() as $row){
						echo "
							<tr>
								<td>".$row['nama']."</td>
								<td>".$row['kategori']."</td>
								<td>".tgl_indo($row['mulaipendaftaran'])." - ".tgl_indo($row['akhirpendaftaran'])."</td>
								<td>".tgl_indo($row['mulaipelatihan'])." - ".tgl_indo($row['akhirpelatihan'])."</td>
								
								<td>".$row['tempat']."</td>

								<td><a href='".base_url()."pelatihan/persyaratan?i=".$row['id_pelatihan']."' class='btn btn-default  btn-icon icon-left'><i class='fa fa-file'></i>Lihat Persyaratan </a></td>
								"; 
									if (date("Y-m-d")>=$row['mulaipendaftaran'] && date("Y-m-d")<=$row['akhirpendaftaran']) {
										echo "
										<td><a href='#' class='btn btn-primary  btn-icon icon-left'><i class='fa fa-list'></i> Daftar</a></td>";
									} else {
										echo "
										<td><a href='#' class='btn btn-default  btn-icon icon-left' disabled><i class='fa fa-list'></i> Daftar</a></td>";
									};
							
						echo "
							</tr>
						";
					}
				?>
		</tbody>
	</table>
	</div>
</div>
</div>

