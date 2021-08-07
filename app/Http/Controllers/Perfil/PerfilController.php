<?php

namespace App\Http\Controllers\Perfil;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller{
    public function miPerfil(){
        return view('perfil.miperfil');
    }

    public function obtenerDetalles(){
        $perfil = Perfil::where('id', '1')->selectRaw('name, mail')->get();
        return Response::json($perfil);
    }
}
