<?php

namespace App\Http\Controllers\Cursos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\CategoriaModel AS Categoria;

class CursoDetalleController extends Controller
{
    public function index(Request $request, $id){
        $categorias = Categoria::where('activo', '1')->selectRaw('id_categoria, nombre_categoria')->get();
        $datos = array('cursos' => '', 'categorias' => $categorias );
        return view('cursos.detail')->with('datos', $datos);
    }
}
