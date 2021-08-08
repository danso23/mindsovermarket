<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\CursoMaterial As Material;
use App\Models\CursoTemario As Temario;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Response;

class TemarioController extends Controller {
    public function mostraTemarios(){
        $temarios = Temario::find();
        return Response::json($temarios);
    }
}
