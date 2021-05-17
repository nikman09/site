<script>
jQuery( document ).ready( function( $ ) {
    var csfrData = {};
    csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
    $.ajaxSetup({
        data: csfrData
    });

    var $table1 = jQuery( '#table-1' );            
    // Initialize DataTable
    $table1.DataTable( {
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "bStateSave": true
    });
    // Initalize Select Dropdown after DataTables is created
    $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
        minimumResultsForSearch: -1
    });

    

} );
 


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
                    email: true
                }

                
            },
            messages: {
                email: {
                    email: "Format Email Salah"
                }
            }
        });

        $('#id_jabatan').change(function(){
           
        var id=$(this).val();
      
        $.ajax({
            url : "<?php echo base_url();?>kepegawaian/subjabatan",
            method : "POST",
            data : {id_jabatan: id},
            async : false,
            dataType : 'json',
            success: function(data){
                if (data.length==0) {
                    $('#id_subjabatan').attr("hidden",true);
                    html="";
                    $('#id_subjabatan').html(html);
                } else {
                    $('#id_subjabatan').removeAttr('hidden');
                    var html ='<option value="" disabled selected>.:Pilih Keterangan Jabatan:.</option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].id_subjabatan+'">'+data[i].nama_subjabatan+'</option>';
                    }
                    $('#id_subjabatan').html(html);
                }
                
            }
        });
    });
</script>