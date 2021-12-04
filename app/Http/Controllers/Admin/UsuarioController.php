<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User As Usuario;
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
        $usuarios = Usuario::selectRaw('id AS id_user, name, last_name, last_name2, email')
        ->where('tipo_user', '1')
        ->get();
        return Response::json($usuarios);
    }

}
