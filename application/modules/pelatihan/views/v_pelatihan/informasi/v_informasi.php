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
		<table class="table  table-strip datable" id="table-1" style="font-size:12px;width:100%" >
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
		</thead>
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
								<td>
								<a href='#' id='".$row['id_pelatihan']."'  class='btn btn-default syarat' data-toggle='modal'   data-target='#myModal2'>Persyaratan </a></td>
								"; 
									if (date("Y-m-d")>=$row['mulaipendaftaran'] && date("Y-m-d")<=$row['akhirpendaftaran']) {
										if ($stat=="login") {
											if ($ada==1) {
												if ($item["status"]=="Menunggu Hasil Seleksi") {
													echo "
													<td><a href='".base_url()."pelatihan/status?msg=0' class='btn btn-primary  btn-icon icon-left  daftar' disabled><i class='fa fa-list'></i> Daftar</a></td>";
												} else if ($item["status"]=="Tidak Lulus Seleksi"){
													echo "
													<td><a href='".base_url()."pelatihan/persyaratan?i=".$row['id_pelatihan']."' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a></td>";
													
												} else if ($item["status"]=="Lulus Seleksi" && $item["id_pelatihan"]!=$row['id_pelatihan']){
													echo "
													<td><a href='".base_url()."pelatihan/persyaratan?i=".$row['id_pelatihan']."' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a></td>";
													
												}else {
													echo "
													<td><a href='".base_url()."pelatihan/persyaratan?i=".$row['id_pelatihan']."' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a></td>";
												}
											} else {
												echo "
												<td><a href='".base_url()."pelatihan/persyaratan?i=".$row['id_pelatihan']."' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a></td>";
											}
										} else {
											echo "
												<td><a href='".base_url()."pelatihan/login?msg=0' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a></td>";
										}
									
									} else if (date("Y-m-d")<$row['mulaipendaftaran']) {
										echo "
										<td><a  class='btn btn-default  btn-icon icon-left' disabled><i class='fa fa-list'></i> Belum Dibuka</a></td>";
									} else {
										echo "
										<td><a class='btn btn-default  btn-icon icon-left' disabled><i class='fa fa-list'></i> Sudah Tutup</a></td>";
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


<div class="modal fade" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-edit">
          
         
        </div>
    </div>
</div>
