<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\CursoMaterial As Material;
use App\Models\CursoTemario As Temario;
use App\Models\CursoModulo As Modulo;
use App\Models\CategoriaModel As Categoria;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use DB;

class CursoController extends Controller
{
    public function mostrarCursosView(Request $request){
        $categorias = Categoria::where('activo', '1')->selectRaw('id_categoria, nombre_categoria AS nombre')->get();
        $datos = array("categorias" => $categorias);
        return view('cursos.catalogos.cursos')->with('datos', $datos);
    }

    public function mostrarCurso(){
        $cursos = Curso::selectRaw('cursos.*')
        ->get();
        return Response::json($cursos);
    }

    public function storeCurso(Request $request, $id){
        DB::beginTransaction();
        try {
            if($id != 0){
                $curso = Curso::where('id_curso', $id)
                ->update([
                    'nombre' => $request->nombre,
                    'desc_curso' => $request->desc_curso,
                    'portada' => $request->portada,
                    'activo' => 1,
                    'id_categoria' => $request->categoria
                ]);
                $result = array(
                    "Error" => false,
                    "message" => "Se ha editado con exito el curso con folio [$id]"
                );
            }
            else{
                $temario = new Curso();
                $temario->nombre = $request->nombre;
                $temario->desc_curso = $request->desc_curso;
                $temario->portada = $request->portada;
                $temario->id_categoria = $request->categoria;
                $temario->activo = 1;
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
