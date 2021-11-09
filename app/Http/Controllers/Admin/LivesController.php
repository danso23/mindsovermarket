<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lives;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use DB;

class LivesController extends Controller
{
    public function mostrarLivesView(Request $request){
        $lives = Lives::where('activo', '1')->selectRaw('id_live, nombre, descripcion, portada, url')->get();
        $datos = array("lives" => $lives);
        return view('cursos.catalogos.live')->with('datos', $datos);
    }

    public function mostrarLives(){
        $lives = Lives::where('activo',1)->selectRaw('lives.*')
        ->get();
        return Response::json($lives);
    }

    public function storeLives(Request $request, $id){
        DB::beginTransaction();
        try {
            //if($id != 0){
            if(isset($id) && $id != null && $id != 0 && !isset($request->delete)){
                $lives = Lives::where('id_live', $id)
                ->update([
                    'nombre'        => $request->nombre,
                    'descripcion'   => $request->desc_Lives,
                    'portada'       => $request->portada,
                    'url'           => $request->url,
                    'activo'        => 1
                ]);
                $result = array(
                    "Error" => false,
                    "message" => "Se ha editado con exito el live con folio [$id]"
                );
            }
            else{

                if(isset($id) && $id == 0 && !isset($request->delete)){
                    $lives = new Lives();
                    $lives->nombre      = $request->nombre;
                    $lives->descripcion = $request->desc_Lives;
                    $lives->portada     = $request->portada;
                    $lives->url         = $request->url;
                    $lives->activo      = 1;
                    $lives->save();
                    $result = array(
                        "Error" => false,
                        "message" => "Se ha guardado con exito el live ",
                        "iId" => $lives->id
                    );
                }
                else{

                    $delete = (isset($id) && $id != null && isset($request->delete) && isset($request->cadenadelete)) ? explode(",",$request->cadenadelete) : $id;

                    if(is_array($delete)){                        

                        $resultLive = Lives::whereIn('id_live', $delete)->update([
                            'activo' => 0
                        ]);
                    }
                    else{                        

                        $objLive = Lives::find($delete);                        
                        $objLive->activo = 0;
                        $resultLive = $objLive->save();                        
                    }

                    if($resultLive){// && $resultCate){
                        $result = [
                            "Error" => false,
                            "message" => "Eliminado con éxito.",
                            "iId" => '' 
                        ];       
                    }
                    else{
                        DB::rollback();
                        $result = [
                            "Error" => false,
                            "message" => "No se pudeo eliminar el curso ".$id,
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
