<?php

namespace App\Http\Controllers\Cursos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CursoDetalle as Temario;
use App\Models\CursoModulo as Modulo;
use App\Models\CursoMaterial as Material;
use Illuminate\Support\Facades\Response;

class CursoDetalleController extends Controller
{
    public function index(Request $request, $id){
        $materiales = Material::selectRaw('materiales.id_material, materiales.nombre, materiales.url')
        ->where('materiales.id_curso', $id)
        ->get();
        //$materiales = Material::join('material_temario', 'material_temario.')
        $modulo = Modulo::selectRaw('modulos.id_modulo, modulos.nombre')
        ->where('modulos.id_curso', $id)
        ->get();
        $arrTemarios = array();
        foreach($modulo as $mod => $value){
            $arrTemarios = $this->obtenerTemarios($value->id_modulo);
            $arrNewTemarios = array();
            foreach($arrTemarios as $tem => $v){
                $arrNewTemarios[] = $v;
            }
            $modulo[$mod]['temario'] = array($arrNewTemarios);
        }
        $datos = array('modulos' => $modulo, 'materiales' => $materiales);
        // return Response::json($datos);
        return view('cursos.detail')->with('datos', $datos);
    }

    public function obtenerTemarios($idMod){
        $temarios = Temario::join('modulos', 'modulos.id_modulo', 'temario.id_modulo')
        ->selectRaw('temario.id_temario, temario.nombre, temario.descripcion, temario.url_video, temario.bActivo')
        ->where('temario.id_modulo', $idMod)
        ->where('temario.bActivo', 1)
        ->get();
        return $temarios;
    }
}
