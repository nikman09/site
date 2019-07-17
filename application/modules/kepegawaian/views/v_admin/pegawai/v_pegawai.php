<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>arsip">
			<i class="fa fa-list"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>arsip/pegawai">Pegawai</a>
	</li>
	<li class="active">
		<strong>List Pegawai</strong>
	</li>
</ol>

<h3>List Pegawai</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menghapus Data Pegawai","Gagal Menghapus Data Pegawai","Berhasil Mengganti Password") ?>
	<a style="margin: 5px 0 10px 0px" href="<?php echo base_url() ?>kepegawaian/admin/pegawaitambah" class="btn  btn-primary">
		<i class="fa fa-plus"></i> Tambah Pegawai</a>
	<table class="table table-bordered  datatable" id="table-1" style="font-size:12px">
		<thead>
			<tr>
				<th width="80px">Aksi</th>
				<th>Nama</th>
				<th>NIP</th>
				<th>Jenis Kelamin</th>
				<th>Tempat / Tanggal Lahir</th>
				<th>Pangkat</th>
				<th>Jabatan</th>
				<th width="40px">Foto</th>
			</tr>
		</thead>
		<tbody>
			<?php
					foreach($data->result_array() as $row){
						echo "
							<tr>
								<td>
								<div style='width:100px'>
									<a href='".base_url('kepegawaian/admin/pegawailihat?id='.$row['id_pegawai'].'')."' class='btn btn-default btn-xs ' title='Lihat'><i class='fa fa-eye'></i></a>
									<a href='#' class='btn btn-info btn-xs kunci' title='Password' data-toggle='modal' id='".$row['id_pegawai']."' data-target='#myModal'><i class='fa fa-key' id='".$row['id_pegawai']."'  ></i></a>
									<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_pegawai']."'><i class='fa fa-trash-o'></i></a>
									<a href='".base_url('kepegawaian/admin/pegawaiedit?id='.$row['id_pegawai'].'')."' class='btn btn-primary btn-xs edit' title='Edit' id='".$row['id_pegawai']."'><i class='fa fa-edit'></i></a>
								</div>
								</td>
								<td>".$row['nama']."</td>
								<td>".$row['nip']."</td>
								<td>".$row['jk']."</td>
								<td>";
								if ($row['tanggal_lahir']!="0000-00-00") echo $row['tempat_lahir']." / ".$row['tanggal_lahir'];
								echo "</td>
								<td>".$row['pangkat']."</td>
								<td>".$row['nama_jabatan']."</td>
								<td>";
								if ($row['foto']!="") echo "<a href='".base_url()."assets/images/foto/".$row['foto']."' target='_blank' class='btn btn-success btn-xs'><i class='fa fa-image'></i> Lihat </a>";
								else echo "<a class='btn btn-danger btn-xs' target='_blank' disabled><i class='fa fa-image'></i> Lihat </a>";
								echo "
								</td>
							</tr>
						";
					}
				?>
		</tbody>
	</table>
</div>

<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content"  id="modal-lihat">
				
			
			</div>
		</div>
	</div>
