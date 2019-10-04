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
        "bStateSave": false,
        "order": [[ 1, "desc" ]]
    });
    // Initalize Select Dropdown after DataTables is created
    $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
        minimumResultsForSearch: -1
    });


    $('.edit').click(function (e) {
  
		var v_id_kegiatankategori = this.id;
		var v_url = "<?php echo base_url() ?>administrator/kegiatankategoriedit";
		$.ajax({
			type: 'POST',
			url: v_url,
			data: {
				id_kegiatankategori: v_id_kegiatankategori
			},
			beforeSend: function () {
            //	$("#loading").show();
			},
			success: function (response) {
			//	$("#loading").hide();
				$('#modal-edit').html(response)
                $('#form2').validate({ // initialize plugin
                    highlight: function (label) {
                        $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
                        //$('.error').css({'font-size':'9px','margin-bottom':'0px'});
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
                        kategori: {
                            required: true
                        }
                    },
                    messages: {
                        kategori: {
                            required    : "kategori tidak boleh kosong"
                        }
                        
                    }
                });
                
			}
		});
	});

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
                    window.location.assign("<?php echo base_url() ?>administrator/kegiatankategorihapus?id="+v_id);
                }
            },
            batal: function () {

            }
            
        }
        });
    });







    

} );
 
</script>