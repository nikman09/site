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
		<div class="row">
	<h3 align="center">Informasi Pelatihan</h3>
<div class="col-md-6">	
		
		<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
			
			<div class="form-group">
				<label for="field-1" class="control-label">Tahun </label>
				<select class="form-control select3" name="tahun" id="tahun"  placeholder="Pilih Tahun" required>
						<?php
							$tahun = date("Y");
							$tahunawal = 2020;
							for ($x = $tahun; $x >= $tahunawal; $x--) {
								$thn = $x;
									echo "<option value='$thn' >".$thn."</option>";
							}
						?>
					</select>
			</div>	
			
			
			
	</div>
	
	
	
	<div class="col-md-6">
	
	
	<div class="form-group">
				<label for="field-1" class="control-label">Kategori</label>
				<select class="form-control" name="kategori" id="kategori" >
					<option value=""  selected>Semua</option>
					<option value="Umum">Umum</option>
					<option value="ASN">ASN</option>
					<option value="Pelaku Industri">Pelaku Industri</option>
				</select>
			</div>	
		
	
	
	
	</div>
</div>
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
													<td><a href='".base_url()."simanis/status?msg=0' class='btn btn-primary  btn-icon icon-left  daftar' disabled><i class='fa fa-list'></i> Daftar</a></td>";
												} else if ($item["status"]=="Tidak Lulus Seleksi" && $item["id_pelatihan"]==$row['id_pelatihan']){
													echo "
													<td><a href='".base_url()."simanis/status?msg=0' class='btn btn-primary  btn-icon icon-left  daftar' disabled><i class='fa fa-list'></i> Daftar</a></td>";
													
												} else if ($item["status"]=="Tidak Lulus Seleksi" && $item["id_pelatihan"]!=$row['id_pelatihan']){
													echo "
													<td><a href='".base_url()."simanis/persyaratan?i=".$row['id_pelatihan']."' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a></td>";
													
												}  else if ($item["status"]=="Lulus Seleksi" && $item["id_pelatihan"]==$row['id_pelatihan']){
													echo "
													<td><a href='".base_url()."simanis/status?msg=0' class='btn btn-primary  btn-icon icon-left  daftar' disabled><i class='fa fa-list'></i> Daftar</a></td>";
													
												} else if ($item["status"]=="Lulus Seleksi" && $item["id_pelatihan"]!=$row['id_pelatihan']){
													echo "
													<td> <a href='".base_url()."simanis/persyaratan?i=".$row['id_pelatihan']."' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a></td>";
													
												} else {
													echo "
													<td><a href='".base_url()."simanis/persyaratan?i=".$row['id_pelatihan']."' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a></td>";
												}
											} else {
												echo "
												<td><a href='".base_url()."simanis/persyaratan?i=".$row['id_pelatihan']."' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a></td>";
											}
										} else {
											echo "
												<td><a href='".base_url()."simanis/login?msg=0' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a></td>";
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
