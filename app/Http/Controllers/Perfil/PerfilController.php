<?php

namespace App\Http\Controllers\Perfil;

use App\Http\Controllers\Controller;
use App\User AS Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller{
    public function miPerfil(){
        $user = Auth::user();
        if($user){
            return view('perfil.miperfil', compact('user'));
        }
    }
}
