<?php

namespace App\Http\Controllers\Cursos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\CursoMaterial As Material;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CursoController extends Controller
{
    public function index(Request $request) {
        $user = Auth::user();
        $cursos = Curso::where('activo', '1')->get();
        if($user)
            return view('cursos.view', compact('cursos'));
        else
            return redirect('/');
    }
    public function create(){
        return view('cursos.form.materialescreate');
    }
    public function createcurso(){
        return view('cursos.form.cursoscreate');
    }

    public function createtemario(){
        return view('cursos.form.temariocreate');
    }

    public function saveMateriales(Request $request){
        Validator::make($request->all(), [
            'nameCurso' => 'required|min:3|max:255',
            'materialFile' => 'required',
            'slcCurso' => 'required|integer',
        ])->validate();
        $material = new Material();
        $material->nombre = $request->nameCurso;
        $material->url = $request->materialFile;
        $material->id_curso = $request->slcCurso;
        $material->save();
        return redirect()->back()->with(["success" => "Material creado con éxito"]);
    }

    public function saveCursos(Request $request){
        Validator::make($request->all(), [
            'Curso' => 'required|min:3|max:255',
            'descripcion' => 'required|min:3|max:255',
            'portada' => 'required',
        ])->validate();
        try{
            $curso = new Curso();
            $curso->nombre = $request->Curso;
            $curso->desc_curso = $request->descripcion;
            $curso->portada = $request->portada;
            $curso->save();
            return redirect()->back()->with(["success" => "Material creado con éxito"]);
        }
        catch(Exception $e) {
            return redirect()->back()->with('errors', 'Ocurrio un error intentalo más tarde');
        }
    }

    public function obtenerCursos(){
        $cursos = Curso::where('activo', '1')->selectRaw('id_curso, nombre')->get();
        return Response::json($cursos);
    }
}
