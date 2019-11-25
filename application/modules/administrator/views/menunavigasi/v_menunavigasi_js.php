<script>


$('#save').click(function(){
        oSortable = $('.sortable').nestable('toArray');
        $('#hasil').slideUp(function(){
            $.ajax({
            url : 'https://disperin.kalselprov.go.id/old_website/admin/navigasi/order_save',
            type: 'POST',
            data : {csrfName:'3b06981a5a0f156483db8da87b645bb0', sortable: oSortable},
            cache: false,
            success:function(data){
                $('#hasil').slideDown();
            },
            error:function(){
                alert('Gagal Simpan!');
            }
            });
        });
    });

    $(document).ready(function(){
      $('.sortable').nestable({
          handle: 'div',
          items: 'li',
          toleranceElement: '> div',
          maxLevels : 2
        });
    });
</script>