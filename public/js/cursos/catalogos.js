var objDataTbl;
var objTarget;
var objChecks;
var objCursosw;

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

	$('#curso').on('change',function(){

		var bVacio = false;		
		var htmlElem = '';
		var htmlElem2 = '';
		
		htmlElem = '<option selected disabled hidden value="default">Selecciona una opción</option>';
		
		if(objCursosw){

			objCursosw.forEach(element => {                    	       
		       		       		       
		       	if(parseInt($(this).val()) === parseInt(element.id_curso)){	       		
		       		htmlElem += '<option class="text-uppercase" value="'+element.id_modulo+'" >'+element.nombre+'</option>';	       		
	                bVacio = true;
		       	} 
				
				//console.log(htmlElem);
				htmlElem2 = (!bVacio) ? "<option selected disabled value='#'>Sin datos</option>" : htmlElem;

				$("#modulo").empty();
	            $("#modulo").append(htmlElem2); 	                                    
		    });
		}

		// if(objCursosw && $(this).val() != 'default'){
	        
	 //        console.log(objCursosw.find(x => x.id_curso == $(this).val()));//.campo1

	 //        //$('#txtDireccionEsc').val(elementos['slcEscuela'].find(x => x.iId == $(this).val()).campo1);
	 //        //$('#txtCveEsc').val(elementos['slcEscuela'].find(x => x.iId == $(this).val()).campo0);     
  //   	}

		// console.log($(this).val());

	});

	//Inicio seccion Temario
	$('#deleteTemarioModal').on('hidden.bs.modal', function (e) {
  		objChecks = ''; 
	});
	
	$("#btnGuardarTemario").click(function(e) {
		e.preventDefault();
		$('#editTemarioModal').modal('hide');
		guardarTemario(false);
	});

	$("#btnEliminarTemario").click(function(e) {
		e.preventDefault();		
		$('#deleteTemarioModal').modal('hide');					
		guardarTemario(true);		
	});

	$("#deleteEmployeeModal").click(function(e) {		
		objChecks = '';
		$('table tbody').find('input[type="checkbox"]').each(function(){            
            if($(this).is(':checked')){			
				objChecks += $(this).val()+",";
				document.querySelector("#deleteTemarioModal .modal-title").innerHTML = 'Eliminar los elementos seleccionados: <br><b></b>';
				$('#deleteTemarioModal').modal('show');
            }			           
        });
        objChecks = objChecks.split(',');
        objChecks.pop();        
	});
	//FIn seccion Temario


	//Inicio seccion Curso
	$('#deleteCursosModal').on('hidden.bs.modal', function (e) {
  		objChecks = ''; 
	});

	$("#btnEliminarCurso").click(function(e) {
		e.preventDefault();		
		$('#deleteCursosModal').modal('hide');					
		guardarCurso(true);
		//dataCurso()();
	});

	$("#deleteCursoModal").click(function(e) {		
		objChecks = '';
		$('table tbody').find('input[type="checkbox"]').each(function(){            
            if($(this).is(':checked')){			
				objChecks += $(this).val()+",";
				document.querySelector("#deleteCursosModal .modal-title").innerHTML = 'Eliminar los elementos seleccionados: <br><b></b>';
				$('#deleteCursosModal').modal('show');
            }			           
        });
        objChecks = objChecks.split(',');
        objChecks.pop();        
	});


	$("#btnGuardarCurso").click(function(e) {		
		e.preventDefault();
		$('#editCursoModal').modal('hide');
		guardarCurso(false);
	});

	//FIn seccion Cursos

	
	//Inicio Materiales

	$('#deleteMaterial').on('hidden.bs.modal', function (e) {
  		objChecks = ''; 
	});

	$("#btnGuardarMaterial").click(function(e) {
		e.preventDefault();
		$('#editMaterialModal').modal('hide');
		guardarMaterial(false);
	});

	$("#btnEliminarMaterial").click(function(e) {
		e.preventDefault();		
		$('#deleteMaterial').modal('hide');
		guardarMaterial(true);		
	});

	$("#deleteMaterialModal").click(function(e) {		
		objChecks = '';
		$('table tbody').find('input[type="checkbox"]').each(function(){            
            if($(this).is(':checked')){			
				objChecks += $(this).val()+",";
				document.querySelector("#deleteMaterial .modal-title").innerHTML = 'Eliminar los elementos seleccionados: <br><b></b>';
				$('#deleteMaterial').modal('show');
            }			           
        });
        objChecks = objChecks.split(',');
        objChecks.pop();        
	});
	//Fin Materiales
	

	//Inicio Live
	$('#deleteLivesModal').on('hidden.bs.modal', function (e) {
  		objChecks = ''; 
	});
	
	$("#btnGuardarLives").click(function(e) {
		e.preventDefault();
		$('#editLivesModal').modal('hide');		
		guardarLives(false);
	});

	$("#btnEliminarLive").click(function(e) {
		e.preventDefault();		
		$('#deleteLivesModal').modal('hide');					
		guardarLives(true);		
	});

	$("#deleteLiveModal").click(function(e) {		
		objChecks = '';
		$('table tbody').find('input[type="checkbox"]').each(function(){            
            if($(this).is(':checked')){			
				objChecks += $(this).val()+",";
				document.querySelector("#deleteLivesModal .modal-title").innerHTML = 'Eliminar los elementos seleccionados: <br><b></b>';
				$('#deleteLivesModal').modal('show');
            }			           
        });
        objChecks = objChecks.split(',');
        objChecks.pop();        
	});
	//Fin Live

	//Inicio Modulo
	$('#deleteLivesModal').on('hidden.bs.modal', function (e) {
  		objChecks = ''; 
	});
	
	$("#btnGuardarModulo").click(function(e) {
		e.preventDefault();		
		$('#editModulosModal').modal('hide');
		guardarModulos(false);		
	});

	$("#btnEliminarModulo").click(function(e) {
		e.preventDefault();		
		$('#deleteModuloModal').modal('hide');					
		guardarModulos(true);
		//dataModulo();
	});

	$("#deleteModulosModal").click(function(e) {		
		objChecks = '';
		$('table tbody').find('input[type="checkbox"]').each(function(){            
            if($(this).is(':checked')){			
				objChecks += $(this).val()+",";
				document.querySelector("#deleteModuloModal .modal-title").innerHTML = 'Eliminar los elementos seleccionados: <br><b></b>';
				$('#deleteModuloModal').modal('show');
            }			           
        });
        objChecks = objChecks.split(',');
        objChecks.pop();        
	});
	//Fin Modulo
	
	$("#btnGuardarUsuario").click(function(e) {
		e.preventDefault();
		guardarUsuario();
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
						"<input type='checkbox' id='checkbox"+el.id_temario+"' name='options[]' value='"+el.id_temario+"'>"+
						"<label for='checkbox"+el.id_temario+"' class='lblChk'>"+el.id_temario+"</label>"+						
					"</td>"+
					"<td>"+el.nombre+"</td>"+
					"<td>"+el.descripcion+"</td>"+
					"<td>"+el.url_video+"</td>"+
					"<td>"+el.fecha_creacion+"</td>"+
					"<td>"+
						"<a href='#editTemarioModal' class='edit' id='btn_edit_"+el.id_temario+"' data-toggle='modal' onclick='storeTemario("+i+","+'"Editar"'+")'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
						"<a href='#deleteTemarioModal_' class='delete' id='btn_delete_"+el.id_temario+"' data-toggle='modal' onclick='storeTemario("+i+","+'"Eliminar"'+")'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>"+
					"</td>"+
					"<td>"+el.id_temario+"</td>"+
					"<td>"+el.id_modulo+"</td>"+
					"<td>"+el.id_curso+"</td>"+
				"</tr>";
			});
			element+="</tbody>";
			objTarget = {"visible": false,  "targets": [ 6,7,8 ] };
			//$("#catalogoTemario").empty();
			$("#catalogoTemario").html(element);
			crearDataTable("catalogoTemario", objTarget);
        }
	})
}

