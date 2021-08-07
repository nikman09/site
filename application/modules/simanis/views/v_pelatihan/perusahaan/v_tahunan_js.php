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




        





</script>