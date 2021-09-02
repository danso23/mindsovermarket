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
    public function mostrarMaterialesView(){
        $cursos = Curso::where('activo', '1')->selectRaw('id_curso, nombre')->get();
        $datos = array("cursos" => $cursos);
        return view('cursos.catalogos.material')->with('datos', $datos);
    }
    public function mostrarMateriales(){
        $materiales = Material::join('cursos', 'materiales.id_curso', 'cursos.id_curso')
        ->selectRaw('materiales.*, cursos.nombre AS nombre_curso')
        ->get();
        return Response::json($materiales);
    }

    public function storeMaterial(Request $request, $id){
        DB::beginTransaction();
        try {
            if($id != 0){
                $result= array();
                $material = Material::where('id_curso', $id)
                ->update([
                    'nombre' => $request->nombre,
                    'url' => $request->url,
                    'bActivo' => 1,
                    'id_curso' => $request->curso
                ]);
                // print_r($material);exit;
                $result = array(
                    "Error" => false,
                    "message" => "Se ha editado con exito el material con folio [$id]"
                );
            }
            else{
                $material = new Material();
                $material->nombre = $request->nombre;
                $material->url = $request->url;
                $material->bActivo = 1;
                $material->id_curso = $request->curso;
                $material->save();
                $result = array(
                    "Error" => false,
                    "message" => "Se ha guardado con exito el material ",
                    "iId" => $material->id
                );
            }
        }
        catch (\Exception $e) {
            DB::rollback();
            $result = array(
                "Error" => true,
                "message" => "Ha ocurrido un error, por favor contacte al administrador o inténtelo más tarde | ".$e
            );
            return Response::json($result);
        }
        DB::commit();
        return Response::json($result);
    }
}
