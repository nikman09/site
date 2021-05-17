
<script type="text/javascript">
jQuery(function ($) {
  

    var $table1 = jQuery( '#table-1' );            
    // Initialize DataTable
    $table1.DataTable( {
        "searching": false,
        "lengthChange": false,
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
                email: {
                    required: true,
                    email: true
                },
                nama: {
                    required: true
                },
                pesan: {
                    required: true
                },
                judul: {
                    required: true
                }
                
               
            },
            messages: {
                email: {
                    required: "Email harus diisi",
                    email: "Format Email salah"
                },
                nama: {
                    required: "Nama harus diisi"
                },  
                pesan: {
                    required: "Pesan harus diisi"
                },  
                pesan: {
                    required: "Judul harus diisi"
                }
                
            }
        });
    });
</script>