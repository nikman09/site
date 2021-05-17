<script>
var csfrData = {};
    csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
    $.ajaxSetup({
        data: csfrData
    });
	$('.syarat').click(function (e) {
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

	$('#form').validate({ // initialize plugin
		highlight: function (label) {
			$(label).closest('.form-group').removeClass('has-success').addClass('has-error');
			$('.error').css({'font-size':'9px','margin-bottom':'0px'});
			$('#status-error').css({'font-size':'9px'});
		},
		success: function (label) {
			$(label).closest('.form-group').removeClass('has-error');
			label.remove();
		},
		errorPlacement: function (error, element) {
			var placement = element.closest('.input-group');
			if (!placement.get(0)) {
				placement = element;
			}
			if (error.text() !== '') {
				placement.after(error);
			}
		},

		rules: {
			konfirmasi: {
				required: true
			}
			
			
		},
		messages: {
			konfirmasi: {
				required: "Pilih Konfirmasi Kehadiran"
			}
			
		}
	});



$('.konfirmasi').click(function (e) {
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