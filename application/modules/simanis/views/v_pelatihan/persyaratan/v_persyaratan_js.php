<script>

var $table1 = jQuery( '#table-1' );            
    // Initialize DataTable
    $table1.DataTable( {
		
		responsive: true,
		columnDefs: [
			{ responsivePriority: 1, targets: 0 },
			{ responsivePriority: 2, targets: 5 },
			{ responsivePriority: 3, targets: 6 },
   		 ]	
    });
</script>