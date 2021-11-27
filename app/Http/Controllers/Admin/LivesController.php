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
        $lives = Lives::where('activo', '1')->selectRaw('id_live, nombre, descripcion, portada, url, fecha_live' )->get();
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
        
        //$dateForm = (isset($request->fecha_live) && $request->fecha_live != '') ? $this->formatDateTime($request->fecha_live) : '';


        // $result = array(
        //         "Error" => true,
        //         "message" => $dateForm//. "\n".$request->fecha_live
        //     );
        // return Response::json($result);

        try {
            //if($id != 0){
            if(isset($id) && $id != null && $id != 0 && !isset($request->delete)){
                $lives = Lives::where('id_live', $id)
                ->update([
                    'nombre'        => $request->nombre,
                    'descripcion'   => $request->desc_Lives,                    
                    'portada'       => $request->portada,
                    'fecha_live'    => $request->fecha_live,
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
                    $lives->fecha_live  = $request->fecha_live;
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

    function formatDateTime($dateTime){

        $step1 = explode(',', $dateTime);
        $arrayMeses = [
            "ENERO"     => 1,
            "FEBRERO"   => 2,
            "MARZO"     => 3,
            "ABRIL"     => 4,
            "MAYO"      => 5,
            "JUNIO"     => 6,
            "JULIO"     => 7,
            "AGOSTO"    => 8,
            "SEPTIEMBRE"=> 9,
            "OCTUBRE"   => 10,
            "NOVIEMBRE" => 11,
            "DICIEMBRE" => 12
        ];

        //Mié, Noviembre 17, 2021 5:25 AM
        /*
        0: "Jue"
        1: " Noviembre 18"
        2: " 2021 4:25 AM"
        */
        if(is_array($step1)){

            $MesDia   = str_replace(' ', '',$step1[1]);
            $HoraAnio = explode(' ',$step1[2]);
            $comodin  = array_shift($HoraAnio);

            $arrayFecha = [];
            for ($i=0; $i < strlen($MesDia); $i++) { 
                if(is_numeric($MesDia[$i])){


                    $arrayFecha['dia'] = substr($MesDia,$i,strlen($MesDia));
                    
                    break;
                }
                else{
                    //substr("Hello world",0,-1)
                    //substr("Hello world",0,-2) == Hello wor
                    
                    $arrayFecha['mes'] = strval(strtoupper(substr($MesDia,0,$i+1)));
                }                
            }

            $arrayFecha['mes']  = $arrayMeses[$arrayFecha['mes']];
            $arrayFecha['anio'] = $HoraAnio[0];
            $arrayFecha['hora'] = $HoraAnio[1];
            $arrayFecha['uso']  = $HoraAnio[2];

        }

        return $arrayFecha;//dia." - Mes: ".$mes." Posision ".$i." Textcompleto: ".$MesDia;

    }
}
