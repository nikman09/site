
<script type="text/javascript">
jQuery(function ($) {
    $('.datepicker').datepicker({
    format: 'dd/mm/yyyy'
});
$('.nilai').inputmask('Regex', {regex: "^[0-9]{1,6}(\\.\\d{1,2})?$"});
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
                unama: {
                    required: true,
                },

                uinvestasi: {
                    number: true,
                },
                ujumlahproduksi: {
                    number: true,
                },
                unilaiproduksi: {
                    number: true,
                },
                unilaibahanbaku: {
                    number: true,
                }
               
                
               
            },
            messages: {
                unama: {
                    required: "Nama Usaha harus diisi",
                }, 
                
                uinvestasi: {
                    number: "Format hanya angka",
                },
                ujumlahproduksi: {
                    number: "Format hanya angka",
                },
                unilaiproduksi: {
                    number: "Format hanya angka",
                },
                unilaibahanbaku: {
                    number: "Format hanya angka",
                }
           
            }
        });
    });
</script>