<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>simanis/admin">
            <i class="fa fa-newspaper-o"></i>Admin</a>
    </li>
    <li class="active">
        <strong>Pelatihan</strong>
    </li>
</ol>

<h3>Pelatihan</h3>
<div class="row">
    <div class="col-md-12">
    <div class="row">
        <form role="form" class="form-horizontal"  action="<?php echo base_url() ?>simanis/admin/seleksipendaftaran"	method="post"  id="form"> 	
           
        <div class="col-md-12">    
        
        <?php pesan_get('msg',"Berhasil Mengubah Pelatihan Yang Aktif","Berhasil Mengedit Status Seleksi","Berhasil Menghapus Pelatihan") ?>
           
                <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                    <div class="form-group">
                        <label class="col-sm-2 control-label " style="margin-top:5px;">Pelatihan yang Aktif</label>
                        <div class="col-sm-8" style="margin-top:5px">
                        <select  id="pelatihanaktif"  class="form-control" name="pelatihanaktif"  data-rule-required="true"> 
                        <?php 
                                foreach($pelatihan->result_array() as $row ){
                                    echo "<option value='".$row["id_pelatihan"]."' ".($pelatihanaktif==$row["id_pelatihan"]?"selected":"").">".$row["nama"]."</<option>";

                                }
                        ?>
							
						</select>
                         </div>
                         <div class="col-sm-2 text-right"  style="margin-top:5px">
                            <button type="submit" class="btn  btn-default btn-icon icon-left"  id="tambahpelanggan"  style=""><i class="fa fa-check" ></i> Pilih Pelatihan</button>
                           
                        </div>
                    </div>
                    
						
                   
                                 
                </div>
                <div class="col-md-6">    
                <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                
                    <div class="form-group">
                        <label class="col-sm-4 control-label" style="margin-top:5px">Kategori</label>
                        <div class="col-sm-8" style="margin-top:5px">
                             <input type="text" value="<?php echo $detail["kategori"] ?>"  id="id_pelatihan"  class="form-control" name="id_pelatihan"  readonly /> 
                         </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" style="margin-top:5px">Tanggal Pendaftaran</label>
                        <div class="col-sm-8" style="margin-top:5px">
                             <input type="text" value="<?php echo tgl_indo($detail['mulaipendaftaran'])." - ".tgl_indo($detail['akhirpendaftaran']) ?>"  id="id_pelatihan"  class="form-control" name="id_pelatihan"  readonly /> 
                         </div>
                    </div>
						
                   
                                 
                </div>

                <div class="col-md-6">    
                     <div class="form-group">
                        <label class="col-sm-4 control-label" style="margin-top:5px">Tanggal Pengumuman</label>
                        <div class="col-sm-8" style="margin-top:5px">
                             <input type="text" value="<?php echo tgl_indo($detail["pengumuman"]) ?>"  id="id_pelatihan"  class="form-control" name="id_pelatihan"  readonly /> 
                         </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" style="margin-top:5px">Tanggal Pelatihan</label>
                        <div class="col-sm-8" style="margin-top:5px">
                             <input type="text" value="<?php echo tgl_indo($detail['mulaipelatihan'])." - ".tgl_indo($detail['akhirpelatihan']) ?>"  id="id_pelatihan"  class="form-control" name="id_pelatihan"  readonly /> 
                         </div>
                    </div>
                    <div class="text-right"  style="margin-top:5px">
                            <a class="btn  btn-primary btn-icon icon-left syarat"  id="<?= $detail["id_pelatihan"] ?>" data-toggle="modal" data-target="#myModal5" style=""><i class="fa fa-list" ></i> Persyaratan</a>
                           
                        </div>           
                </div>
            </form>
		</div>
        <hr/>
    <div class="row">
			<div class="col-sm-3 col-xs-12">
		
				<div class="tile-stats tile-default">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="<?= $totalpendaftar ?>" data-postfix="" data-duration="500" data-delay="0">0</div>
		
					<h3>Total Pendaftar</h3>
					<p></p>
				</div>
			</div>
			<div class="col-sm-3 col-xs-12">
		
				<div class="tile-stats tile-white">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="<?= $menungguhasil ?>" data-postfix="" data-duration="500" data-delay="0">0</div>
		
					<h3>Menunggu Hasil Seleksi</h3>
					<p></p>
					</div>
			</div>
			
			<div class="clear visible-xs"></div>
			<div class="col-sm-3 col-xs-12">
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="<?= $lulusseleksi ?>" data-postfix="" data-duration="500" data-delay="0">0</div>

					<h3>Lulus Seleksi</h3>
					<p></p>
				</div>
			</div>
            <div class="col-sm-3 col-xs-12">
				<div class="tile-stats tile-red">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="<?= $tidaklulus ?>" data-postfix="" data-duration="500" data-delay="0">0</div>

					<h3>Tidak Lulus Seleksi</h3>
					<p></p>
				</div>
			</div>
		</div>
       
        <div class="text-right"  style="margin-top:5px;margin-bottom:5px">
                            <a href="<?php echo base_url("simanis/admin/pendaftaranexcel") ?>" class="btn  btn-success btn-icon icon-left syarat"  id="<?= $detail["id_pelatihan"] ?>" style=""><i class="fa fa-file-excel-o" ></i> Export to Excel</a>
                           
                        </div>
                        <br/>
        <div class="table-responsive">
            <table class="table table-bordered datatable "  id="table-1" style="font-size:12px">
                <thead>
                    <tr>
                        <th width="120px">Aksi</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Usia</th>
                        <th>Kab/Kota</th>
                        <th>Nomor HP</th>
                        <th>Pendidikan</th>
                        <th>Biodata</th>
                        <th>Data Usaha</th>
                        <th>SIIKALSEL</th>
                        <th>Data Dukung</th>
                        <th>Seleksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
					foreach($data->result_array() as $row){
                        $biodata = $this->m_admin_akun->lihatdatasatu($row["id_akun"])->row_array();
                        $dukungjumlah = $this->m_admin_berkas->lihatdataakun($row["id_akun"])->num_rows();
                        $jumlahusaha = $this->m_pelatihan_perusahaan->lihatdataakun($row["id_akun"])->num_rows();
						echo "
                            <tr>
                                <td>
                                <div>
								<!--	<a href='#' class='btn btn-primary btn-xs' title='Edit/Lihat' id='".$row['id_pelatihan']."' disabled><i class='fa fa-eye' id='".$row['id_pelatihan']."'  ></i></a> -->
                                    <a href='".base_url('simanis/admin/cetakbiodata')."?id=".$row['id_akun']."' class='btn btn-danger btn-xs pdf' title='Export PDF' id='".$row['id_pelatihan']."' target='_blank'><i class='fa fa-file-pdf-o'></i></a>
                                    <a href='https://wa.me/".ubahwa($row['nohp'])."' class='btn btn-success btn-xs ' title='Whatsapp' id='".$row['id_pelatihan']."' target='_blank'><i class='fa fa-whatsapp'></i></a>
                                    <a href='#' class='btn btn-primary btn-xs hapusx' title='Hapus' id='".$row['id_pelatihandaftar']."' disabled><i class='fa fa-trash-o'></i></a>
                                    ";
                                    if ($row['foto']=="") {
                                        echo "<a href='#' class='btn btn-default btn-xs ' title='Whatsapp' id='".$row['id_pelatihan']."'  disabled><i class='fa fa-image'></i></a>";
                                    } else {

                                    echo "<a href='".base_url("assets/images/pelatihan/biodata/")."".$row['foto']."' class='btn btn-default btn-xs ' title='Foto' id='".$row['id_pelatihan']."' target='_blank'><i class='fa fa-image'></i></a>";
                                    }
                                    if ($row['ktp']=="") {
                                        echo "<a href='#' class='btn btn-default btn-xs ' title='Whatsapp' id='".$row['id_pelatihan']."' disabled><i class='fa fa-credit-card' ></i></a>";
                                    } else {
                                    echo "<a href='".base_url("assets/images/pelatihan/biodata/")."".$row['ktp']."'' class='btn btn-default btn-xs ' title='KTP' id='".$row['id_pelatihan']."' target='_blank'><i class='fa fa-credit-card'></i></a>";
                                    }
                                echo "
                                </div>
                                </td>
								<td>".$row['nama']."</td>
								<td>".$row['jk']."</td>
								<td>".hitung_umur($row['tanggallahir'])." th</td>
								<td>".$row['kota']."</td>
                                <td>".$row['nohp']."</td>
                                <td>".$row['pendidikan']."</td>
                                <td><a href='#' class='btn ".(lengkap($biodata)>=100?"btn-primary ":"btn-danger")." btn-sm btn-icon icon-left biodata' title='Lihat Biodata'  data-toggle='modal' id='".$row['id_akun']."' data-target='#myModal2'><i class='fa fa-user' ></i> ".lengkap($biodata)." %</a> </td>
                                
                                <td><a href='#' class='btn ".(usaha($biodata)>=100?"btn-primary ":"btn-danger")." btn-sm btn-icon icon-left usaha' title='Usaha'  data-toggle='modal' id='".$row['id_akun']."' data-target='#myModal3'><i class='fa fa-industry'></i> ".usaha($biodata)." %</a></td>
                                
                                <td><a href='".base_url("simanis/admin/perusahaan?id=".$row['id_akun']."")."' class='btn ".($jumlahusaha>=1?"btn-primary ":"btn-danger")." btn-sm btn-icon icon-left usaha' title='Usaha'  data-toggle='modal' id='".$row['id_akun']."'  target='_blank'><i class='fa fa-database'></i> ".$jumlahusaha." </a></td>
                               
                                <td><a href='#' class='btn ".($dukungjumlah>=1?"btn-primary ":"btn-danger")." btn-sm btn-icon icon-left dukung' title='Data Dukung'  data-toggle='modal' id='".$row['id_akun']."' data-target='#myModal6'><i class='fa fa-list'></i> ".$dukungjumlah."</a></td>
                               
                                <td><a href='#' class='btn ";
                                if ($row['status']=='Menunggu Hasil Seleksi')  echo 'btn-default';
                                else if ($row['status']=='Lulus Seleksi')  echo 'btn-success';
                                else if ($row['status']=='Tidak Lulus Seleksi')  echo 'btn-danger';
                                    
                                echo " btn-sm btn-icon icon-left seleksi' title='Edit/Lihat' id='".$row['id_pelatihandaftar']."' data-target='#myModal4'  data-toggle='modal' ><i class='fa fa-edit'></i> ".$row['status']."</a>";
                                
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modal-biodata">

        </div>
    </div>
</div>


<div class="modal fade" id="myModal3">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modal-usaha">

        </div>
    </div>
</div>


<div class="modal fade" id="myModal4">
    <div class="modal-dialog ">
        <div class="modal-content" id="modal-seleksi">

        </div>
    </div>
</div>

<div class="modal fade" id="myModal5">
    <div class="modal-dialog ">
        <div class="modal-content" id="modal-edit">

        </div>
    </div>
</div>

<div class="modal fade" id="myModal6">
    <div class="modal-dialog ">
        <div class="modal-content" id="modal-dukung">

        </div>
    </div>
</div>
