<script>


$('.koonfirmasi').click(function (e) {
					var v_id_pelatihan = this.id;
					var v_url = "<?php echo base_url() ?>pelatihan/syarat";
				
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
</script>