function dataCurso() {
	$.ajax({
    	type: "GET",
    	dataType: "json",
    	url: url_global+"/Admin/mostrarCurso",
		success: function(data){
			console.log(data);
			var element ="";
			element +="<thead>"+
                    "<tr>"+
						"<th>"+
							"<!-- <span class='custom-checkbox'>"+
								"<input type='checkbox' id='selectAll'>"+
								"<label for='selectAll'></label>"+
							"</span>--> Folio"+
						"</th>"+
                        "<th>Curso</th>"+
                        "<th>Descripción</th>"+
						"<th>¿Qué aprenderas?</th>"+
                        "<th>Fecha creación</th>"+
                        "<th>Acciones</th>"+
                        "<th>Sobre el teacher</th>"+
						"<th>Id</th>"+
						"<th>IdCategoria</th>"+
						"<th>IdNivel</th>"+
                    "</tr>"+
                "</thead>"+
				"<tbody>";
			data.forEach((el, i) => {
				element+="<tr>"+
					"<td>"+
						"<input type='checkbox' id='checkbox"+el.id_curso+"' name='options[]' value='"+el.id_curso+"'>"+
						"<label for='checkbox"+el.id_curso+"' class='lblChk'>"+el.id_curso+"</label>"+												
					"</td>"+
					"<td>"+el.nombre+"</td>"+
					"<td>"+el.desc_curso+"</td>"+
					"<td>"+el.objetivo+"</td>"+
					"<td>"+el.fecha_creacion+"</td>"+
					"<td>"+
						"<a href='#editCursoModal' class='edit' id='btn_edit_"+el.id_curso+"' data-toggle='modal' onclick='storeCurso("+i+","+'"Editar"'+")'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
						"<a href='#deleteCursoModal_' class='delete' id='btn_delete_"+el.id_curso+"' data-toggle='modal' onclick='storeCurso("+i+","+'"Eliminar"'+")'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>"+
					"</td>"+
					"<td>"+el.about_teacher+"</td>"+
					"<td>"+el.id_curso+"</td>"+
					"<td>"+el.id_categoria+"</td>"+
					"<td>"+el.id_nivel+"</td>"+
				"</tr>";
			});
			element+="</tbody>";
			objTarget = {"visible": false,  "targets": [ 6,7,8,9 ] };
			$("#catalogoCursos").empty();
			$("#catalogoCursos").html(element);
			crearDataTable("catalogoCursos", objTarget);
        }
	})
}

