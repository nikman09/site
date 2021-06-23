

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

		<form id="form" role="form"  action="<?php echo base_url() ?>simanis/editproduk" method="post"  enctype="multipart/form-data" >
                    <div class="row">

		<div class="row">

					<div class="col-md-12">

					<?php pesan_get2('msg',"Berhasil Menyimpan Data Usaha !") ?>

						<h3>Edit Data Produk</h3>

						<hr/>

						

					</div>

					</div>

					<div class="row">

					



						<div class="col-md-6">	
								
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
							<input type="hidden" name="id_produk" value="<?=$data['id']?>">
								<div class="form-group">
									<label for="field-1" class="control-label">Nama Produk *</label>
									<input type="text" class="form-control" id="produk" name="produk" placeholder="Masukkan Produk"  value="<?php echo $data['produk'] ?>">
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Kode Produk </label>
									<input type="text" class="form-control" id="kode" name="kode" placeholder="Masukkan Kode"  value="<?php echo $data['kode'] ?>">
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Jenis</label>
									<input type="text" class="form-control" id="jenis" name="jenis" placeholder=" Masukkan Jenis Produk"  value="<?php echo $data['jenis'] ?>">
								</div>	
							
								<div class="form-group">
									<label for="field-1" class="control-label">Spesifikasi Panjang </label>
									<input type="text" class="form-control nilai" id="panjang" name="panjang" placeholder=" Masukkan Panjang (cm)"  value="<?php echo $data['panjang'] ?>">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Spesifikasi Lebar </label>
									<input type="text" class="form-control nilai" id="lebar" name="lebar" placeholder=" Masukkan Lebar (cm)"  value="<?php echo $data['lebar'] ?>">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Spesifikasi Tinggi </label>
									<input type="text" class="form-control nilai" id="tinggi" name="tinggi" placeholder=" Masukkan Tinggi (cm)"  value="<?php echo $data['tinggi'] ?>">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Spesifikasi Berat </label>
									<input type="text" class="form-control nilai" id="barat" name="barat" placeholder=" Masukkan Berat  (gram)"  value="<?php echo $data['berat'] ?>">
								</div>
								
								
						</div>

						

						<div class="col-md-6">
						
						<div class="form-group">
									<label for="field-1" class="control-label">Keterangan Isi</label>
									<input type="text" class="form-control" id="isi" name="isi" placeholder=" Masukkan Isi"  value="<?php echo $data['isi'] ?>">
								</div>
							
						<div class="form-group">
									<label for="field-1" class="control-label">Informasi Lainnya</label>
									<input type="text" class="form-control" id="lainnya" name="lainnya" placeholder=" Masukkan Informasi Lainnya"  value="<?php echo $data['lainnya'] ?>">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Harga Jual Produk *</label>
									<input type="text" class="form-control" id="harga" name="harga" placeholder=" Masukkan Harga Produk"  value="<?php echo $data['harga'] ?>">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Nilai Penjualan</label>
									<input type="text" class="form-control nilai" id="nilai" name="nilai" placeholder=" Masukkan Nilai Penjualan dalam Setahun"  value="<?php echo $data['nilai'] ?>">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Bahan</label>
									<input type="text" class="form-control" id="bahan" name="bahan" placeholder=" Masukkan Bahan"  value="<?php echo $data['bahan'] ?>">
								</div>
			

								<div class="form-group">
									<label for="field-1" class="control-label"> Wilayah Pemasaran *</label>
									<select class="form-control select3" name="pemasaran_id[]" id="pemasaran_id" multiple="multiple" placeholder="Pilih Pemasaran" required>
							
										<?php
											foreach($masterpemasaran->result_array() as $row) {
												echo "<option value='".$row['id']."'";
												foreach($pemasaran->result_array() as $row2) {
													echo $row['id']==$row2['pemasaran_id']?"selected":"";
	
												}
												echo ">".$row['pemasaran']."</option>";

											}
										?>
									</select>
								</div>	
							

								<div class="form-group">
									<label class=" control-label">Upload Gambar Produk</label>
								
									<div class="fileinput <?php  echo ($data['gambar']=="") ? "fileinput-new":"fileinput-exists" ?> " data-provides="fileinput">
									<input type="hidden" value="<?php echo $data['gambar'] ?>" name="gambar">
											<div class="input-group">
												<div class="form-control uneditable-input" data-trigger="fileinput">
													<i class="glyphicon glyphicon-file fileinput-exists"></i>
													<span class="fileinput-filename"> <?php echo $data['gambar'] ?></span>
												</div>
												<span class="input-group-addon btn btn-default btn-file">
													<span class="fileinput-new">Select file</span>
													<span class="fileinput-exists">Change</span>
													<input type="file" name="gambar" id="gambar">
												</span>
												<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
											</div>
										</div>
							
								</div>

						</div>

                    </div>
					<div class="row">

					<div class="col-md-12">
					<button type="submit" class="btn btn-primary  btn-icon icon-left  daftar" style="float:right;margin-left:10px"><i class='fa fa-save'></i>Simpan</button>
												
					<a href="<?php echo base_url("simanis/produk?id=".$data['perusahaan_id']."") ?>" class="btn btn-default  btn-icon icon-left  daftar" style="float:right"><i class='fa fa-arrow-left'></i>Kembali</a>
						
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



