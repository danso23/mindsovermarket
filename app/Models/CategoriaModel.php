<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaModel extends Model{
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';
    protected $fillable = ['nombre_categoria', 'desc_categoria', 'activo'];

    public function curso(){
        return $this->belongsTo(Curso::class, 'id_categoria', 'id_categoria');
    }
}
