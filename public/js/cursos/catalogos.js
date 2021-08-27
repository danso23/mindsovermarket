var objDataTbl;
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
						"<a href='#editTemarioModal' class='edit' id='btn_edit_"+el.id_temario+"' data-toggle='modal' onclick='storeTemario("+i+","+'"Editar"'+")'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
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
function storeTemario(position, tipoAccion){	
	if(tipoAccion == "Editar"){
		var datos = objDataTbl.row( position ).data();
		document.querySelector('#'+form[0].id +' #nombre').value=datos[1];
		document.querySelector('#'+form[0].id +' #descripcion').value=datos[2];
		document.querySelector('#'+form[0].id +' #url_video').value=datos[3];
		document.querySelector('#'+form[0].id+' #hddIdTemario').value=datos[6];
		document.querySelector('#'+form[0].id +' #modulo').value=datos[7];
		document.querySelector('#'+form[0].id +' #curso').value=datos[8];
		document.getElementById("modal-title-temario").innerHTML = 'Editar temario N° '+datos[6];
	}
	if(tipoAccion == "Nuevo"){
		document.getElementById("modal-title-temario").innerHTML = 'Agregar temario';
		document.querySelector('#'+form[0].id+' #hddIdTemario').value=0;
		document.getElementById("formEditarTemario").reset();
	}
}

function storeMaterial(){

}

function guardarTemario(){
	dataform = $('#'+form[0].id).serialize();
	dataform+="&token="+document.querySelector('meta[name="_token"]').getAttribute('content');
	;
	$.ajax({
		type: "POST",
    	dataType: "json",
    	url: url_global+"/Admin/storeTemario/"+document.getElementById("hddIdTemario").value,
		data: dataform,
		success: function(data){
			alert(data.message);
		},
		error: function (jqXHR, exception){
			var msg = '';
			if (jqXHR.status === 0)
				msg = 'Not connect.\n Verify Network.';
			else if (jqXHR.status == 404)
				msg = 'Requested page not found. [404]';
			else if (jqXHR.status == 500)
				msg = 'Internal Server Error [500].';
			else if (exception === 'parsererror')
				msg = 'Requested JSON parse failed.';
			else if (exception === 'timeout')
				msg = 'Time out error.';
			else if (exception === 'abort')
				msg = 'Se aborto el proceso.';
			else
				msg = 'Uncaught Error.\n' + jqXHR.responseText;
			console.log(msg);
			alert("Ocurrio un error[1]")
		}
	});
}