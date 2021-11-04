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

class TemarioController extends Controller {
    
    public function mostrarTemariosView(Request $request){
        $cursos = Curso::where('activo', '1')->selectRaw('id_curso, nombre')->get();
        $modulos = Modulo::where('activo', '1')->selectRaw('id_modulo, nombre')->get();
        $datos = array("cursos" => $cursos, "modulos" => $modulos);
        return view('cursos.catalogos.temario')->with('datos', $datos);
    }

    public function mostrarTemarios(){
        
        $temarios = Temario::join('modulos', 'temario.id_modulo', 'modulos.id_modulo')
                            ->join('cursos', 'temario.id_curso', 'cursos.id_curso')
                            ->where('bActivo',1)
                            ->selectRaw('temario.*, modulos.nombre AS nombre_modulo, cursos.nombre AS nombre_curso')
                            ->get();
        
        return Response::json($temarios);
    }

    public function storeTemario(Request $request, $id = null){

        if (!\Auth::check()) {
            $jsonData = [
                'Error' => false,
                'redirect' => url('/login')
            ];
            
            return response()->json($jsonData);
        }

        DB::beginTransaction();
        try {
            if(isset($id) && $id != null && $id != 0 && !isset($request->delete)){
                $temario = Temario::where('id_temario', $id)
                ->update([
                    'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion,
                    'url_video' => $request->url_video,
                    'id_modulo' => $request->modulo,
                    'id_curso' => $request->curso
                ]);
                $result = array(
                    "Error" => false,
                    "message" => "Se ha editado con exito el temario con folio [$id]"
                );
            }
            else{
                if(isset($id) && $id == 0 && !isset($request->delete)){
                    $temario = new Temario();
                    $temario->nombre = $request->nombre;
                    $temario->descripcion = $request->descripcion;
                    $temario->url_video = $request->url_video;
                    $temario->id_modulo = $request->modulo;
                    $temario->id_curso = $request->curso;
                    $temario->bActivo = 1;
                    $temario->save();
                    $result = array(
                        "Error" => false,
                        "message" => "Se ha guardado con exito el temario ",
                        "iId" => $temario->id
                    );    
                }
                else{
                    $delete = (isset($id) && $id != null && isset($request->delete) && isset($request->cadenadelete)) ? explode(",",$request->cadenadelete) : $id;
                    
                    if(is_array($delete)){
                        $bSuccess = Temario::whereIn('id_temario', $delete)->update([
                            'bActivo' => 0
                        ]);    
                    }
                    else{
                        $bSuccess = Temario::where('id_temario', $delete)->update([
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
