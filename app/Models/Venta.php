<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Venta extends Model
{
    use HasFactory;
    protected $fillable=['cliente_id','user_id','fecha_venta','igv','estado'];
    #relacion 1 a muchos inversa (PERTENECE A UN CLIENTE)
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    #relacion 1 a muchos inversa (PERTENECE A UN USUARIO)
    public function user(){
        return $this->belongsTo(User::class);
    }
    #relacion 1 a muchos (TIENE MUCHOS DETALLES)
    public function detalle_ventas(){
        return $this->hasMany(DetalleVenta::class);
    }
}
