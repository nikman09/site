<script type="text/javascript">
 var csfrData = {};
      csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
      $.ajaxSetup({
          data: csfrData
      });

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
                       modul: {
                           required: true
                       },
                       judul: {
                           required: true
                       }
                   },
                   messages: {
                    modul: {
                           required    : "Modul Harus Dipilih"
                       },
                    judul: {
                        required    : "Judul tidak boleh kosong"
                    }
                       
                   }
               });


$("#modul").change(function (e) {

       var v_id_modul = this.value;
       var v_url = "<?php echo base_url() ?>administrator/modulnavigasiajax";
       $.ajax({
           type: 'POST',
           url: v_url,
           data: {
               id_modul: v_id_modul
           },
           beforeSend: function () {
           //	$("#loading").show();
           },
           success: function (response) {
               $('.moduldetail').html(response)
               
           }
       });
});

$("#parent").change(function (e) {
       var v_id_parent = this.value;
       var v_url = "<?php echo base_url() ?>administrator/modulparentajax";
       $.ajax({
           type: 'POST',
           url: v_url,
           data: {
               id_parent: v_id_parent
           },
           beforeSend: function () {
           //	$("#loading").show();
           },
           success: function (response) {
               $('.modulparent').html(response)
               
           }
       });
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
                   window.location.assign("<?php echo base_url() ?>administrator/navigasihapus?id="+v_id);
               }
           },
           batal: function () {

           }
           
       }
       });
   });

$('.edit').click(function (e) {
       
       var v_id_navigasi = this.id;
       var v_url = "<?php echo base_url() ?>administrator/navigasiedit";
    $.ajax({
           type: 'POST',
           url: v_url,
           data: {
               id_navigasi: v_id_navigasi
           },
           beforeSend: function () {
           //	$("#loading").show();
           },
           success: function (response) {
           //	$("#loading").hide();
               $('#modal-edit').html(response)
               $('#form2').validate({ // initialize plugin
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
                       modul: {
                           required: true
                       },
                       judul: {
                           required: true
                       }
                   },
                   messages: {
                    modul: {
                           required    : "Modul Harus Dipilih"
                       },
                    judul: {
                        required    : "Judul tidak boleh kosong"
                    }
                       
                   }
               });

                            
                $("#modula").change(function (e) {

                var v_id_modul = this.value;
                var v_url = "<?php echo base_url() ?>administrator/modulnavigasiajax";
                $.ajax({
                    type: 'POST',
                    url: v_url,
                    data: {
                        id_modul: v_id_modul
                    },
                    beforeSend: function () {
                    //	$("#loading").show();
                    },
                    success: function (response) {
                        $('.moduldetaila').html(response)
                        
                    }
                });
                });

             

               
           }
       });


});


</script>