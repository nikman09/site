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
		<form id="form" role="form"  action="<?php echo base_url() ?>pelatihan/datausaha" method="post"  enctype="multipart/form-data" >
		
                    <div class="row">
		<div class="row">
					<div class="col-md-12">
					<?php pesan_get2('msg',"Berhasil Menyimpan Data Usaha !") ?>
						<h3>Data Usaha / Perusahaan</h3>
						<hr/>
						
					</div>
					</div>
					<div class="row">
					

						<div class="col-md-4"v>	
								<div class="form-group">
									<label for="field-1" class="control-label">Nama Usaha / Perusahaan</label>
									<input type="text" class="form-control" id="unama" name="unama" placeholder="Masukkan Nama Usaha / Perusahaan"  value="<?php echo $data['unama']; ?>">
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Nama Pemilik</label>
									<input type="text" class="form-control" id="upemilik" name="upemilik" placeholder="Masukkan Nama Pemilik"  value="<?php echo $data['upemilik']; ?>">
								</div>
								<span><strong>Alamat Perusahaan</strong></span>
								<hr style="margin-top:5px"/>
								<div class="form-group col-md-6" style="padding-left:0">
									<label for="field-1" class="control-label">Jalan</label>
									<input type="text" class="form-control" id="ujalan" name="ujalan" placeholder="Masukkan Jalan"  value="<?php echo $data['ujalan']; ?>">
								</div>
								<div class="form-group col-md-6" style="padding-left:0">
									<label for="field-1" class="control-label">Desa</label>
									<input type="text" class="form-control" id="udesa" name="udesa" placeholder="Masukkan Desa"  value="<?php echo $data['udesa']; ?>">
								</div>


							<div class="form-group">
								<label for="field-1" class="control-label">Kecamatan</label>
								<input type="text" class="form-control" id="ukecamatan" name="ukecamatan" placeholder="Masukkan Kecamatan"  value="<?php echo $data['ukecamatan']; ?>">
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Kabupaten/Kota</label>
								<input type="text" class="form-control" id="ukabkota" name="ukabkota" placeholder="Masukkan Kabupaten/Kota"  value="<?php echo $data['ukabkota']; ?>">
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Nomor Telepon Usaha</label>
								<input type="text" class="form-control" id="utelp" name="utelp" placeholder="Masukkan Nomor Telepon"  value="<?php echo $data['utelp']; ?>">
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Jenis Produk </label>
								<select class="form-control" id="ukomoditi" name="ukomoditi" >
									<option value="">.:Pilih Jenis Komiditi:.</option>
										<option value="Makanan dan Minuman" <?= $data['ukomoditi']=="Makanan dan Minuman"?"selected":"" ?>>Makanan dan Minuman</option>
										<option value="Logam" <?= $data['ukomoditi']=="Logam"?"selected":"" ?>>Logam</option>
										<option value="Perhiasan" <?= $data['ukomoditi']=="Perhiasan"?"selected":"" ?>>Perhiasan</option>
										<option value="Herbal" <?= $data['ukomoditi']=="Herbal"?"selected":"" ?>>Herbal</option>
										<option value="Kosmetik" <?= $data['ukomoditi']=="Kosmetik"?"selected":"" ?>>Kosmetik</option>
										<option value="Fashion" <?= $data['ukomoditi']=="Fashion"?"selected":"" ?>>Fashion</option>
										<option value="Industri Kreatif" <?= $data['ukomoditi']=="Industri Kreatif"?"selected":"" ?>>Industri Kreatif</option>
										<option value="Kerajinan" <?= $data['ukomoditi']=="Kerajinan"?"selected":"" ?>>Kerajinan</option>
										<option value="Furniture" <?= $data['ukomoditi']=="Furniture"?"selected":"" ?>>Furniture</option>
								</select>
								</textarea>
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Bentuk Badan Usaha</label>
								<select class="form-control" id="ubentuk" name="ubentuk" >
									<option value="">.:Pilih Bentuk Usaha:.</option>
									<option value="PT" <?= $data['ubentuk']=="PT"?"selected":"" ?>>PT</option>
									<option value="CV" <?= $data['ubentuk']=="CV"?"selected":"" ?>>CV</option>
									<option value="Koperasi" <?= $data['ubentuk']=="Koperasi"?"selected":"" ?>>Koperasi</option>
									<option value="PO" <?= $data['ubentuk']=="PO"?"selected":"" ?>>PO (Perorangan)</option>
								</select>
								</textarea>
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Jumlah Tenaga Kerja</label>
								<input type="text" class="form-control nilai" id="utenagakerja" name="utenagakerja" placeholder="Masukkan Jumlah Tenaga Kerja"  value="<?php echo $data['utenagakerja']; ?>">
							</div>
					
						</div>
						
						<div class="col-md-4">
								<div class="form-group">
								<label for="field-1" class="control-label">Nama Produk</label>
								<input type="text" class="form-control" id="uproduk" name="uproduk" placeholder="Masukkan Nama Produk"  value="<?php echo $data['uproduk']; ?>">
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Merek</label>
								<input type="text" class="form-control" id="umerek" name="umerek" placeholder="Masukkan Merek"  value="<?php echo $data['umerek']; ?>">
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Nilai Investasi</label>
								<input type="text" class="form-control nilai" id="uinvestasi" name="uinvestasi" placeholder="Masukkan Nilai Investasi"  value="<?php echo $data['uinvestasi']; ?>" data-mask="number">
								<span style="font-size:12px">*tanpa tanda koma dan titik</span>
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Jumlah kapasitas Produksi</label>
								<input type="text" class="form-control nilai" id="ujumlahproduksi" name="ujumlahproduksi" placeholder="Masukkan kapasitas Produksi"  value="<?php echo $data['ujumlahproduksi']; ?>" data-mask="number">
								<span style="font-size:12px">*tanpa tanda koma dan titik</span>
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Satuan Kapasitas Produksi</label>
								<input type="text" class="form-control" id="usatuanproduksi" name="usatuanproduksi" placeholder="Masukkan Satuan Produksi"  value="<?php echo $data['usatuanproduksi']; ?>">
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Nilai Produksi</label>
								<input type="text" class="form-control nilai" id="unilaiproduksi" name="unilaiproduksi" placeholder="Masukkan Nilai Produksi"  value="<?php echo $data['unilaiproduksi']; ?>">
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Nilai Bahan Baku & Bahan Penolong</label>
								<input type="text" class="form-control nilai" id="unilaibahanbaku" name="unilaibahanbaku" placeholder="Masukkan Nilai Bahan Baku & Bahan Penolong"  value="<?php echo $data['unilaibahanbaku']; ?>">
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Daerah Pemasaran</label>
								<input type="text" class="form-control" id="upemasaran" name="upemasaran" placeholder="Masukkan Daerah Pemasaran"  value="<?php echo $data['upemasaran']; ?>">
							</div>
						</div>
						<div class="col-md-3">
					<div class="form-group">
					<label for="field-1" class="control-label">	Foto Produk</label>
		
					
					<div class="panel panel-default" data-collapsed="0">
						<div class="panel-body">
							<div class="fileinput <?php  echo ($data['ufotoproduk']=="") ? "fileinput-new":"fileinput-exists" ?> " data-provides="fileinput">
							<input type="hidden" value="<?php echo $data['ufotoproduk'] ?>" name="ufotoproduk">
								<div class="fileinput-new thumbnail" style="max-width: 310px; height: 250px;" data-trigger="fileinput">
								<img src="http://placehold.it/300x400" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 310px; height: 160px;" data-trigger="fileinput">
									<img src="<?php echo base_url()."assets/images/pelatihan/produk/".$data['ufotoproduk'] ?>" alt="...">
								</div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="ufotoproduk" accept="image/*" >
									</span>
									<a href="#" class="btn btn-orange  	fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
							<br/>
							<span>*Max 1 mb</span>
						</div>	
										
					</div>
					
				</div>
					
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
								
						
							
						</div>

                    </div>

					<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary  btn-icon icon-left  daftar" style="float:right"><i class='fa fa-save'></i>Simpan</button>
							</form>
					</div>
		</div>
	</div>
</div>
</div>
