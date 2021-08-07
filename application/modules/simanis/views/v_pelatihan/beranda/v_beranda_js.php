<script>
  	var csfrData = {};
    csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
    $.ajaxSetup({
        data: csfrData
    });	

	$(document).ready(function() {
	
		var $table1 =    $('#table-1').DataTable( {
		
			responsive: true,
			columnDefs: [
				{ responsivePriority: 1, targets: 0 },
				{ responsivePriority: 2, targets: 5 },
				{ responsivePriority: 3, targets: 6 },
			]	,
				"order": [[ 6, "asc" ]],
			
				"lengthChange": false,
				"fnDrawCallback": function () {
						$('.syarat').click(function (e) {
						var v_id_pelatihan = this.id;
						var v_url = "<?php echo base_url() ?>simanis/syarat";
					
						$.ajax({
							type: 'POST',
							url: v_url,
							data: {
								id_pelatihan: v_id_pelatihan
							},
							beforeSend: function () {
							//	$("#loading").show();
							},
							success: function (response) {
							//	$("#loading").hide();
								$('#modal-edit').html(response)
							
								
							}
						});
					});
				}
		});
		$table1.columns(3).search($('#tahun').val()).draw() ;

	$('#tahun').change( function() {
		$table1.columns(3).search($(this).val()).draw() ;
    } );
	$('#kategori').change( function() {
		$table1.columns(1).search($(this).val()).draw() ;
	
    } );
   
} );



</script>