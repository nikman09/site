<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
<script type="text/javascript">
$.validator.addMethod('filesize', function(value, element, param) {
    // param = size (in bytes) 
    // element = element to validate (<input>)
    // value = value of the element (file name)
    return this.optional(element) || (element.files[0].size <= param) 
});
jQuery(function ($) {
    $('.datepicker').datepicker({
    format: 'dd/mm/yyyy'
});


 $('.datepicker').inputmask("date", { "clearIncomplete": true });
 $('.nilai').inputmask('Regex', {regex: "^[0-9]{1,6}(\\.\\d{1,2})?$"});
 $('#form').validate({ // initialize plugin
            highlight: function (label) {
                $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
                $('.error').css({'font-size':'9px','margin-bottom':'0px','color':'red'});
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
                if (element.attr("name") == "foto" ) {
                      $("#errNm1").after(error);
                 } else if (element.attr("name") == "ktp" ) {
                      $("#errNm2").after(error);
                 } else if (error.text() !== '') {
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
                ktp: {  
                    extension: "png|jpeg|gif|jpg", 
                    filesize: 1048576  
                },
                foto: {  
                    extension: "png|jpeg|gif|jpg", 
                    filesize: 1048576  
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
                ktp: {  
                    filesize : "Gambar harus kurang dari 1 MB" ,
                    extension: "Format gambar harus jpg atau png", 
                 },
                 foto: {  
                    filesize : "Gambar harus kurang dari 1 MB" ,
                    extension: "Format gambar harus jpg atau png", 
                },
                
           
            },
          
        });

        Filevalidation = () => {
        const fi = document.getElementById('file');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {
 
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 4096) {
                    alert(
                      "File too Big, please select a file less than 4mb");
                } else if (file < 2048) {
                    alert(
                      "File too small, please select a file greater than 2mb");
                } else {
                    document.getElementById('size').innerHTML = '<b>'
                    + file + '</b> KB';
                }
            }
        }
    }
    });
</script>