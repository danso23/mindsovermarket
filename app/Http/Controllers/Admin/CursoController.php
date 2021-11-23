<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\CursoMaterial As Material;
use App\Models\CursoTemario As Temario;
use App\Models\CursoModulo As Modulo;
use App\Models\CategoriaModel As Categoria;
use App\Models\NivelModel As Nivel;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use DB;

class CursoController extends Controller
{
    public function mostrarCursosView(Request $request){
        
        $arrayCategorias = [1,2];

        $categorias = Categoria::where('activo', 1)
                        ->whereIn('id_categoria', $arrayCategorias)
                        ->selectRaw('id_categoria, nombre_categoria AS nombre')
                        ->get();  

        $nivel  =  Nivel::where('activo',1)
                   ->select('id_nivel','nombre')
                   ->get(); 
        
        $datos = array("categorias" => $categorias, "niveles" => $nivel);
        
        return view('cursos.catalogos.cursos')->with('datos', $datos);
    }

    public function mostrarCurso(){
        $cursos =  Curso::selectRaw('cursos.*')
                   ->where('activo', 1)
                   ->get();
        
        return Response::json($cursos);
    }

    public function storeCurso(Request $request, $id = null){

        if (!\Auth::check()) {
            $jsonData = [
                'Error' => false,
                'redirect' => url('/login')
            ];
            
            return response()->json($jsonData);
        }
        /*
            desc_curso
que_curso
sobre_profe
categoria
nivel_academico


//BD
id_curso
nombre
desc_curso
objetivo
about_teacher
activo
id_categoria
id_nivel
        */
        DB::beginTransaction();
        try {
            //if($id != 0){
            if(isset($id) && $id != null && $id != 0 && !isset($request->delete)){
                $curso = Curso::where('id_curso', $id)
                ->update([
                    'nombre'        => $request->nombre,
                    'desc_curso'    => $request->desc_curso,
                    'objetivo'      => $request->que_curso,
                    'about_teacher' => $request->sobre_profe,
                    'id_categoria'  => $request->categoria,
                    'id_nivel'      => $request->nivel_academico,
                    'activo'        => 1                    
                ]);
                $result = array(
                    "Error" => false,
                    "message" => "Se ha editado con exito el curso con folio [$id]"
                );
            }
            else{
                if(isset($id) && $id == 0 && !isset($request->delete)){
                    $temario = new Curso();
                    $temario->nombre        = $request->nombre;
                    $temario->desc_curso    = $request->desc_curso;
                    $temario->objetivo      = $request->que_curso;
                    $temario->about_teacher = $request->sobre_profe;
                    $temario->id_categoria  = $request->categoria;
                    $temario->id_nivel      = $request->nivel_academico;
                    $temario->activo        = 1;
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

                        $resultCurso = Curso::whereIn('id_curso', $delete)->update([
                            'activo' => 0
                        ]);
                    }
                    else{                        

                        $objCurso = Curso::find($delete);                        
                        $objCurso->activo = 0;
                        $resultCurso = $objCurso->save();                        
                    }

                    if($resultCurso){// && $resultCate){
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
