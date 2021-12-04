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
        $user = Auth::user();
        $cursos = Categoria::find($id)->curso()->where('activo', '1')->get();
        
        $cursoOrdenado = [];
        foreach($cursos as $indexCurso => $infoCurso){
            switch ($infoCurso->id_modulo) {
                case 10:
                    $cursoOrdenado['Basico'][] = $infoCurso;
                    break;
                case 11:
                    $cursoOrdenado['Intermedio'][] = $infoCurso;
                    break;
                case 12:
                    $cursoOrdenado['Avanzado'][] = $infoCurso;
                    break;
            }
        }
        //dd($cursoOrdenado);
        if($user == null){
            return redirect('/');
        }
        if($cursos)
            return view('cursos.view2', compact('cursoOrdenado'));
    }
}
