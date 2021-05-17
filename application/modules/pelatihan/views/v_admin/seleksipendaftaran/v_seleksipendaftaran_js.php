<script>
jQuery( document ).ready( function( $ ) {
    var csfrData = {};
    csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
    $.ajaxSetup({
        data: csfrData
    });
    var $table1 = jQuery( '#table-1' );            
    // Initialize DataTable
    $table1.DataTable( {
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "bStateSave": true,
        columnDefs: [
			{ responsivePriority: 1, targets: 0 },
			{ responsivePriority: 2, targets: 5 },
			{ responsivePriority: 3, targets: 6 },
   		    ],
        "fnDrawCallback": function () {
                $('.biodata').click(function (e) {
                var v_id_akun= this.id;
                var v_url = "<?php echo base_url() ?>pelatihan/admin/biodatatampil";
                $.ajax({
                    type: 'POST',
                    url: v_url,
                    data: {
                        id_akun : v_id_akun
                    },
                    beforeSend: function () {
                    //	$("#loading").show();
                    },
                    success: function (response) {
                    //	$("#loading").hide();
                        $('#modal-biodata').html(response)
                      
                    }
                });
            });
            $('.usaha').click(function (e) {
                var v_id_akun= this.id;
                var v_url = "<?php echo base_url() ?>pelatihan/admin/usahatampil";
                $.ajax({
                    type: 'POST',
                    url: v_url,
                    data: {
                        id_akun : v_id_akun
                    },
                    beforeSend: function () {
                    //	$("#loading").show();
                    },
                    success: function (response) {
                    //	$("#loading").hide();
                        $('#modal-usaha').html(response)
                      
                    }
                });
            });

            $('.seleksi').click(function (e) {
                var v_id_pelatihandaftar= this.id;
                var v_url = "<?php echo base_url() ?>pelatihan/admin/seleksitampil";
               
                $.ajax({
                    type: 'POST',
                    url: v_url,
                    data: {
                        id_pelatihandaftar : v_id_pelatihandaftar
                    },
                    beforeSend: function () {
                    //	$("#loading").show();
                    },
                    success: function (response) {
                    //	$("#loading").hide();
                        $('#modal-seleksi').html(response)
                      
                    }
                });
            });
        }
    });
    // Initalize Select Dropdown after DataTables is created
    $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
        minimumResultsForSearch: -1
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


} );
 
</script>