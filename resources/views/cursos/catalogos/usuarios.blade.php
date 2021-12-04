@extends('layouts.app')
@section('css')
	<meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/fonts_roboto_varela.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/fonts_material.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/font_awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/css/dataTables.bootstrap4.min.css') }}">
    <link href="{{ asset('public/css/cursos/catalogos.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-6">
						<h2>Administrador de <b>Usuarios</b></h2>
					</div>
					<div class="col-6 col-md-6">
						<!-- <a href="#editUsuariosModal" class="btn btn-success mb-2" data-toggle="modal" onclick="storeCurso('', 'Nuevo')"><i class="material-icons">&#xE147;</i> <span>Agregar Nuevo Usuario</span></a> -->
                        <!-- <a href="#deleteEmployeeModal" class="btn btn-danger mb-2" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Eliminar seleccionados</span></a> -->
					</div>
                </div>
            </div>
            <table id="catalogoUsuarios" class="table table-striped table-hover table-responsive">
			
            </table>
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<!-- <div id="editUsuarioModal" class="modal fade" tabindex="-1" data-backdrop="false" data-dismiss="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="formUsuarios">
					@csrf
					<div class="modal-header">
						<h4 class="modal-title" id="modal-title-curso">Editar Usuarios</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="hddIdUsuario" id="hddIdUsuario">			
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="desc_curso">Descripción</label>
							<textarea name="desc_curso" id="desc_curso" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label for="portada">Video</label>
							<input type="text" name="portada" id="portada" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="categoria">Categoría</label>
							<select class="form-control" name="categoria" id="categoria">
								<option selected hidden value="default">Selecciona una categoría</option>
								@foreach($datos['cursos'] as $cur)
									<option value="{{$cur->id_curso}}">{{$cur->nombre}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" id="btnCancelarCurso" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" id="btnGuardarCurso" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div> -->
	<!-- Delete Modal HTML -->
	<div id="deleteUsuariosModal" class="modal fade" data-backdrop="false" data-dismiss="modal">
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
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
@endsection
@section('script')
	<script src="{{ asset('public/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('public/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/cursos/catalogos.js') }}"></script>
	<script>
		var url_global = "{{ url('') }}";
		var form = $("#formUsuarios");
		dataUsuario();
	</script>
@endsection
