<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Lihat Data Usaha Industri</h4>
            </div>
            <form role="form" class="validate" id="form2">

                <div class="modal-body">
            	<form id="form" role="form" class="validate"  action="<?php echo base_url() ?>simanis/biodata" method="post"  enctype="multipart/form-data" >
                <div class="row">
                    <div class="col-md-6">
                    <h4>Data Perusahaan</h4>
                     <hr/>
                        <div class="form-group row" >
                            <label for="" class="col-md-4 control-label">Nama Usaha / Perusahaan</label>
                            <span class="col-md-8">: <?php echo $data['unama']; ?></span>
                        </div>
                        
                        <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Nama Pemilik</label>
                            <span class="col-md-8"> : <?php echo $data['upemilik']; ?> </span>
                        </div>	
                        <span><strong>Alamat Perusahaan</strong></span>
                        <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Jalan</label>
                            <span class="col-md-8"> : <?php echo $data['ujalan']; ?> </span>
                        </div>	
                        <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Desa</label>
                            <span class="col-md-8"> : <?php echo $data['udesa']; ?> </span>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Kecamatan</label>
                            <span class="col-md-8"> : <?php echo $data['ukecamatan']; ?> </span>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Nomor Telepon Usaha</label>
                            <span class="col-md-8"> : <?php echo $data['utelp']; ?> </span>
                        </div>	
                        <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Jenis Komoditi</label>
                            <span class="col-md-8"> : <?php echo $data['ukomoditi']; ?> </span>
                        </div>	
                        <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Bentuk Badan Usaha</label>
                            <span class="col-md-8"> : <?php echo $data['ubentuk']; ?> </span>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Jumlah Tenaga Kerja</label>
                            <span class="col-md-8"> : <?php echo $data['utenagakerja']; ?> </span>
                        </div>	
                    </div>

                <div class="col-md-6">
                <h4>Data Produk</h4>
                     <hr/>
                      <div class="form-group row">
                        <label for="" class="col-md-4 control-label">Nama Produk</label>
                        <span class="col-md-8"> : <?php echo $data['uproduk']; ?> </span>
                      </div>	
                      <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Merek</label>
                            <span class="col-md-8"> : <?php echo $data['umerek']; ?> </span>
                      </div>	
                      <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Nilai Investasi</label>
                            <span class="col-md-8"> : <?php echo $data['uinvestasi']; ?> </span>
                      </div>
                      <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Jumlah kapasitas Produksi</label>
                            <span class="col-md-8"> : <?php echo $data['ujumlahproduksi']; ?> </span>
                      </div>
                      <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Satuan Kapasitas Produksi</label>
                            <span class="col-md-8"> : <?php echo $data['usatuanproduksi']; ?> </span>
                      </div>
                      <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Nilai Produksi</label>
                            <span class="col-md-8"> : <?php echo $data['unilaiproduksi']; ?> </span>
                      </div>
                      <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Nilai Bahan Baku & Bahan Penolon</label>
                            <span class="col-md-8"> : <?php echo $data['unilaibahanbaku']; ?> </span>
                      </div>
                      <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Daerah Pemasaran</label>
                            <span class="col-md-8"> : <?php echo $data['upemasaran']; ?> </span>
                      </div>
                

                            
                      <hr/>
                    <div class="form-group row">
                        <label for="" class="col-md-4 control-label">Foto Produk</label>
                        <span class="col-md-8">
                         <?php if ($data['ufotoproduk']!="") { ?>
                            <img src="<?php echo base_url()."assets/images/pelatihan/produk/".$data['ufotoproduk'] ?>" alt="..." width="100px">
                         <?php  }?>
                        </span>
                    </div>
						
					
						

					
                    

				
	
</div>
</div>

                </div>
                <div class="modal-footer">
                  
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>

            </form>