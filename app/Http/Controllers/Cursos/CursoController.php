<?php

namespace App\Http\Controllers\Cursos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Facades\Auth;

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

    public function save(Request $request){
        
    }
}
