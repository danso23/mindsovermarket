<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\CursoMaterial As Material;
use App\Models\CursoTemario As Temario;
use App\Models\CursoModulo As Modulo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use DB;

class MaterialController extends Controller
{
    public function mostrarMateriales(){
        $materiales = Material::join('modulos', 'temario.id_temario', 'modulos.id_modulo')
        ->join('cursos', 'temario.id_curso', 'cursos.id_curso')
        ->selectRaw('temario.*, modulos.nombre AS nombre_modulo, cursos.nombre AS nombre_curso')
        ->get();
        return Response::json($materiales);
    }
}