function dataMaterial() {
	$.ajax({
    	type: "GET",
    	dataType: "json",
    	url: url_global+"/Admin/mostrarMaterial",
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
                        "<th>Nombre</th>"+
                        "<th>Archivo</th>"+
						"<th>Nombre curso</th>"+
                        "<th>Fecha de creación</th>"+
                        "<th>Acciones</th>"+
						"<th>IdCurso</th>"+
						"<th>IdMaterial</th>"+
                    "</tr>"+
                "</thead>"+
				"<tbody>";
			data.forEach((el, i) => {
				element+="<tr>"+
					"<td>"+

						"<input type='checkbox' id='checkbox"+el.id_material+"' name='options[]' value='"+el.id_material+"'>"+
						"<label for='checkbox"+el.id_material+"' class='lblChk'>"+el.id_material+"</label>"+						
					"</td>"+
					"<td>"+el.nombre+"</td>"+
					"<td>"+el.url+"</td>"+
					"<td>"+el.nombre_curso+"</td>"+
					"<td>"+el.fecha_creacion+"</td>"+
					"<td>"+
						"<a href='#editMaterialModal' class='edit' id='btn_edit_"+el.id_material+"' data-toggle='modal' onclick='storeMaterial("+i+","+'"Editar"'+")'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
						"<a href='#deleteMaterialModal_' class='delete' id='btn_delete_"+el.id_material+"' data-toggle='modal' onclick='storeMaterial("+i+","+'"Eliminar"'+")'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>"+
					"</td>"+
					"<td>"+el.id_curso+"</td>"+
					"<td>"+el.id_material+"</td>"+
				"</tr>";
			});
			element+="</tbody>";
			objTarget = {"visible": false,  "targets": [ 6,7 ] };
			$("#catalogoMaterial").empty();
			$("#catalogoMaterial").html(element);
			crearDataTable("catalogoMaterial", objTarget);
        }
	})
}

