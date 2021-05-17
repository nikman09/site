<script>
jQuery( document ).ready( function( $ ) {
    var csfrData = {};
    csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
    $.ajaxSetup({
        data: csfrData
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
               
                password: {
                    required: true,
                    minlength : 6
                },
                konfirmasipassword: {
                    required: true,
                    equalTo : password
                }                
            },
            messages: {
                password: {
                    required: "Password tidak boleh kosong",
                    minlength: 'Panjang karakter minimal 6 karakter.'
                },
                konfirmasipassword: {
                    required: "Konfirmasi Password tidak boleh kosong",
                    equalTo : "samakan dengan password"
                  
                }   
            }
        });

</script>