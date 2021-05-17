<?php $this->load->view("v_admin/template/header") ?>



<div class="row">
			<div class="col-sm-4 col-xs-12">
		
				<div class="tile-stats tile-red">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $jumlahpegawai ?>" data-postfix="" data-duration="500" data-delay="0">0</div>
		
					<h3>Total Pegawai</h3>
					<p>Dinas Perindustrian Pemprov Kalsel.</p>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
		
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $jumlahpegawailk ?>" data-postfix="" data-duration="500" data-delay="0">0</div>
		
					<h3>Pegawai Laki-laki</h3>
					<p>Dinas Perindustrian Pemprov Kalsel.</p>
					</div>
			</div>
			
			<div class="clear visible-xs"></div>
			<div class="col-sm-4 col-xs-12">
				<div class="tile-stats tile-aqua">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $jumlahpegawaipr ?>" data-postfix="" data-duration="500" data-delay="0">0</div>

					<h3>Pegawai Perempuan</h3>
					<p>Dinas Perindustrian Pemprov Kalsel.</p>
				</div>
			</div>
		</div>
		
		<br />
		<script type="text/javascript">
		jQuery(document).ready(function($)
		{
			// Sample Toastr Notification
			setTimeout(function()
			{
				var opts = {
					"closeButton": true,
					"debug": false,
					"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
					"toastClass": "black",
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};
		
				toastr.success("Selamat Datang", "SIDAWAIPRIN", opts);
			}, 1000);
		
		
			// Sparkline Charts
			$('.pie').sparkline('html', {type: 'pie',borderWidth: 0, sliceColors: ['#3d4554', '#ee4749','#00b19d']});

			$('.pageviews').sparkline('html', {type: 'bar', height: '30px', barColor: '#ff6264'} );
			$('.uniquevisitors').sparkline('html', {type: 'bar', height: '30px', barColor: '#00b19d'} );
			// Donut Chart
			// Donut Chart
			var gender_chart = $("#gender_chart");
		
			gender_chart.parent().show();
		
			var donut_chart = Morris.Donut({
				element: 'gender_chart',
				data: [
					{label: "Laki-laki", value: <?php echo $jumlahpegawailk ?>},
					{label: "Perempuan", value: <?php echo $jumlahpegawaipr ?>}
				],
				colors: ['#707f9b', '#455064', '#242d3c']
			});
		
			gender_chart.parent().attr('style', '');
		
			var golongan_chart = $("#golongan_chart");
		
			golongan_chart.parent().show();
		
			var donut_chart = Morris.Donut({
				element: 'golongan_chart',
				data: [
					{label: "Golongan I", value: <?php echo $gol1 ?>},
					{label: "Golongan II", value: <?php echo $gol2 ?>},
					{label: "Golongan III", value: <?php echo $gol3 ?>},
					{label: "Golongan IV", value: <?php echo $gol4 ?>}
				],
				colors: ['#707f9b', '#455064', '#242d3c']
			});
		
			golongan_chart.parent().attr('style', '');

			var jabatan_chart = $("#jabatan_chart");
		
			jabatan_chart.parent().show();
		
			var donut_chart = Morris.Donut({
				element: 'jabatan_chart',
				data: [
					{label: "Struktural", value: <?php echo $struktural ?>},
					{label: "Fungsional Umum", value: <?php echo $fungsionalumum ?>},
					{label: "Fungsional Tertentu", value: <?php echo $fungsionaltertentu ?>}
				],
				colors: ['#707f9b', '#455064', '#242d3c']
			});
		
			jabatan_chart.parent().attr('style', '');
		});
		function getRandomInt(min, max)
		{
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}
		</script>
		<div class="row">
		<div class="col-sm-6">
		
		<div class="panel panel-primary" id="charts_env">

			<div class="panel-heading">
				<div class="panel-title">Data Grafik</div>

				<div class="panel-options">
					<ul class="nav nav-tabs">
						<li class=""><a href="#gender" data-toggle="tab">Gender</a></li>
						<li class="active"><a href="#golongan" data-toggle="tab">Golongan</a></li>
						<li class=""><a href="#jabatan" data-toggle="tab">Jabatan</a></li>
					</ul>
				</div>
			</div>

			<div class="panel-body">

				<div class="tab-content">

					<div class="tab-pane" id="gender">
						<div id="gender_chart" class="morrischart" style="height: 485px;"></div>
					</div>

					<div class="tab-pane active" id="golongan">
						<div id="golongan_chart" class="morrischart" style="height: 485px;"></div>
					</div>
					<div class="tab-pane" id="jabatan">
						<div id="jabatan_chart" class="morrischart" style="height: 485px;"></div>
					</div>

				

				</div>

			</div>

			<table class="table table-bordered table-responsive">

				<thead>
					<tr>
						<th width="50%" class="col-padding-1">
							<div class="pull-left">
								<div class="h4 no-margin">Pegawai Belum Mengisi Data Golongan</div>
								<small><?php echo $belummengisi ?></small>
							</div>
							<span class="pull-right pageviews">2,1</span>

						</th>
						<th width="50%" class="col-padding-1">
							<div class="pull-left">
								<div class="h4 no-margin">Pegawai Belum Mengisi Data Jabatan</div>
								<small><?php echo $belummengisi2 ?></small>
							</div>
							<span class="pull-right uniquevisitors">4,5</span>
						</th>
					</tr>
				</thead>

			</table>

		</div>

	</div>

	<div class="col-sm-6">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Pangkat</div>

				<div class="panel-options">
				
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>

			<table class="table table-bordered table-responsive" style="font-size:11px">
				<thead>
					<tr>
						<th>Golongan</th>
						<th>Tingkat</th>
						<th>Jumlah</th>
						
					</tr>
				</thead>

				<tbody>
				<?php
				$temp = 1;
					foreach($pangkat->result_array() as $row){
						echo "
							<tr>";
							if ($row['golongan']!=$temp) {
								echo "<td>".$row['golongan']."</td>";
							} else {
								echo "<td></td>";
							}

							echo "
								<td>".$row['pangkat']."</td>
								<td>".$row['jumlah']."</td>
							</tr>";
							$temp = $row['golongan'];
					}
				?>
				<tr>
				<td colspan="2">Pegawai Belum Mengisi Data Pangkat</td>
				<td><?php echo $belummengisi; ?></td>
			    </tr>
				</tbody>
			</table>
		</div>

	</div>


		</div>
<!-- Footer -->
<footer class="main">

	&copy;
	<?php echo date('Y') ?>
	<strong>SIDAWAIPRIN</strong>km  (Sistem Informasi Data Pegawai Dinas Perindustrian)

</footer>

</div>




<!-- Imported styles on this page -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/jvectormap/jquery-jvectormap-1.2.2.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/rickshaw/rickshaw.min.css">

<!-- Bottom scripts (common) -->
<script src="<?php echo base_url() ?>assets/back-end/js/gsap/TweenMax.min.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/bootstrap.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/joinable.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/resizeable.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/neon-api.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


<!-- Imported scripts on this page -->
<script src="<?php echo base_url() ?>assets/back-end/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/rickshaw/vendor/d3.v3.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/rickshaw/rickshaw.min.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/raphael-min.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/morris.min.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/toastr.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/js/neon-chat.js"></script>


<!-- JavaScripts initializations and stuff -->
<script src="<?php echo base_url() ?>assets/back-end/js/neon-custom.js"></script>


<!-- Demo Settings -->
<script src="<?php echo base_url() ?>assets/back-end/js/neon-demo.js"></script>

</body>

</html>
