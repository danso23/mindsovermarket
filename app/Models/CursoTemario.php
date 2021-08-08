<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursoTemario extends Model
{
    protected $table = 'temarios';
    protected $primaryKey = 'id_temario';
    protected $fillable = ["nombre", "descripcion", "url_video", "bActivo", "fecha_creacion", "id_modulo", "id_curso"];
    public $timestamps = false;

    public function modulos(){
        return $this->hasOne(CursoModulo::class, 'id_modulo', 'id_modulo');
    }
}
