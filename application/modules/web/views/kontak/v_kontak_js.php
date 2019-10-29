<script>
jQuery( document ).ready( function( $ ) {
 
    
} );
 
$('#form').validate({ // initialize plugin
        highlight: function (label) {
            $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
            //$('.error').css({'font-size':'9px','margin-bottom':'0px'});
            $('#status-error').css({'font-size':'8px'});
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
            judul: {
                required: true
            },
            pesan: {
                required: true
            },
            nama: {
                required: true
            },
            email: {
                required: true,
                email : true
            },
        },
        messages: {
        }
    });

//     function previewImage() {
//     document.getElementById("image-preview").style.display = "block";
//     var oFReader = new FileReader();
//      oFReader.readAsDataURL(document.getElementById("image-source").files[0]);
 
//     oFReader.onload = function(oFREvent) {
//       document.getElementById("image-preview").src = oFREvent.target.result;
//     };
//   };

</script>