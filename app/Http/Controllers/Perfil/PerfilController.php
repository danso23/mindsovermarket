<?php

namespace App\Http\Controllers\Perfil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerfilController extends Controller{
    public function miPerfil(){
        return view('perfil.miperfil');
    }
}
