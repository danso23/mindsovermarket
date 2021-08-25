var objDataTbl;
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		debugger
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
		debugger
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
	dataTemario();
	$("#btnGuardarTemario").click(function(e) {
		e.preventDefault();
		guardarTemario();
	});
});

function dataTemario() {
	$.ajax({
    	type: "GET",
    	dataType: "json",
    	url: url_global+"/Admin/mostrarTemarios",
		success: function(data){
			var element ="";
			element +="<thead>"+
                    "<tr>"+
						"<th>"+
							"<!-- <span class='custom-checkbox'>"+
								"<input type='checkbox' id='selectAll'>"+
								"<label for='selectAll'></label>"+
							"</span>--> Folio"+
						"</th>"+
                        "<th>Temario</th>"+
                        "<th>Descripción</th>"+
						"<th>Video</th>"+
                        "<th>Fecha creación</th>"+
                        "<th>Acciones</th>"+
						"<th>ID</th>"+
						"<th>Mod</th>"+
						"<th>Cur</th>"+
                    "</tr>"+
                "</thead>"+
				"<tbody>";
			data.forEach((el, i) => {
				element+="<tr>"+
					"<td>"+
						"<span class='custom-checkbox'>"+
							"<input type='checkbox' id='checkbox"+el.id_temario+"' name='options[]' value='"+el.id_temario+"'>"+
							"<label for='checkbox"+el.id_temario+"'>"+el.id_temario+"</label>"+
						"</span>"+
					"</td>"+
					"<td>"+el.nombre+"</td>"+
					"<td>"+el.descripcion+"</td>"+
					"<td>"+el.url_video+"</td>"+
					"<td>"+el.fecha_creacion+"</td>"+
					"<td>"+
						"<a href='#editTemarioModal' class='edit' id='btn_edit_"+el.id_temario+"' data-toggle='modal' onclick='editaTemario("+i+")'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
						"<a href='#deleteTemarioModal' class='delete' id='btn_delete_"+el.id_temario+"' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>"+
					"</td>"+
					"<td>"+el.id_temario+"</td>"+
					"<td>"+el.id_modulo+"</td>"+
					"<td>"+el.id_curso+"</td>"+
				"</tr>";
			});
			element+="</tbody>";
			$("#catalogoTemario").empty();
			$("#catalogoTemario").html(element);
			crearDataTable("catalogoTemario");
        }
	})
}

function crearDataTable(table){
	objDataTbl= $("#"+table).DataTable({
		responsive: true,
		autoWidth: false,
		order: [ 0, 'asc' ],
		serverside:true,
		language: {
			"zeroRecords": "No se encontró coincidencias",
			"info": "Mostrando la página _PAGE_ de _PAGES_",
			"infoEmpty": "No records available",
			"infoFiltered": "(filtrado de _MAX_ registros totales)",
			'search': 'Buscar:',
			"lengthMenu":"Mostrar _MENU_ registros",
			'paginate': {
				'next': 'Siguiente',
				'previous': 'Anterior',
			}
		},
		"lengthMenu":		[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
		"iDisplayLength":	5,
		"columnDefs": [
			{
                // The `data` parameter refers to the data for the cell (defined by the
                // `data` option, which defaults to the column being worked with, in
                // this case `data: 0`.
                // "render": function ( data, type, row ) {
                    // return row[3];
                // },
                // "targets": 0
        	},
        	{"visible": false,  "targets": [ 6,7,8 ] }
        ]
	});
}
var form = $("#formEditarTemario");
function editaTemario(position){	
	var datos = objDataTbl.row( position ).data();
	document.querySelector('#'+form[0].id +' #nombre').value=datos[1];
	document.querySelector('#'+form[0].id +' #descripcion').value=datos[2];
	document.querySelector('#'+form[0].id +' #url_video').value=datos[3];
	document.querySelector('#'+form[0].id+' #hddIdTemario').value=datos[6];
	document.querySelector('#'+form[0].id +' #modulo').value=datos[7];
	document.querySelector('#'+form[0].id +' #curso').value=datos[8];
}

function guardarTemario(){
	dataform = $('#'+form[0].id).serialize();
	$.ajax({
		type: "GET",
    	dataType: "json",
    	url: url_global+"/Admin/editarTemario/"+document.getElementById("hddIdTemario").value+"?"+dataform,
		success: function(data){
			alert(data.message);
		}
	});
}