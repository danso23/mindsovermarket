<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Curso;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use DB;

class UsuarioController extends Controller
{
    public function mostrarUsuariosView(){
        $cursos = Curso::where('activo', '1')->selectRaw('id_curso, nombre')->get();
        $datos = array("cursos" => $cursos);
        return view('cursos.catalogos.usuarios')->with('datos', $datos);
    }
    public function mostrarUsuarios(){
        $materiales = Material::join('cursos', 'materiales.id_curso', 'cursos.id_curso')
        ->selectRaw('materiales.*, cursos.nombre AS nombre_curso')
        ->get();
        return Response::json($materiales);
    }

}
