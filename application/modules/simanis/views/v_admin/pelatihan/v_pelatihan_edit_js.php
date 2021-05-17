<script>
jQuery( document ).ready( function( $ ) {
  
  $('.nilai').inputmask('Regex', {regex: "^[0-9]{1,6}(\\.\\d{1,2})?$"});
  
  
  CKEDITOR.replace( 'persyaratan' ,{
      filebrowserBrowseUrl : "<?php echo base_url() ?>assets/back-end/filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=",
      filebrowserUploadUrl : "<?php echo base_url() ?>assets/back-end/filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=",
      filebrowserImageBrowseUrl : '<?php echo base_url() ?>assets/back-end/filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
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
              kategori: {
                  required: true
              },
              tanggalpendaftaran: {
                  required: true
              },
              tanggalpengumuman: {
                  required: true
              },
              tanggalpelatihan: {
                  required: true
              },
              kuota: {
                  required: true
              },
              tempat: {
                  required: true
              },
              cp: {
                  required: true
              },
              persyaratan: {
                  required: true
              },
              status: {
                  required: true
              },
  
          },
          messages: {
              nama: {
                  required: "Nama tidak boleh kosong"
              },
              kategori: {
                  required: "Kategori harus dipilih"
              },
              tanggalpendaftaran: {
                  required: "Tanggal Pendaftaran tidak boleh kosong"
              },
              tanggalpengumuman: {
                  required: "Tanggal Pengumuman tidak boleh kosong"
              },
              tanggalpelatihan: {
                  required: "Tanggal Peelatihan tidak boleh kosong"
              },
              kuota: {
                  rerequired: "Kuota tidak boleh kosong"
  
              },
              tempat: {
                  required: "Tempat tidak boleh kosong"
              },
              cp: {
                  required: "Contact Person tidak boleh kosong"
              },
              persyaratan: {
                  required: "Persyaratan tidak boleh kosong"
              },
              status: {
                  required: "Status harus dipilih"
              },
          }
      });
  
     
  } );
</script>