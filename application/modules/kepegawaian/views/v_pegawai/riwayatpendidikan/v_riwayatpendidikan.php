<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>kepegawaian">
			<i class="fa fa-list"></i>Kepegawaian</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>kepegawaian">Data Pegawai</a>
	</li>
	<li class="active">
		<strong>Riwayat Pendidikan</strong>
	</li>
</ol>

<h3>Data Riwayat Pendidikan</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menghapus Riwayat Pendidikan","Gagal Menghapus Riwayat Pendidikan") ?>
	<a style="margin: 5px 0 10px 0px" href="<?php echo base_url() ?>kepegawaian/riwayatpendidikantambah" class="btn  btn-primary">
		<i class="fa fa-plus"></i> Tambah Riwayat Pendidikan</a>
	<table class="table table-bordered  datatable" id="table-1" style="font-size:12px">
		<thead>
			<tr>
				<th width="80px">Aksi</th>
				<th>Jenjang</th>
				<th>Nama Sekolah/Perguruan Tinggi</th>
				<th>Tahun Lulus</th>
				<th width="40px">Berkas</th>
			</tr>
		</thead>
		<tbody>
			<?php
					foreach($data->result_array() as $row){
						echo "
							<tr>
								<td>
								<a href='#' class='btn btn-info btn-xs kunci' title='Password' data-toggle='modal' id='".$row['id_pegawai']."' data-target='#myModal'><i class='fa fa-key' id='".$row['id_pegawai']."'  ></i></a>
								<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_pegawai']."'><i class='fa fa-trash-o'></i></a>
								</td>
								<td>".$row['pendidikan']."</td>
								<td>".$row['nama']."</td>
								<td>".$row['tahunlulus']."</td>
								<td><a href='".base_url()."assets/berkas/riwayatpendidikan/".$row['berkas']."' target='_blank'><i class='fa fa-file'></i> Lihat</a></td>
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
