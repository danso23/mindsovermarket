<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursoDetalle extends Model{
    protected $table = 'temario';
    protected $primaryKey = 'id_temario';
    protected $fillable = ["nombre", "descripcion", "url_video", "bActivo", "id_modulo", "id_curso", "fecha_creacion"];
    public $timestamps = false;
}

