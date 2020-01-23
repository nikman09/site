<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>pelatihan/admin">
            <i class="fa fa-newspaper-o"></i>Admin</a>
    </li>
    <li class="active">
        <strong>Pelatihan</strong>
    </li>
</ol>

<h3>Pelatihan</h3>
<div class="row">
    <div class="col-md-12">
        <?php pesan_get('msg',"Berhasil Menambah Pelatihan","Berhasil Mengedit Pelatihan","Berhasil Menghapus Pelatihan") ?>
            <a href="<?php echo base_url() ?>pelatihan/admin/pelatihantambah" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah  btn-icon icon-left">
                <i class="fa fa-plus"></i> Tambah Pelatihan</a>
            <table class="table table-bordered datatable"  id="table-1" style="font-size:12px">
                <thead>
                    <tr>
                        <th width="50px">Aksi</th>
                        <th>Nama Pelatihan</th>
                        <th>Kategori</th>
                        <th>Periode Pendaftaran</th>
                        <th>Tanggal Pelatihan</th>
                        <th>Tempat Pelatihan</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                <?php
					foreach($data->result_array() as $row){
						echo "
                            <tr>
                                <td>
                                <div>
									<a href='".base_url("pelatihan/admin/pelatihanedit?id=".$row['id_pelatihan']."")."' class='btn btn-primary btn-xs' title='Edit/Lihat' id='".$row['id_pelatihan']."'><i class='fa fa-edit' id='".$row['id_pelatihan']."'  ></i></a>
									<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_pelatihan']."'><i class='fa fa-trash-o'></i></a>
                                </div>
                                </td>
								<td>".$row['nama']."</td>
								<td>".$row['kategori']."</td>
								<td>".tgl_indo($row['mulaipendaftaran'])." - ".tgl_indo($row['akhirpendaftaran'])."</td>
								<td>".tgl_indo($row['mulaipelatihan'])." - ".tgl_indo($row['akhirpelatihan'])."</td>
                                <td>".$row['tempat']."</td>
                                <td><mark style='".($row['publish']=='Publish'?'background-color: green;color:#fff':'background-color: orange;color:#fff')."'>".$row['publish']."</mark></td>
								<td>
								<a href='#' id='".$row['id_pelatihan']."'  class='btn btn-default syarat' data-toggle='modal'   data-target='#myModal2'>Detail </a></td>
								"; 
									
							
						echo "
							</tr>
						";
					}
				?>
                </tbody>
            </table>
    </div>
</div>


<div class="modal fade" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-edit">

        </div>
    </div>
</div>