function dataLives() {
	$.ajax({
    	type: "GET",
    	dataType: "json",
    	url: url_global+"/Admin/mostrarLives",
		success: function(data){
			var element ="";
			element +="<thead>"+
                    "<tr>"+
						"<th>"+
							"Folio"+
						"</th>"+
                        "<th>Nombre</th>"+
                        "<th>Descripción</th>"+
						"<th>Portada</th>"+
						"<th>Fecha Live</th>"+
                        "<th>Link</th>"+
                        "<th>Acciones</th>"+
						"<th>IDLIVES</th>"+
                    "</tr>"+
                "</thead>"+
				"<tbody>";
			data.forEach((el, i) => {
				element+="<tr>"+
					"<td>"+
						"<input type='checkbox' id='checkbox"+el.id_live+"' name='options[]' value='"+el.id_live+"'>"+
						"<label for='checkbox"+el.id_live+"' class='lblChk'>"+el.id_live+"</label>"+
					"</td>"+
					"<td>"+el.nombre+"</td>"+
					"<td>"+el.descripcion+"</td>"+
					"<td>"+el.portada+"</td>"+
					"<td>"+el.fecha_live+"</td>"+
					"<td>"+el.url+"</td>"+
					"<td>"+
						"<a href='#editLivesModal' class='edit' id='btn_edit_"+el.id_live+"' data-toggle='modal' onclick='storeLives("+i+","+'"Editar"'+")'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
						"<a href='#deleteLivesModal_' class='delete' id='btn_delete_"+el.id_live+"' data-toggle='modal' onclick='storeLives("+i+","+'"Eliminar"'+")'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>"+
					"</td>"+
					"<td>"+el.id_live+"</td>"+//LIVE
				"</tr>";
			});
			element+="</tbody>";
			objTarget = {"visible": false,  "targets": [ 7 ] };
			$("#catalogoLives").empty();
			$("#catalogoLives").html(element);
			crearDataTable("catalogoLives", objTarget);
        }
	})
}

function dataUsuario() {
	$.ajax({
    	type: "GET",
    	dataType: "json",
    	url: url_global+"/Admin/mostrarUsuarios",
		success: function(data){
			var element ="";
			element +="<thead>"+
                    "<tr>"+
						"<th>"+
							"Folio"+
						"</th>"+
                        "<th>Nombre</th>"+
                        "<th>Apellido Paterno</th>"+
						"<th>Apellido Materno</th>"+
                        "<th>Correo</th>"+
                        "<th>Acciones</th>"+
						"<th>IDUSER</th>"+
                    "</tr>"+
                "</thead>"+
				"<tbody>";
			data.forEach((el, i) => {
				element+="<tr>"+
					"<td>"+
						"<span class='custom-checkbox'>"+
							"<input type='checkbox' id='checkbox"+el.id_user+"' name='options[]' value='"+el.id_user+"'>"+
							"<label for='checkbox"+el.id_user+"'>"+el.id_user+"</label>"+
						"</span>"+
					"</td>"+
					"<td>"+el.name+"</td>"+
					"<td>"+el.last_name+"</td>"+
					"<td>"+el.last_name2+"</td>"+
					"<td>"+el.email+"</td>"+
					"<td>"+
						"<!-- <a href='#editMaterialModal' class='edit' id='btn_edit_"+el.id_user+"' data-toggle='modal' onclick='storeMaterial("+i+","+'"Editar"'+")'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
						"<a href='#deleteMaterialModal' class='delete' id='btn_delete_"+el.id_user+"' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a> -->"+
					"</td>"+
					"<td>"+el.id_user+"</td>"+
				"</tr>";
			});
			element+="</tbody>";
			objTarget = {"visible": false,  "targets": [ 6 ] };
			$("#catalogoUsuarios").empty();
			$("#catalogoUsuarios").html(element);
			crearDataTable("catalogoUsuarios", objTarget);
        }
	})
}

