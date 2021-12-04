<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NivelModel extends Model{
    protected $table = 'nivelacademico';
    protected $primaryKey = 'id_nivel';
    protected $fillable = ['nombre', 'activo','id_nivel'];
    public $timestamps = false;
}
