<?php

namespace App\Http\Controllers\Categorias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\CursoMaterial As Material;
use App\Models\CategoriaModel As Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class CategoriaController extends Controller{
    public function getCategorias(){
    	$categorias = Categoria::where('activo', '1')->get();
        return Response::json($categorias);
    }

    public function mostrarCursosByCategoria($id){
        $cursos = Categoria::find($id)->curso()->where('activo', '1')->get();
        if($cursos)
            return view('cursos.view', compact('cursos'));
    }
}
