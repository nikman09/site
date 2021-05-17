
<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Persyaratan <br/>  <small> <?= $data['nama'] ?> </small></h4>
            </div>
          
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <table style=" border-spacing: 10px;
        border-collapse: separate;">
                <tr>
                    <td width="150px">
                    Nama Pelatihan
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    <?php echo  $data['nama'] ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    Kategori
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    <?php echo  $data['kategori'] ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    Tanggal Pendaftaran
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    <?php
                        echo tgl_indo($data['mulaipendaftaran'])." s.d ".tgl_indo($data['akhirpendaftaran']).""; 
                    ?>
                    </td>
                </tr>

                <tr>
                    <td>
                    Tanggal Pengumuman Seleksi
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    <?php
                        echo tgl_indo($data['pengumuman']); 
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    Tanggal Pelatihan
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    <?php
                        echo tgl_indo($data['mulaipelatihan'])." s.d ".tgl_indo($data['akhirpelatihan']).""; 
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    Tempat Pelatihan
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    <?php
                        echo $data['tempat']; 
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    Kuota Peserta
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    <?php
                        echo $data['kuota']; 
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    Contact Person
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    <?php
                        echo $data['cp']; 
                    ?>
                    </td>
                </tr>
                
                        <?php 
                            if  ($data['file']!="") {
                        ?>
                            <tr>
                                <td>
                                Lampiran
                                </td>
                                <td>
                                : 
                                </td>
                                <td>
                            <a href="<?php echo base_url() ?>assets/images/pelatihan/lampiran/<?php echo $data['file'] ?>" target="_blank"><i class="fa fa-download"></i> unduh </a>
                            
                                    </td>
                                </tr>
                        <?php 
                            }
                        ?>

            </table>
                        <hr/>
                        <h4>Persyaratan</h4>
							<?= $data['persyaratan'] ?>
                        </div>

                      
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                    &nbsp
                    <?php 
                    if (date("Y-m-d")>=$data['mulaipendaftaran'] && date("Y-m-d")<=$data['akhirpendaftaran']) {
                            
                        
                        	if ($stat=="login") {
											if ($ada==1) {
												if ($item["status"]=="Menunggu Hasil Seleksi") {
													echo "
													<a href='".base_url()."simanis/status?msg=0' class='btn btn-primary  btn-icon icon-left  daftar' disabled><i class='fa fa-list'></i> Daftar</a>";
												} else if ($item["status"]=="Tidak Lulus Seleksi"){
													echo "
													<a href='".base_url()."simanis/persyaratan?i=".$data['id_pelatihan']."' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a>";
													
												} else if ($item["status"]=="Lulus Seleksi" && $item["id_pelatihan"]!=$data['id_pelatihan']){
													echo "
													<a href='".base_url()."simanis/persyaratan?i=".$data['id_pelatihan']."' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a>";
													
												}else {
													echo "
													<a href='".base_url()."simanis/persyaratan?i=".$data['id_pelatihan']."' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a>";
												}
											} else {
												echo "
												<a href='".base_url()."simanis/persyaratan?i=".$data['id_pelatihan']."' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a>";
											}
										} else {
											echo "
												<a href='".base_url()."simanis/login?msg=0' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a>";
										}
									
									} else if (date("Y-m-d")<$data['mulaipendaftaran']) {
										echo "
										<a  class='btn btn-default  btn-icon icon-left' disabled><i class='fa fa-list'></i> Belum Dibuka</a>";
									} else {
										echo "
										<a class='btn btn-default  btn-icon icon-left' disabled><i class='fa fa-list'></i> Sudah Tutup</a>";
                                    };
                ?>
                </div>

            </form>