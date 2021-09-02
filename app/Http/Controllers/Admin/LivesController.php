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
        $lives = Lives::selectRaw('lives.*')
        ->get();
        return Response::json($lives);
    }

    public function storeLives(Request $request, $id){
        DB::beginTransaction();
        try {
            if($id != 0){
                $lives = Lives::where('id_live', $id)
                ->update([
                    'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion,
                    'portada' => $request->portada,
                    'url' => $request->url,
                    'activo' => 1
                ]);
                $result = array(
                    "Error" => false,
                    "message" => "Se ha editado con exito el live con folio [$id]"
                );
            }
            else{
                $lives = new Lives();
                $lives->nombre = $request->nombre;
                $lives->descripcion = $request->descripcion;
                $lives->portada = $request->portada;
                $lives->url = $request->url;
                $lives->bActivo = 1;
                $lives->save();
                $result = array(
                    "Error" => false,
                    "message" => "Se ha guardado con exito el live ",
                    "iId" => $live->id
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
