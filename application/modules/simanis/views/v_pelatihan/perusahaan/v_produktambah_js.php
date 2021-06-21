

<script type="text/javascript">

jQuery(function ($) {
    var csfrData = {};
    csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
    $.ajaxSetup({
        data: csfrData
    });

    $('.datepicker').datepicker({
     format: 'dd/mm/yyyy'
    });

    $('.nilai').inputmask('Regex', {regex: "^[0-9]{1,20}(\\.\\d{1,2})?$"});
    $('.select3').select2({
        theme: "bootstrap",
        });
    
    $('#form').validate({ // initialize plugin
            ignore: [],     
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
                produk: {
                    required: true,
                },
                pemasaran_id: {
                    required: true,
                },
                nilai: {
                    required: true,
                },
                harga: {
                    required: true,
                },
            },
            messages: {
               
            }
        });


        
        $('#kota_id').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>simanis/getkecamatan",
                method : "POST",
                data : {kota_id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    if (data.length==0) {
                        $('#kecamatan_id').attr("hidden",true);
                        html="";
                        $('#kecamatan_id').html(html);

                    } else {
                        $('#kecamatan_id').removeAttr('hidden');
                        var html ='<option value="" disabled selected>.:Pilih Kecamatan:.</option>';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value="'+data[i].id+'">'+data[i].kecamatan+'</option>';
                        }
                        $('#kecamatan_id').html(html);
                    }
                }
            });

        });

        $('#kecamatan_id').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>simanis/getkelurahan",
                method : "POST",
                data : {kecamatan_id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    if (data.length==0) {
                        $('#kelurahan_id').attr("hidden",true);
                        html="";
                        $('#kelurahan_id').html(html);

                    } else {
                        $('#kelurahan_id').removeAttr('hidden');
                        var html ='<option value="" disabled selected>.:Pilih Kelurahan:.</option>';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value="'+data[i].id+'">'+data[i].kelurahan+'</option>';
                        }
                        $('#kelurahan_id').html(html);
                    }
                }
            });

        });

     

        jQuery.extend(jQuery.validator.messages, {
        required: "Kolom Ini Harus Diisi.",
        remote: "Please fix this field.",
        email: "Mohon Masukkan Email yang benar.",
        url: "Please enter a valid URL.",
        date: "Please enter a valid date.",
        dateISO: "Please enter a valid date (ISO).",
        number: "Please enter a valid number.",
        digits: "Please enter only digits.",
        creditcard: "Please enter a valid credit card number.",
        equalTo: "Please enter the same value again.",
        accept: "Please enter a value with a valid extension.",
        maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
        minlength: jQuery.validator.format("Please enter at least {0} characters."),
        rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
        range: jQuery.validator.format("Please enter a value between {0} and {1}."),
        max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
        min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
    });


    });

</script>