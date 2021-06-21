

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

		<form id="form" role="form"  action="<?php echo base_url() ?>simanis/tambahproduk" method="post"  enctype="multipart/form-data" >
                    <div class="row">

		<div class="row">

					<div class="col-md-12">

					<?php pesan_get2('msg',"Berhasil Menyimpan Data Usaha !") ?>

						<h3>Tambah Produk</h3>

						<hr/>

						

					</div>

					</div>

					<div class="row">

					



						<div class="col-md-6">	
								
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
							<input type="hidden" name="id_perusahaan" value="<?php  echo $data["id_perusahaan"] ?>">
								
								<div class="form-group">
									<label for="field-1" class="control-label">Nama Produk *</label>
									<input type="text" class="form-control" id="produk" name="produk" placeholder="Masukkan Produk"  value="">
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Kode Produk </label>
									<input type="text" class="form-control" id="kode" name="kode" placeholder="Masukkan Kode"  value="">
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Jenis</label>
									<input type="text" class="form-control" id="jenis" name="jenis" placeholder=" Masukkan Jenis Produk"  value="">
								</div>	
							
								<div class="form-group">
									<label for="field-1" class="control-label">Spesifikasi Panjang </label>
									<input type="text" class="form-control nilai" id="panjang" name="panjang" placeholder=" Masukkan Panjang (cm)"  value="">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Spesifikasi Lebar </label>
									<input type="text" class="form-control nilai" id="lebar" name="lebar" placeholder=" Masukkan Lebar (cm)"  value="">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Spesifikasi Tinggi </label>
									<input type="text" class="form-control nilai" id="tinggi" name="tinggi" placeholder=" Masukkan Tinggi (cm)"  value="">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Spesifikasi Berat </label>
									<input type="text" class="form-control nilai" id="barat" name="barat" placeholder=" Masukkan Berat  (gram)"  value="">
								</div>
								
								
						</div>

						

						<div class="col-md-6">
						
						<div class="form-group">
									<label for="field-1" class="control-label">Keterangan Isi</label>
									<input type="text" class="form-control" id="isi" name="isi" placeholder=" Masukkan Isi"  value="">
								</div>
							
						<div class="form-group">
									<label for="field-1" class="control-label">Informasi Lainnya</label>
									<input type="text" class="form-control" id="lainnya" name="lainnya" placeholder=" Masukkan Informasi Lainnya"  value="">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Harga Jual Produk *</label>
									<input type="text" class="form-control" id="harga" name="harga" placeholder=" Masukkan Harga Produk"  value="">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Nilai Penjualan</label>
									<input type="text" class="form-control nilai" id="nilai" name="nilai" placeholder=" Masukkan Nilai Penjualan dalam Setahun"  value="">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Bahan</label>
									<input type="text" class="form-control nilai" id="Bahan" name="Bahan" placeholder=" Masukkan Bahan"  value="">
								</div>
			

								<div class="form-group">
									<label for="field-1" class="control-label"> Wilayah Pemasaran *</label>
									<select class="form-control select3" name="pemasaran_id[]" id="pemasaran_id" multiple="multiple" placeholder="Pilih Pemasaran" required>
							
										<?php
											foreach($masterpemasaran->result_array() as $row) {
												echo "<option value='".$row['id']."' >".$row['pemasaran']."</option>";

											}
										?>
									</select>
								</div>	
							

									<div class="form-group">

									<label for="field-1" class="control-label">Upload Gambar Produk</label>
									<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
									<div class="input-group">
										<div class="form-control uneditable-input" data-trigger="fileinput">
											<i class="glyphicon glyphicon-file fileinput-exists"></i>
											<span class="fileinput-filename"><?php echo set_value('gambar') ?></span>
										</div>
										<span class="input-group-addon btn btn-default btn-file">

											<span class="fileinput-new">Select file</span>
											<span class="fileinput-exists">Change</span>
											<input type="file" name="gambar" >

										</span>

										<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>

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



