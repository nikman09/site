<script>
  	var csfrData = {};
    csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
    $.ajaxSetup({
        data: csfrData
    });
	var $table1 = jQuery( '#table-1' );            
    // Initialize DataTable
    $table1.DataTable( {
	
    });
</script>