@extends('layouts.app')
@section('css')
	<meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/fonts_roboto_varela.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/fonts_material.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/font_awesome.min.css') }}">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link href="{{ asset('public/css/cursos/catalogos.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-6">
						<h2>Administrador de <b>Temarios</b></h2>
					</div>
					<div class="col-6 col-md-6">
						<a href="#editTemarioModal" class="btn btn-success mb-2" data-toggle="modal" onclick="editaTemario('', 'Nuevo')"><i class="material-icons">&#xE147;</i> <span>Agregar Nuevo Temario</span></a>
                        <a href="#deleteEmployeeModal" class="btn btn-danger mb-2" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Eliminar seleccionados</span></a>
					</div>
                </div>
            </div>
            <table id="catalogoTemario" class="table table-striped table-hover">
			
            </table>
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="editTemarioModal" class="modal fade" tabindex="-1" data-backdrop="false" data-dismiss="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="formEditarTemario">
					@csrf
					<div class="modal-header">
						<h4 class="modal-title" id="modal-title-temario">Edit Temario</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="hddIdTemario" id="hddIdTemario">			
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Descripción</label>
							<textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Video</label>
							<input type="text" name="url_video" id="url_video" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Módulo</label>
							<select class="form-control" name="modulo" id="modulo">
								<option selected hidden value="default">Selecciona un módulo</option>
								@foreach($datos['modulos'] as $mod)
									<option value="{{$mod->id_modulo}}">{{$mod->nombre}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Curso</label>
							<select class="form-control" name="curso" id="curso">
								<option selected hidden value="default">Selecciona un curso</option>
								@foreach($datos['cursos'] as $cur)
									<option value="{{$cur->id_curso}}">{{$cur->nombre}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" id="btnCancelarTemario" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" id="btnGuardarTemario" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteTemarioModal" class="modal fade" data-backdrop="false" data-dismiss="modal">
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
	<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="{{ asset('public/js/cursos/catalogos.js') }}"></script>
	<script>
		var url_global = "{{ url('') }}";
		var form = $("#formEditarCursos");
		dataCurso();
	</script>
@endsection
