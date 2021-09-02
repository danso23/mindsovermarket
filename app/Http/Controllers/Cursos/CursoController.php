<?php

namespace App\Http\Controllers\Cursos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Lives;
use App\Models\CursoMaterial As Material;
use App\Models\CursoModulo As Modulo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CursoController extends Controller
{
    /**
     * @param $request
     * index -- Funcion para ver los cursos, si el usuario no tienen membresia o no ha iniciado sesión no debe mostrar los cursos
     */
    public function index(Request $request) {
        $user = Auth::user();
        $cursos = Curso::where('activo', '1')->get();
        if($user == null)
            return redirect('/');
        if($user->membresia == 1)
            return view('cursos.view', compact('cursos'));
        else{
            return redirect('/'); // AQUI FALTA AGREGAR PANTALLA PARA INVITARLO A RENOVAR SU SUSCRIPCION
        }
    }
    public function create(){
        $user = Auth::user();
        if($user == null)
            return redirect('/');
        if($user->tipo_user != 3)
            return redirect('/');

        return view('cursos.form.materialescreate');
    }
    public function createcurso(){
        $user = Auth::user();
        if($user == null)
            return redirect('/');
        if($user->tipo_user != 3)
            return redirect('/');

        return view('cursos.form.cursoscreate');
    }

    public function createtemario(){
        $user = Auth::user();
        if($user == null)
            return redirect('/');
        if($user->tipo_user != 3)
            return redirect('/');

        return view('cursos.form.temariocreate');
    }

    public function saveMateriales(Request $request){
        Validator::make($request->all(), [
            'nameMaterial' => 'required|min:3|max:255',
            'materialFile' => 'required',
            'slcCurso' => 'required|integer',
        ])->validate();
        try {
            $material = new Material();
            $material->nombre = $request->nameMaterial;
            $material->url = $request->materialFile;
            $material->id_curso = $request->slcCurso;
            $material->save();
            return redirect()->back()->with(["success" => "Material creado con éxito"]);
        }
        catch (Exception $e) {
            return redirect()->back()->with('errors', 'Ocurrio un error intentalo más tarde');
        }
    }

    public function saveCursos(Request $request){
        Validator::make($request->all(), [
            'Curso' => 'required|min:3|max:255',
            'descripcion' => 'required|min:3|max:255',
            'portada' => 'required',
        ])->validate();
        try{
            $user = Auth::user();
            if($user->tipo_user != 3)
                return redirect('/');
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

    public function obtenerLives(){
        $lives = Lives::where('activo', '1')->get();
        return view('cursos.lives')->with('lives', $lives);
    }
}
