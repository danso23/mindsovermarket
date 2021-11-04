@extends('layouts.app')
@section('css')
	<meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/fonts_roboto_varela.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/fonts_material.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/font_awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css">	
	
    <link href="{{ asset('public/css/cursos/catalogos.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-6">
						<h2>Administrador de <b>Lives</b></h2>
					</div>
					<div class="col-6 col-md-6">
						<a href="#editLivesModal" class="btn btn-success mb-2" data-toggle="modal" onclick="storeLives('', 'Nuevo')"><i class="material-icons">&#xE147;</i> <span>Agregar Nuevo Live</span></a>
                        <!--<a href="#deleteEmployeeModal" class="btn btn-danger mb-2" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Eliminar seleccionados</span></a>-->
                        <button id="deleteLiveModal" class="btn btn-danger mb-2"><i class="material-icons">&#xE15C;</i> <span>Eliminar seleccionados</span></button>
					</div>
                </div>
            </div>
            <table id="catalogoLives" class="table table-striped table-hover table-responsive">
			
            </table>
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="editLivesModal" class="modal fade" tabindex="-1" data-backdrop="false" data-dismiss="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="formLives">
					@csrf
					<div class="modal-header">
						<h4 class="modal-title" id="modal-title-live">Editar Lives</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="hddIdLives" id="hddIdLives">			
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="desc_Lives">Descripción</label>
							<textarea name="desc_Lives" id="desc_Lives" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<div class="md-form">
								<label for="fecha_live">Fecha - Hora</label>
							  	<input id="fecha_live"  />							  
							</div>
						</div>
						<div class="form-group">
							<label for="portada">Portada</label>
							<input type="text" name="portada" id="portada" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="url">URL</label>
							<input type="text" name="url" id="url" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" id="btnCancelarLives" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" id="btnGuardarLives" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteLivesModal" class="modal fade" data-backdrop="false" data-dismiss="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="hidden" id="detelelive">
						<input type="button" id="btnEliminarLive" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
@endsection
@section('script')
	<script src="{{ asset('public/js/jquery.dataTables.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js"></script>
	<script src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.es-es.js" type="text/javascript"></script>
	<script src="{{ asset('public/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/cursos/catalogos.js') }}"></script>    
    
	<script>	
		$('#fecha_live').datetimepicker({ 
			footer: true, 
			modal: true,
			locale: 'es-es',
			//format: 'dd mmmm yyyy h.m'
			mode: 'ampm',			
			format: "ddd, mmmm d, yyyy h:MM TT",
			disableDates:  function (date) {
            	const currentDate = new Date();
            	return date > currentDate ? true : false;
        	}			
		});
		var url_global = "{{ url('') }}";
		var form = $("#formLives");
		dataLives();		
	</script>
@endsection
