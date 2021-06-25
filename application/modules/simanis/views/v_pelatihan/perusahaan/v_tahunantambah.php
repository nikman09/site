<div class="container">
	<div class="row">
		<div class="col-md-12">
			<hr class="no-top-margin" />
		</div>
	</div>	
</div>

<div class="container">
	<div class="row vspace" style="margin:5px;">
		<div class="col-md-12">
		<form id="form" role="form"  action="<?php echo base_url() ?>simanis/tambahtahunan" method="post"  enctype="multipart/form-data" >
        <div class="row">
		<div class="row">

					<div class="col-md-12">

					<?php pesan_get2('msg',"Berhasil Menyimpan Data Usaha !") ?>

						<h3>Tambah Data Tahunan</h3>

						<hr/>
					</div>

					</div>

					<div class="row">

					



						<div class="col-md-6">	
								
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
							<input type="hidden" name="id_perusahaan" value="<?php  echo $data["id_perusahaan"] ?>">
								
								<div class="form-group">
									<label for="field-1" class="control-label">Tahun *</label>
									<select class="form-control select3" name="tahun" id="tahun"  placeholder="Pilih Tahunan" required>
										<?php
										 	$tahun = date("Y");
											for ($x = 0; $x <= 4; $x++) {
												$thn = $tahun - $x;
												 	echo "<option value='$thn' >".$thn."</option>";
											}
										?>
									</select>
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Jumlah Tenaga Kerja Laki-laki *</label>
									<input type="text" class="form-control nilai" id="laki" name="laki" placeholder="Masukkan Jumlah Tenaga Kerja Laki-laki"  value="">
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Jumlah Tenaga Kerja perempuan *</label>
									<input type="text" class="form-control nilai" id="perempuan" name="perempuan" placeholder=" Masukkan Jumlah Tenaga Kerja perempuan"  value="">
								</div>	
							
								<div class="form-group">
									<label for="field-1" class="control-label">Nilai Investasi </label>
									<input type="text" class="form-control nilai" id="investasi" name="investasi" placeholder=" Masukkan Nilai Investasi"  value="">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Kapasitas Produksi </label>
									<input type="text" class="form-control nilai" id="kapasitas" name="kapasitas" placeholder=" Masukkan Kapasitas Produksi "  value="">
								</div>
								
								
								
								
						</div>

						

						<div class="col-md-6">
						<div class="form-group">
									<label for="field-1" class="control-label">Satuan Kapasitas Produksi *</label>
									<select class="form-control select3" name="satuan_id" id="satuan_id"  placeholder="Pilih Satuan Kapasitas Produksi " required>
										<option value="" selected>Pilih Satuan</option>
									<?php
											foreach($mastersatuan->result_array() as $row) {
												echo "<option value='".$row['id']."' >".$row['satuan']."</option>";

											}
										?>
									</select>
								
								</div>	
						<div class="form-group">
								<label for="field-1" class="control-label">Nilai Produksi </label>
								<input type="text" class="form-control nilai" id="produksi" name="produksi" placeholder="Nilai Produksi"  value="">
							</div>
						<div class="form-group">
									<label for="field-1" class="control-label">Nilai BP/BB</label>
									<input type="text" class="form-control nilai" id="bb" name="bb" placeholder=" Masukkan Nilai BB"  value="">
								</div>
							
						<div class="form-group">
									<label for="field-1" class="control-label">Persentasi Pemasaran Ekspor (%)</label>
									<input type="text" class="form-control nilai" id="ekspor" name="ekspor" placeholder=" Masukkan Persentasi Pemasaran Ekspor (dalam %)"  value="">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Negara Tujuan Ekspor</label>
									<input type="text" class="form-control" id="negara" name="negara" placeholder=" Masukkan Negara Tujuan Ekspor"  value="">
								</div>
								

									<br/>
									<br/>
									<br/>
							</div>

						</div>

						


                    </div>



					<div class="row">

					<div class="col-md-12">
					<button type="submit" class="btn btn-primary  btn-icon icon-left  daftar" style="float:right;margin-left:10px"><i class='fa fa-save'></i>Simpan</button>
												
					<a href="<?php echo base_url("simanis/perusahaan") ?>" class="btn btn-default  btn-icon icon-left  daftar" style="float:right"><i class='fa fa-arrow-left'></i>Kembali</a>
						
						<br/>
						<br/>
							</form>

					</div>

		</div>

	</div>

</div>

</div>

</div>


</div>


</div>



