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
        return view('admin.detalle_ventas.create', compact('productos', 'venta','detalleVentas'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'venta_id' => 'required',
            'producto_id' => 'required',
            'cantidad' => 'required'
        ]);
        $data = $request->only(['producto_id', 'venta_id', 'precio', 'cantidad']);
        $this->disminuirStock($data['producto_id'],$data['cantidad']);

        if ($data['precio'] !== "") {
            $data['precio'] = Producto::find($data['producto_id'])->precio;
        }
        $data['total'] = $data['precio'] * $data['cantidad'];
        DetalleVenta::create($data);
        return redirect()->route('detalle_ventas.create',['venta' => $data['venta_id']])->with(['estado'=>'success','titulo'=>'Guardado!','texto'=>'Se guardó correctamente']);
    }  
    public function destroy($detalle_venta)
    {
        $data = DetalleVenta::find($detalle_venta);
        $data->delete();
        return redirect()->route('detalle_ventas.create',['venta' => $data['venta_id']])->with(['estado'=>'success','titulo'=>'Eliminado!','texto'=>'Se eliminó correctamente']);
    } 
    
    public function disminuirStock($producto_id,$cantidad){
        #$stock = Producto::find($producto_id)->stock;
        $producto = Producto::find($producto_id);
        echo $resta = $producto->stock-$cantidad;
        $producto->stock =$resta;
        $producto->save();
        return true;
        #$data['price'] = Product::find($data['product_id'])->price;
       # $producto = Producto::where('estado','0')->pluck('nombre','id');
    }
    public function aumentarStock($producto_id,$cantidad){
        $producto = Producto::find($producto_id);
        echo $resta = $producto->stock-$cantidad;
        $producto->stock =$resta;
        $producto->save();
        return true;
      
    }
}
