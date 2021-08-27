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

class CursoController extends Controller
{
    public function mostrarCursosView(Request $request){
        $cursos = Curso::where('activo', '1')->selectRaw('id_curso, nombre')->get();
        $modulos = Modulo::where('activo', '1')->selectRaw('id_modulo, nombre')->get();
        $datos = array("cursos" => $cursos, "modulos" => $modulos);
        return view('cursos.catalogos.cursos')->with('datos', $datos);
    }

    public function mostraCursos(){
        $cursos = Curso::join('modulos', 'temario.id_temario', 'modulos.id_modulo')
        ->join('cursos', 'temario.id_curso', 'cursos.id_curso')
        ->selectRaw('temario.*, modulos.nombre AS nombre_modulo, cursos.nombre AS nombre_curso')
        ->get();
        return Response::json($temarios);
    }

    public function storeCurso(Request $request, $id){
        DB::beginTransaction();
        try {
            if($id != 0){
                $curso = Curso::where('id_curso', $id)
                ->update([
                    'id_curso' => $request->id_curso,
                    'nombre' => $request->nombre,
                    'desc_curso' => $request->desc_curso,
                    'portada' => $request->portada,
                    'activo' => $request->activo,
                    'id_categoria' => $request->id_categoria
                ]);
                $result = array(
                    "Error" => false,
                    "message" => "Se ha editado con exito el curso con folio [$id]"
                );
            }
            else{
                $temario = new Curso();
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
