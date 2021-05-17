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
        "bStateSave": true
    });
    // Initalize Select Dropdown after DataTables is created
    $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
        minimumResultsForSearch: -1
    });

    

} );
 

   $(".hapus").click(function (e) {
    var v_id = this.id;
    $.confirm({
        title: 'Hapus!',
        content: 'Yakin ingin menghapus ?',
        buttons: {
            hapus: {
                text: 'Hapus',
                btnClass: 'btn-primary',
                action: function(){
                    window.location.assign("<?php echo base_url() ?>kepegawaian/admin/rincianhapus?id="+v_id+"");
                }
            },
            batal: function () {

            }
            
        }
        });
    });

   
    $('.edit').click(function (e) {
        
		var v_id_subjabatan = this.id;
       
		var v_url = "<?php echo base_url() ?>kepegawaian/admin/rincianedit";
		$.ajax({
			type: 'POST',
			url: v_url,
			data: {
				id_subjabatan: v_id_subjabatan
			},
			beforeSend: function () {
             
             
			},
			success: function (response) {
				$('#modal-lihat').html(response)
                
                
			}
		});
	});



        
</script>