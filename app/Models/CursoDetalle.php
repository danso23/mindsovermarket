<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursoDetalle extends Model{
    protected $table = 'temario';
    protected $primaryKey = 'id_curso';
    protected $fillable = ["nombre", "descripcion", "url_video", "activo", "fecha_creacion"];
    public $timestamps = false;
}

