<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable=['codigo','nombre','direccion','telefono','estado'];
    #relacion 1 a muchos (TIENE MUCHAS VENTAS)
    public function ventas(){
        return $this->hasMany(Venta::class);
    }
    
}
