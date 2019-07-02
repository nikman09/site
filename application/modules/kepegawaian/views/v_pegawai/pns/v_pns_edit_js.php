<script>
jQuery( document ).ready( function( $ ) {
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
               
                skpns: {
                    required: true
                },
                tglskpns: {
                    required: true
                },
                tmtpns: {
                    required: true
                },
                golongan: {
                    required: true
                },
                pejabatpengesahan: {
                    required: true
                }
                
            },
            messages: {
                skpns: {
                    required: "Nomor SK PNS harus diisi"
                },
                tglskpns: {
                    required: "Tanggal SK PNS harus diisi"
                },
                tmtpns: {
                    required: "TMT harus diisi"
                },
                golongan: {
                    required: "Golongan Awal harus diisi"
                },
                pejabatpengesahan: {
                    required: "Pejabat Pengesahan  harus diisi"
                },
            }
        });
</script>