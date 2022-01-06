<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    #asignacion masiva
    protected $fillable=['codigo','nombre','estado'];
    #relacion 1 a muchos (TIENE MUCHOS PRODUCTOS)
    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
