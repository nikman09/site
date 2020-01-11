<script>
  	var csfrData = {};
    csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
    $.ajaxSetup({
        data: csfrData
    });
	var $table1 = jQuery( '#table-1' );            
    // Initialize DataTable
    $table1.DataTable( {
		
		responsive: true,
		columnDefs: [
			{ responsivePriority: 1, targets: 0 },
			{ responsivePriority: 2, targets: 5 },
			{ responsivePriority: 3, targets: 6 },
   		 ]	,
			"order": [[ 6, "desc" ]],
			"searching": false,
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
</script>