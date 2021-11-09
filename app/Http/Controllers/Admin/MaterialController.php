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
        ->where('bActivo', '1')
        ->selectRaw('materiales.*, cursos.nombre AS nombre_curso')
        ->get();
        return Response::json($materiales);
    }

    public function storeMaterial(Request $request, $id = null){
        
        if (!\Auth::check()) {
            $jsonData = [
                'Error' => false,
                'redirect' => url('/login')
            ];
            
            return response()->json($jsonData);
        }

            

        DB::beginTransaction();
        try {
            //if($id != 0){
            if(isset($id) && $id != null && $id != 0 && !isset($request->delete)){
                $result= array();
                $material = Material::where('id_material', $id)
                ->update([
                    'nombre' => $request->nombre,
                    'url' => $request->archivo_mat,
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

                if(isset($id) && $id == 0 && !isset($request->delete)){
                    $material = new Material();
                    $material->nombre = $request->nombre;
                    $material->url = $request->archivo_mat;
                    $material->bActivo = 1;
                    $material->id_curso = $request->curso;
                    $material->save();
                    
                    $result = array(
                        "Error" => false,
                        "message" => "Se ha guardado con exito el material ",
                        "iId" => $material->id
                    );
                }
                else{
                    $delete = (isset($id) && $id != null && isset($request->delete) && isset($request->cadenadelete)) ? explode(",",$request->cadenadelete) : $id;
                    
                    if(is_array($delete)){                        
                        $bSuccess = Material::whereIn('id_material', $delete)->update([
                            'bActivo' => 0
                        ]);
                    }
                    else{
                        $bSuccess = Material::where('id_material', $delete)->update([
                            'bActivo' => 0
                        ]);
                    }

                    

                    if($bSuccess){
                        $result = [
                            "Error" => false,
                            "message" => "Eliminado con éxito.",
                            "iId" => $delete 
                        ];       
                    }
                    else{
                        $result = [
                            "Error" => false,
                            "message" => "No se pudeo eliminar el Temario ".$id,
                            "iId" => '' 
                        ];   
                    }
                    
                }
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
