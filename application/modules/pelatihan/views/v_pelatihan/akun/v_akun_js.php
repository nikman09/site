
<script type="text/javascript">
jQuery(function ($) {
  $('#asd').click(function() {
      alert("sad");
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
                
                password: {
                    required: true,
                    minlength   : 6
                },
                konfirmasipassword: {
                    required: true,
                    equalTo: password,
                },
                
               
            },
            messages: {
                email: {
                    required: "Email harus diisi",
                    email: "Format Email salah"
                },
                nama: {
                    required: "Nama harus diisi"
                },  
                
                password: {
                    required: "Password harus diisi",
                    minlength   :  "minimal 6 karakter"
                },
                konfirmasipassword: {
                    required: "Konfirmasi Password harus diisi",
                    equalTo: "Konfirmasi Password harus sama dengan password",
                },
                
            }
        });
    });
</script>