<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>ppelatihan/admin">
            <i class="fa fa-newspaper-o"></i>Ppelatihan/admin</a>
    </li>
    <li class="active">
        <strong>Pengumuman</strong>
    </li>
</ol>

<h3>Pengumuman</h3>
<div class="row">
    <div class="col-md-12">
        <?php pesan_get('msg',"Berhasil Menambah Pengumuman","Berhasil Mengedit Pengumuman","Berhasil Menghapus Pengumuman") ?>
            <a href="<?php echo base_url() ?>simanis/admin/pengumumantambah" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah  btn-icon icon-left">
                <i class="fa fa-plus"></i> Tambah Pengumuman</a>
            <table class="table table-bordered datatable" id="table-1" style="font-size:12px">
                <thead>
                    <tr>
                        <th width="50px">Aksi</th>
						<th>Tanggal</th>
                        <th>Kategori</th>
						<th>Judul</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					foreach($data->result_array() as $row){
						echo "
							<tr>
								<td>
								<div>
									<a href='".base_url("simanis/admin/pengumumanedit?id=".$row['id_pengumuman']."")."' class='btn btn-primary btn-xs' title='Edit/Lihat' id='".$row['id_pengumuman']."'><i class='fa fa-edit' id='".$row['id_pengumuman']."'  ></i></a>
									<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_pengumuman']."'><i class='fa fa-trash-o'></i></a>
								</div>
								</td>
                                <td>".tanggal($row['tanggal'])."</td>
                                <td>".$row['kategori']."</td>
                                <td><strong>".$row['judul']."</strong></td>
                       
                                <td><mark style='".($row['status']=='Publish'?'background-color: green;color:#fff':'background-color: orange;color:#fff')."'>".$row['status']."</mark></td>
								

							</tr>
						";
					}
				?>
                </tbody>
            </table>
    </div>
</div>