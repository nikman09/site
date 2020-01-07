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
        <?php pesan_get('msg',"Berhasil Menambah Data Pendukung","Berhasil Mengedit Dokumen","Berhasil Menghapus Data Pendukung") ?>
            <a href="#" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah   btn-icon icon-left" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus"></i> Tambah Data Pendukung</a>
               
            <table class="table table-bordered datable" id="table-12" style="font-size:12px">
                <thead>
                  <tr>
                        <th width="80px">Aksi</th>
                        <th>Nama Data Pendukung</th>
                        <th>Dokumen Pendukung</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					foreach($data->result_array() as $row){
						echo "
							<tr>
								<td>
								<div>
									<a href='#' class='btn btn-primary btn-xs edit' title='Edit' data-toggle='modal' id='".$row['id_berkas']."' data-target='#myModal2'><i class='fa fa-edit' id='".$row['id_berkas']."'></i></a>
									<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_berkas']."'><i class='fa fa-trash-o'></i></a>
								</div>
								</td>
                                <td>".$row['nama']."</td>
                                <td>";
                                if ($row['file']!="") {

									echo "<a href='".base_url()."assets/images/dokumen/".$row['file']."' class='btn btn-primary btn-xs btn-icon icon-left ' title='Edit'  id='".$row['id_berkas']."'target='_blank' ><i class='fa fa-download' id='".$row['id_berkas']."'></i> LIHAT</a>";
                                } else {
                                    echo "<a href='#' class='btn btn-default btn-xs' disabled> <i class='fa fa-download'></li></a>";    
                                }
                                echo "</td>
							</tr>
						";
					}
				?>
                </tbody>
            </table>
    </div>
</div>
