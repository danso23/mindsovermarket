// $(document).ready( function() {
//     $('#example').DataTable( {
//         responsive: {
//             details: {
//                 display: $.fn.dataTable.Responsive.display.modal( {
//                     header: function ( row ) {
//                         var data = row.data();
//                         return 'Detalles para "'+data[0]+' '+data[1]+'"';
//                     }
//                 }),
//                 renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
//                     tableClass: 'table'
//                 })
//             }
//         }
//     });
// });
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});