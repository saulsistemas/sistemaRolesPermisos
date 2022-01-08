<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function create(Venta $venta)
    {
        $productos = Producto::where('estado','0')->pluck('nombre','id');
        $detalleVentas=DetalleVenta::where('venta_id',$venta->id)->get();
        return view('admin.detalleventas.create', compact('productos', 'venta','detalleVentas'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'venta_id' => 'required',
            'producto_id' => 'required',
            'cantidad' => 'required'
        ]);
        #return $request;
        $data = $request->only(['producto_id', 'venta_id', 'precio', 'cantidad']);
        if ($data['precio'] !== "") {
            $data['precio'] = Producto::find($data['producto_id'])->precio;
        }
        $data['total'] = $data['precio'] * $data['cantidad'];
        DetalleVenta::create($data);
        return redirect()->route('detalleventas.create',['venta' => $data['venta_id']])->with([
            'status'=>'success',
            'color'=>'green',
            'message'=>'Venta creado corectamete']);
    }  
    public function destroy(DetalleVenta $detalleVentas)
    {
        return $detalleVentas;
        #DetalleVenta::create($data);
        #return redirect()->route('detalleventas.create',['venta' => $data['venta_id']])->with(['estado'=>'success','titulo'=>'Eliminado!','texto'=>'Se eliminó correctamente']);
    }      
}
