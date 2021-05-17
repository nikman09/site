<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>user">
            <i class="fa fa-newspaper-o"></i>Administrator</a>
    </li>
    <li class="active">
        <strong>Kegiatan</strong>
    </li>
</ol>

<h3>Kegiatan</h3>
<div class="row">
    <div class="col-md-12">
        <?php pesan_get('msg',"Berhasil Menambah Kegiatan","Berhasil Mengedit Kegiatan","Berhasil Menghapus Kegiatan") ?>
            <a href="<?php echo base_url() ?>user/kegiatantambah" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah">
                <i class="fa fa-plus"></i> Tambah Kegiatan</a>
            <table class="table table-bordered datatable" id="table-1" style="font-size:12px">
                <thead>
                    <tr>
                        <th width="50px">Aksi</th>
						<th>Tanggal</th>
                        <th>Bidang</th>
                        <th>Kategori</th>
						<th>Judul</th>
                        <th>Penulis</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					foreach($data->result_array() as $row){
						echo "
							<tr>
								<td>
								<div>
									<a href='".base_url("user/kegiatanedit?id=".$row['id_kegiatan']."")."' class='btn btn-primary btn-xs' title='Edit/Lihat' id='".$row['id_kegiatan']."'><i class='fa fa-edit' id='".$row['id_kegiatan']."'  ></i></a>
									<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_kegiatan']."'><i class='fa fa-trash-o'></i></a>
								</div>
								</td>
                                <td>".tanggal($row['tanggal'])."</td>
                                <td>".$row['bidang']."</td>
                                <td>".$row['kategori']."</td>
                                <td><strong>".$row['judul']."</strong></td>
                                <td>".$row['userinput']."</td>

							</tr>
						";
					}
				?>
                </tbody>
            </table>
    </div>
</div>