function dataModulo() {
	$.ajax({
    	type: "GET",
    	dataType: "json",
    	url: url_global+"/Admin/mostrarModulos",
		success: function(data){
			var element ="";
			console.log(data);
			element +="<thead>"+
                    "<tr>"+						
						"<th>"+
							"<!-- <span class='custom-checkbox'>"+
								"<input type='checkbox' id='selectAll'>"+
								"<label for='selectAll'></label>"+
							"</span>--> Folio"+
						"</th>"+
                        "<th>Modulo</th>"+
                        "<th>Descripción</th>"+
						"<th>Curso</th>"+
                        "<th>Fecha creación</th>"+
                        "<th>Acciones</th>"+
						"<th>ID</th>"+
						"<th>Mod</th>"+
						//"<th>Cur</th>"+
                    "</tr>"+
                "</thead>"+
				"<tbody>";
			data.forEach((el, i) => {
				element+="<tr>"+
					"<td>"+
						"<input type='checkbox' id='checkbox"+el.id_modulo+"' name='options[]' value='"+el.id_modulo+"'>"+
							"<label for='checkbox"+el.id_modulo+"' class='lblChk'>"+el.id_modulo+"</label>"+						
					"</td>"+
					"<td>"+el.nombre+"</td>"+
					"<td>"+el.descripcion+"</td>"+
					"<td>"+el.nombre_curso+"</td>"+
					"<td>"+el.fecha_creacion+"</td>"+
					"<td>"+
						"<a href='#editModulosModal' class='edit' id='btn_edit_"+el.id_modulo+"' data-toggle='modal' onclick='storeModulo("+i+","+'"Editar"'+")'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
						"<a href='#deleteTemarioModal_' class='delete' id='btn_delete_"+el.id_modulo+"' data-toggle='modal' onclick='storeModulo("+i+","+'"Eliminar"'+")'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>"+
					"</td>"+
					"<td>"+el.id_modulo+"</td>"+					
					"<td>"+el.id_curso+"</td>"+
				"</tr>";
			});
			element +="</tbody>";			
			objTarget = { "visible": false,  "targets": [ 6,7 ] };
			$("#catalogoModulo").empty();
			$("#catalogoModulo").html(element);
			crearDataTable("catalogoModulo", objTarget);
        }
	})
}

function crearDataTable(table, target){
	objDataTbl = $("#"+table).DataTable({
		"responsive": true,
		//autoWidth: false,
		"order": [ 0, 'asc' ],
		//serverside:true,	
		"destroy": true,	
		"language": {
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
		"iDisplayLength":	10,
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
			target
        	// {"visible": false,  "targets": [ 6,7,8 ] }
        ]        
	});
}

//Funcion editar curso
function storeCurso(position, tipoAccion){	
	if(tipoAccion == "Editar"){
		var datos = objDataTbl.row( position ).data();
		console.log(datos);
		document.querySelector('#'+form[0].id +' #nombre').value 	      = datos[1];
		document.querySelector('#'+form[0].id +' #desc_curso').value      = datos[2];
		document.querySelector('#'+form[0].id +' #que_curso').value   	  = datos[3];
		document.querySelector('#'+form[0].id +' #sobre_profe').value 	  = datos[6];		
		document.querySelector('#'+form[0].id +' #hddIdCurso').value  	  = datos[7];		
		document.querySelector('#'+form[0].id +' #categoria').value   	  = datos[8];
		document.querySelector('#'+form[0].id +' #nivel_academico').value = datos[9];
		document.getElementById("modal-title-curso").innerHTML 		      = 'Editar curso N° '+datos[6];
	}
	if(tipoAccion == "Nuevo"){
		document.getElementById("modal-title-curso").innerHTML = 'Agregar curso';
		document.querySelector('#'+form[0].id+' #hddIdCurso').value=0;
		document.getElementById(form[0].id).reset();
	}

	if(tipoAccion == "Eliminar"){
		var datos = objDataTbl.row( position ).data();
		document.getElementById("detelecurso").value = datos[6];
		//document.querySelector("#deleteCursosModal .modal-body p").innerHTML = 'Eliminar Temario: '+datos[1];		
		document.querySelector("#deleteCursosModal .modal-title").innerHTML = 'Eliminar Curso: <br><b>'+datos[1]+'</b>';
		$('#deleteCursosModal').modal('show');		
	}
}

