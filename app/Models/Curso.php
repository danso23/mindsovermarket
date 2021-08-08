<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model{
    protected $table = 'cursos';
    protected $primaryKey = 'id_curso';
    protected $fillable = ["nombre", "desc_curso", "portada", "activo", "fecha_creacion", "id_categoria"];
    public $timestamps = false;
    
    public function categoria(){
        return $this->hasOne(CategoriaModel::class, 'id_categoria', 'id_categoria');
    }
}
