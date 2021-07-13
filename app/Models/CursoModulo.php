<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursoModulo extends Model
{
        protected $table = 'modulos';
        protected $primaryKey = 'id_modulo';
        protected $fillable = ["nombre", "id_curso", "fecha_creacion"];
        public $timestamps = false;
}

