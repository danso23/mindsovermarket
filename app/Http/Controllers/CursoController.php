<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Curso;
class CursoController extends Controller
{
    public function index() {
        $cursos = Curso::where('activo', '1')->get();
        return view('cursos.view', compact('cursos'));
    }
}