function storeLives(position, tipoAccion){	

	/*
		nombre
		desc_Lives
		fecha_live
		portada
		url
	*/

	if(tipoAccion == "Editar"){
		debugger
		var datos = objDataTbl.row( position ).data();
		console.log(datos);
		document.querySelector('#'+form[0].id +' #nombre').value=datos[1];
		document.querySelector('#'+form[0].id +' #desc_Lives').value=datos[2];
		//document.querySelector('#'+form[0].id +' #fecha_live').value= "";//datos[2];				
		document.querySelector('#'+form[0].id +' #portada').value=datos[3];
		//$('#').value(datos[4]);
		document.querySelector('#'+form[0].id +' #fecha_live').value=datos[4];
		document.querySelector('#'+form[0].id +' #url').value=datos[5];
		document.querySelector('#'+form[0].id+' #hddIdLives').value=datos[7];
		document.getElementById("modal-title-live").innerHTML = 'Editar live N° '+datos[7];
	}
	if(tipoAccion == "Nuevo"){
		document.getElementById("modal-title-live").innerHTML = 'Agregar live';
		document.querySelector('#'+form[0].id+' #hddIdLives').value=0;
		document.getElementById(form[0].id).reset();
	}

	if(tipoAccion == "Eliminar"){
		var datos = objDataTbl.row( position ).data();
		document.getElementById("detelelive").value = datos[7];
		//document.querySelector("#deleteCursosModal .modal-body p").innerHTML = 'Eliminar Temario: '+datos[1];		
		document.querySelector("#deleteLivesModal .modal-title").innerHTML = 'Eliminar Live: <br><b>'+datos[1]+'</b>';
		$('#deleteLivesModal').modal('show');		
	}
}

function storeTemario(position, tipoAccion){	
	if(tipoAccion == "Editar"){
		var datos = objDataTbl.row( position ).data();
		console.log(datos);
		document.querySelector('#'+form[0].id +' #nombre').value=datos[1];
		document.querySelector('#'+form[0].id +' #descripcion').value=datos[2];
		document.querySelector('#'+form[0].id +' #url_video').value=datos[3];
		document.querySelector('#'+form[0].id+' #hddIdTemario').value=datos[6];
		document.querySelector('#'+form[0].id +' #modulo').value=datos[7];
		document.querySelector('#'+form[0].id +' #curso').value=datos[8];
		document.getElementById("modal-title-temario").innerHTML = 'Editar Temario N° '+datos[6];
	}
	if(tipoAccion == "Nuevo"){
		document.getElementById("modal-title-temario").innerHTML = 'Agregar temario';
		document.querySelector('#'+form[0].id+' #hddIdTemario').value=0;
		document.getElementById(form[0].id).reset();
	}

	if(tipoAccion == "Eliminar"){
		var datos = objDataTbl.row( position ).data();

		document.getElementById("detema").value = datos[6];
		//document.querySelector("#deleteTemarioModal .modal-body p").innerHTML = 'Eliminar Temario: '+datos[1];		
		document.querySelector("#deleteTemarioModal .modal-title").innerHTML = 'Eliminar Temario: <br><b>'+datos[1]+'</b>';
		$('#deleteTemarioModal').modal('show');		
	}
}

function storeMaterial(position, tipoAccion){
	if(tipoAccion == "Editar"){
		var datos = objDataTbl.row( position ).data();
		document.querySelector('#'+form[0].id +' #nombre').value=datos[1];
		document.querySelector('#'+form[0].id +' #archivo_mat').value=datos[2];
		document.querySelector('#'+form[0].id +' #curso').value=datos[6];
		document.querySelector('#'+form[0].id+' #hddIdMaterial').value=datos[7];
		document.getElementById("modal-title-material").innerHTML = 'Editar material N° '+datos[7];
	}
	if(tipoAccion == "Nuevo"){
		document.getElementById("modal-title-material").innerHTML = 'Agregar material';
		document.querySelector('#'+form[0].id+' #hddIdMaterial').value=0;
		document.getElementById(form[0].id).reset();
	}
	if(tipoAccion == "Eliminar"){
		var datos = objDataTbl.row( position ).data();
		console.log(datos[1]);
		document.getElementById("delete_materia").value = datos[7];		
		document.querySelector("#deleteMaterial .modal-title").innerHTML = 'Eliminar Material: <br><b>'+datos[1]+'</b>';
		$('#deleteMaterial').modal('show');		
	}

}

