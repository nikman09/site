<script>

  	var csfrData = {};
    csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
    $.ajaxSetup({
        data: csfrData
    });
    var $table1 = jQuery( '#table-12' );            
    // Initialize DataTable
    $table1.DataTable( {

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

                   window.location.assign("<?php echo base_url() ?>simanis/tahunanhapus?id="+v_id);

               }

           },

           batal: function () {



           }

           

       }

       });

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

                nama: {

                    required: true

                },  

                

            },

            messages: {

                nama: {

                    required: "Nama Data Pendukung harus diisi"

                } 

                

           

            }

        });



        





</script>