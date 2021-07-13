<?php

namespace App\Http\Controllers\Cursos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CursoDetalle as Temario;
use App\Models\CursoModulo as Modulo;
use App\Models\CursoMaterial as Material;

class CursoDetalleController extends Controller
{
    public function index(Request $request, $id){
        $materiales = Material::selectRaw('materiales.id_material, materiales.nombre, materiales.url')
        ->where('materiales.id_curso', $id)
        ->get();
        $modulo = Modulo::selectRaw('modulos.id_modulo, modulos.nombre')
        ->where('modulos.id_curso', $id)
        ->get();
        $temario = Temario::join('modulos', 'modulos.id_modulo', 'temario.id_modulo')
        ->selectRaw('temario.id_temario, temario.nombre, temario.descripcion, temario.url_video, temario.bActivo')
        ->where('temario.id_curso', $id)
        ->where('temario.bActivo', 1)
        ->get();
        $datos = array('temario' => $temario, 'modulos' => $modulo, 'materiales' => $materiales);
        return view('cursos.detail')->with('datos', $datos);
    }
}
