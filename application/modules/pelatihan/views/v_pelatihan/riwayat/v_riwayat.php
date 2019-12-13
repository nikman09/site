<div class="container">
	<div class="row">
		<div class="col-md-12">
			<hr class="no-top-margin" />
		</div>
	</div>	
</div>
<div class="container">
	<div class="row vspace">
		<div class="col-md-12">
		<h3 align="center">Riwayat Pendaftaran Pelatihan</h3>
		<table class="table  table-strip datable" id="table-1" style="font-size:12px;width:100%" >
		<thead>
			<tr>

				<th>No</th>
				<th>Nama Pelatihan</th>
				<th>Kategori</th>
				<th>Tanggal Pendaftaran</th>
				<th>Status</th>
				<th>#</th>
			</tr>
		</thead>
		<tbody>
		
			<?php
					$i = 0;
					foreach($data->result_array() as $row){
						$i++;
						echo "
							<tr>
								<td>".$i."</td>
								<td>".$row['nama']."</td>
								<td>".$row['kategori']."</td>
								<td>".tgl_indo($row['mulaipendaftaran'])." - ".tgl_indo($row['akhirpendaftaran'])."</td>
								<td>".$row['status']."</td>
								<td><a href='".base_url()."site/pelatihan/riwayatstatus?id=".$row['id_pelatihandaftar']."' class='btn btn-success  btn-icon icon-left btn-xs' ><i class='fa fa-info'></i>status</td>
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
    <div class="modal-dialog">
        <div class="modal-content" id="modal-edit">
          
         
        </div>
    </div>
</div>
