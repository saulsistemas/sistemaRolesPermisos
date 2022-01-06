<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable=['categoria_id','codigo','nombre','stock','precio','imagen','estado'];
    #relacion 1 a muchos inversa (PERTENECE A UNA CATEGORIA)
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
