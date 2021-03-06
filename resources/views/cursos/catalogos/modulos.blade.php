@extends('layouts.app')
@section('css')
	<meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/fonts_roboto_varela.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/fonts_material.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/font_awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/public/css/responsive.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/css/cursos/catalogos.css') }}"/>


    <link rel="stylesheet" href="{{asset('public/plugins/alertifyjs/css/alertify.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/alertifyjs/css/themes/default.min.css')}}">
@endsection
@section('content')
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-6">
						<h2>Administrador de <b>Modulos</b></h2>
					</div>
					<div class="col-6 col-md-6">
						<a href="#editModulosModal" class="btn btn-success mb-2" data-toggle="modal" onclick="storeModulo('', 'Nuevo')"><i class="material-icons">&#xE147;</i> <span>Agregar Nuevo Modulo</span></a>
                        <!--<a href="#deleteEmployeeModal" class="btn btn-danger mb-2" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Eliminar seleccionados</span></a>-->
                        <button id="deleteModulosModal" class="btn btn-danger mb-2"><i class="material-icons">&#xE15C;</i> <span>Eliminar seleccionados</span></button>
					</div>
                </div>
            </div>
            <div class="table-resposive">
	            <table id="catalogoModulo" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">        
				
	            </table>
        	</div>
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="editModulosModal" class="modal fade" tabindex="-1" data-backdrop="false" data-dismiss="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="formEditarModulo">
					@csrf
					<div class="modal-header">
						<h4 class="modal-title" id="modal-title-modulo">Editar Modulo</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="hddIdModulo" id="hddIdModulo">			
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="descripcion_modulo">Descripci??n</label>
							<input type="text" name="descripcion_modulo" id="descripcion_modulo" class="form-control" required>
						</div>						
						<div class="form-group">
							<label>Curso</label>
							<select class="form-control" name="curso" id="curso">
								<option selected value="default">Selecciona un curso</option>
								@foreach($datos['cursos'] as $cur)
									<option value="{{$cur->id_curso}}">{{$cur->nombre}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" id="btnCancelarModulo" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" id="btnGuardarModulo" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteModuloModal" class="modal fade" data-backdrop="false" data-dismiss="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--<form>-->
					<div class="modal-header">						
						<h4 class="modal-title">Eliminar Modulo</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Est?? seguro para eliminar el siguiente registro?</p>
						<p class="text-warning"><small>Esta acci??n no se puede revertir.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="hidden" id="deleteModulo">
						<input type="button" id="btnEliminarModulo" class="btn btn-danger" value="Eliminar">
					</div>
				<!--</form>-->
			</div>
		</div>
	</div>
</body>
@endsection
@section('script')
	<script src="{{ asset('public/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('public/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('public/js/datatable_responsive_2_2_9.js') }}"></script>
	<script src="{{ asset('public/js/responsive.bootstrap4.min.js') }}"></script>
	<script src="{{asset('public/plugins/alertifyjs/alertify.min.js')}}"></script>		
    <script type="text/javascript" src="{{ asset('public/js/cursos/catalogos.js') }}"></script>
	<script>
		var url_global = "{{ url('') }}";
		var form = $("#formEditarModulo");
		dataModulo();
	</script>
@endsection
