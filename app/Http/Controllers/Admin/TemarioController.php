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
    public function mostraTemarios(){
        $temarios = Temario::join('modulos', 'temario.id_temario', 'modulos.id_modulo')
        ->join('cursos', 'temario.id_curso', 'cursos.id_curso')
        ->selectRaw('temario.*, modulos.nombre AS nombre_modulo, cursos.nombre AS nombre_curso')
        ->get();
        return Response::json($temarios);
    }

    public function editarTemario(Request $request, $id){
        DB::beginTransaction();
        try {
            $temario = Temario::where('id_temario', $id)
            ->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'url_video' => $request->url_video,
                'id_modulo' => $request->modulo,
                'id_curso' => $request->curso
            ]);
            
            DB::commit();
            $result = array(
                "Error" => false,
                "message" => "Se ha editado con exito el temario con folio [$id]"
            );
            return Response::json($result);
        } catch (\Exception $e) {
            DB::rollback();
            $result = array(
                "Error" => true,
                "message" => "Ha ocurrido un error, por favor contacte al administrador o inténtelo más tarde | ".$e
            );
            return Response::json($result);
        }
    }
}
