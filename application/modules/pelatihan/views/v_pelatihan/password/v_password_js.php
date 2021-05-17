
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
                passwordlama: {
                    required: true
                },
                passwordbaru: {
                    required: true,
                    minlength   : 6
                },
                konfirmasipasswordbaru: {
                    required: true,
                    equalTo: passwordbaru,
                },
                
               
            },
            messages: {
                passwordlama: {
                    required: "Password lama harus diisi"
                },
                passwordbaru: {
                    required: "Password baru harus diisi",
                    minlength   : "minimal 6 karakter"
                },
                konfirmasipasswordbaru: {
                    required: "Konfirmasi Password baru harus diisi",
                    equalTo: "Konfirmasi Password harus sama dengan password baru"
                },                
            }
        });
    });
</script>