function storeModulo(position, tipoAccion){
	if(tipoAccion == "Editar"){
		var datos = objDataTbl.row( position ).data();
		document.querySelector('#'+form[0].id +' #nombre').value    = datos[1];		
		document.querySelector('#'+form[0].id +' #curso').value     = datos[7];
		document.querySelector('#'+form[0].id+' #hddIdModulo').value= datos[6];
		document.getElementById("modal-title-modulo").innerHTML = 'Editar modulo: <br><b>'+datos[1]+'</b>';
	}
	if(tipoAccion == "Nuevo"){
		document.getElementById("modal-title-modulo").innerHTML = 'Agregar modulo';
		document.querySelector('#'+form[0].id+' #hddIdModulo').value=0;
		document.getElementById(form[0].id).reset();
	}
	if(tipoAccion == "Eliminar"){
		var datos = objDataTbl.row( position ).data();
		console.log(datos[1]);
		document.getElementById("deleteModulo").value = datos[6];		
		document.querySelector("#deleteModuloModal .modal-title").innerHTML = 'Eliminar modulo: <br><b>'+datos[1]+'</b>';
		$('#deleteModuloModal').modal('show');		
	}

}

function storeUsuarios(position, tipoAccion){	
	if(tipoAccion == "Editar"){
		var datos = objDataTbl.row( position ).data();
		document.querySelector('#'+form[0].id +' #name').value=datos[1];
		document.querySelector('#'+form[0].id +' #last_name').value=datos[2];
		document.querySelector('#'+form[0].id +' #last_name2').value=datos[3];
		document.querySelector('#'+form[0].id +' #email').value=datos[3];
		document.querySelector('#'+form[0].id+' #hddIdLives').value=datos[6];
		document.getElementById("modal-title-live").innerHTML = 'Editar Usuario N° '+datos[6];
	}
	if(tipoAccion == "Nuevo"){
		document.getElementById("modal-title-live").innerHTML = 'Agregar usuario';
		document.querySelector('#'+form[0].id+' #hddIdUsuario').value=0;
		document.getElementById(form[0].id).reset();
	}
}

