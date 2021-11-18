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

class ModulosController extends Controller
{
    public function mostrarModulosView(){
        
        //$modulos = Modulo::where('activo', '1')->get();
        $cursos     = Curso::where('activo', '1')->selectRaw('id_curso, nombre')->get();        
        $datos      = array("cursos" => $cursos);

        return view('cursos.catalogos.modulos')->with('datos', $datos);
    }
    public function mostrarModulos(){
        // $materiales = Material::join('cursos', 'materiales.id_curso', 'cursos.id_curso')
        //                 ->where('bActivo', '1')
        //                 ->selectRaw('materiales.*, cursos.nombre AS nombre_curso')
        //                 ->get();
        // return Response::json($materiales);

        $modulos = Modulo::join('cursos', 'cursos.id_curso', 'modulos.id_curso')
                               ->where('modulos.activo', 1)
                               ->select('modulos.*','cursos.nombre as nombre_curso')
                               ->get();

        

        return Response::json($modulos);                

        /*
            $temarios = Temario::join('modulos', 'temario.id_modulo', 'modulos.id_modulo')
                            ->join('cursos', 'temario.id_curso', 'cursos.id_curso')
                            ->where('bActivo',1)
                            ->selectRaw('temario.*, modulos.nombre AS nombre_modulo, cursos.nombre AS nombre_curso')
                            ->get();
        
        return Response::json($temarios);
        
        */
    }

    public function storeModulos(Request $request, $id = null){
        
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
                $material = Modulo::where('id_modulo', $id)
                ->update([
                    'nombre' => $request->nombre,
                    'id_curso' => $request->archivo_mat,
                    'activo' => 1,                    
                ]);
                // print_r($material);exit;
                $result = array(
                    "Error" => false,
                    "message" => "Se ha editado con exito el material con folio [$id]"
                );
            }
            else{

                if(isset($id) && $id == 0 && !isset($request->delete)){
                    $modulo = new Modulo();
                    $modulo->nombre     = $request->nombre;                    
                    $modulo->activo     = 1;
                    $modulo->id_curso   = $request->curso;
                    $modulo->save();
                    
                    $result = array(
                        "Error" => false,
                        "message" => "Se ha guardado con exito el material ",
                        "iId" => $modulo->id
                    );
                }
                else{
                    $delete = (isset($id) && $id != null && isset($request->delete) && isset($request->cadenadelete)) ? explode(",",$request->cadenadelete) : $id;
                    
                    if(is_array($delete)){                        
                        $bSuccess = Modulo::whereIn('id_modulo', $delete)->update([
                            'activo' => 0
                        ]);
                    }
                    else{
                        $bSuccess = Modulo::where('id_modulo', $delete)->update([
                            'activo' => 0
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
