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
            $('.kunci').click(function (e) {
                    var v_id_akun = this.id;
                    var v_url = "<?php echo base_url() ?>simanis/admin/gantipassword";
                    $.ajax({
                        type: 'POST',
                        url: v_url,
                        data: {
                            id_akun: v_id_akun
                        },
                        beforeSend: function () {
                        //	$("#loading").show();
                        
                        },
                        success: function (response) {
                        //	$("#loading").hide();
                            $('#modal-lihat').html(response)
                            $('#form').validate({ // initialize plugin
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
                                    password: {
                                        required: true,
                                        minlength   : 6
                                    },
                                    kpassword: {
                                        required: true,
                                        equalTo : password
                                    }
                                    
                                
                                },
                                messages: {
                                    password: {
                                        required    : "Password tidak boleh kosong",
                                        minlength   : "Password minimal 6 karakter"
                                    },
                                    kpassword: {
                                        required: "Konfirmasi Password tidak boleh kosong",
                                        equalTo : "Konfirmasi Password harus sama dengan Password"
                                    }
                                    
                                }
                            });
                            
                        }
                    });
                });

                $('.biodata').click(function (e) {
                var v_id_akun= this.id;
                var v_url = "<?php echo base_url() ?>simanis/admin/biodatatampil";
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
                var v_url = "<?php echo base_url() ?>simanis/admin/usahatampil";
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

        }
    });
    // Initalize Select Dropdown after DataTables is created
    $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
        minimumResultsForSearch: -1
    });

} );
 
</script>