function guardarTemario(opcion){
	var reger = '';
	dataform  = $('#'+form[0].id).serialize();
	dataform +="&token="+document.querySelector('meta[name="_token"]').getAttribute('content');

	reger 	  = (opcion) ? ((objChecks) ? null : document.getElementById("detema").value ) : document.getElementById("hddIdTemario").value;
	dataform += (opcion) ? "&delete=1" : '';
	dataform += (opcion && objChecks) ? "&cadenadelete="+objChecks : '';
	

	$.ajax({
		type: "POST",
    	dataType: "json",
    	url: url_global+"/Admin/storeTemario/"+reger,
		data: dataform,		
		success: function(data){

			if(data.Error && data.redirect){
				window.location.href = data.redirect;
			}

			if(data.Error){

				alertify.alert().setting(
						{
				    		'title': 'Atención',
				    		'label':'Aceptar',
				    		'message': '<div style="word-break: break-all;">'+data.message+'</div>',
				    		'onok': function(){}
  						}).show();
			}
			else{
				alertify.success(data.message);
				dataTemario();	
			}				
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

function guardarCurso(opcion){
	// dataform = $('#'+form[0].id).serialize();
	// dataform+="&token="+document.querySelector('meta[name="_token"]').getAttribute('content');

	var reger = '';
	dataform  = $('#'+form[0].id).serialize();
	dataform +="&token="+document.querySelector('meta[name="_token"]').getAttribute('content');

	reger 	  = (opcion) ? ((objChecks) ? null : document.getElementById("detelecurso").value ) : document.getElementById("hddIdCurso").value;
	dataform += (opcion) ? "&delete=1" : '';
	dataform += (opcion && objChecks) ? "&cadenadelete="+objChecks : '';

	$.ajax({
		type: "POST",
    	dataType: "json",
    	url: url_global+"/Admin/storeCurso/"+reger,//document.getElementById("hddIdCurso").value,
		data: dataform,
		success: function(data){

			if(data.Error && data.redirect){
				window.location.href = data.redirect;
			}

			if(data.Error){

				alertify.alert().setting(
						{
				    		'title': 'Atención',
				    		'label':'Aceptar',
				    		'message': '<div style="word-break: break-all;">'+data.message+'</div>',
				    		'onok': function(){}
  						}).show();
			}
			else{
				alertify.success(data.message);
				dataCurso();	
			}		
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

function guardarLives(opcion){
	// dataform = $('#'+form[0].id).serialize();	
	// dataform+="&token="+document.querySelector('meta[name="_token"]').getAttribute('content');
	var reger = '';
	dataform  = $('#'+form[0].id).serialize();

	
	dataform +="&token="+document.querySelector('meta[name="_token"]').getAttribute('content');

	reger 	  = (opcion) ? ((objChecks) ? null : document.getElementById("detelelive").value ) : document.getElementById("hddIdLives").value;
	dataform += (opcion) ? "&delete=1" : '';
	dataform += (opcion && objChecks) ? "&cadenadelete="+objChecks : '';

	$.ajax({
		type: "POST",
    	dataType: "json",
    	url: url_global+"/Admin/storeLives/"+reger,//document.getElementById("hddIdLives").value,
		data: dataform,
		success: function(data){
			
			if(data.Error && data.redirect){
				window.location.href = data.redirect;
			}

			if(data.Error){

				alertify.alert().setting(
						{
				    		'title': 'Atención',
				    		'label':'Aceptar',
				    		'message': '<div style="word-break: break-all;">'+data.message+'</div>',
				    		'onok': function(){}
  						}).show();
			}
			else{
				alertify.success(data.message);
				dataLives();
			}

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

function guardarMaterial(opcion){
	// dataform = $('#'+form[0].id).serialize();
	// dataform+="&token="+document.querySelector('meta[name="_token"]').getAttribute('content');

	var reger = '';
	dataform  = $('#'+form[0].id).serialize();
	dataform +="&token="+document.querySelector('meta[name="_token"]').getAttribute('content');

	reger 	  = (opcion) ? ((objChecks) ? null : document.getElementById("delete_materia").value ) : document.getElementById("hddIdMaterial").value;
	dataform += (opcion) ? "&delete=1" : '';
	dataform += (opcion && objChecks) ? "&cadenadelete="+objChecks : '';

	$.ajax({
		type: "POST",
    	dataType: "json",
    	url: url_global+"/Admin/storeMaterial/"+reger,//document.getElementById("hddIdMaterial").value,
		data: dataform,
		success: function(data){
			
			if(data.Error && data.redirect){
				window.location.href = data.redirect;
			}

			if(data.Error){

				alertify.alert().setting(
						{
				    		'title': 'Atención',
				    		'label':'Aceptar',
				    		'message': '<div style="word-break: break-all;">'+data.message+'</div>',
				    		'onok': function(){}
  						}).show();
			}
			else{
				alertify.success(data.message);
				dataMaterial();
			}						
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

function guardarModulos(opcion){
	
	var reger = '';
	dataform  = $('#'+form[0].id).serialize();
	dataform +="&token="+document.querySelector('meta[name="_token"]').getAttribute('content');

	reger 	  = (opcion) ? ((objChecks) ? null : document.getElementById("deleteModulo").value ) : document.getElementById("hddIdModulo").value;
	dataform += (opcion) ? "&delete=1" : '';
	dataform += (opcion && objChecks) ? "&cadenadelete="+objChecks : '';
	console.log(dataform);
	$.ajax({
		type: "POST",
    	dataType: "json",
    	url: url_global+"/Admin/storeModulos/"+reger,//document.getElementById("hddIdLives").value,
		data: dataform,
		success: function(data){
			

			if(data.Error && data.redirect){
				window.location.href = data.redirect;
			}

			if(data.Error){

				alertify.alert().setting(
						{
				    		'title': 'Atención',
				    		'label':'Aceptar',
				    		'message': '<div style="word-break: break-all;">'+data.message+'</div>',
				    		'onok': function(){}
  						}).show();
			}
			else{
				alertify.success(data.message);
				dataModulo();	
			}						
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

function guardarUsuario(){
	dataform = $('#'+form[0].id).serialize();
	dataform+="&token="+document.querySelector('meta[name="_token"]').getAttribute('content');
	;
	$.ajax({
		type: "POST",
    	dataType: "json",
    	url: url_global+"/Admin/storeUsuario/"+document.getElementById("hddIdUsuario").value,
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
