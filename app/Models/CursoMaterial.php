<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursoMaterial extends Model
{
        protected $table = 'materiales';
        protected $primaryKey = 'id_material';
        protected $fillable = ["nombre", "url", "bActivo", "fecha_creacion", "id_curso"];
        public $timestamps = false;
}

