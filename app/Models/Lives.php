<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lives extends Model{
    protected $table = 'lives';
    protected $primaryKey = 'id_live';
    protected $fillable = ["nombre", "descripcion", "portada", "url", "activo"];
    public $timestamps = false;
    
}
