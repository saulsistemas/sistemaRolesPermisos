<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VentaRequest;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:ventas.index');
        $this->middleware('can:ventas.create')->only('create','store');
        $this->middleware('can:ventas.show');
        $this->middleware('can:ventas.edit')->only('edit','update');
        $this->middleware('can:ventas.destroy');
    }
 
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $ventas=Venta::where('fecha_venta','LIKE','%'.$busqueda.'%')
        ->orWhere('estado','LIKE','%'.$busqueda.'%')
        ->latest('id')
        ->paginate(10);
        return view('admin.ventas.index',compact('ventas','busqueda'));
    }

   
    public function create()
    {
        $clientes = Cliente::where('estado','0')->pluck('nombre','id');
        $productos = Producto::where('estado','0')->pluck('nombre','id');
        $estados = ['Activo','Desactivo'];
        return view('admin.ventas.create',compact('estados','clientes','productos'));
    }

    
    public function store(VentaRequest $request)
    {
        $venta = Venta::create($request->all());
        return redirect()->route('detalleventas.create',$venta)->with(['estado'=>'success','titulo'=>'Guardado!','texto'=>'Se guardó correctamente']);
    }


    public function show(Venta $venta)
    {
        //
    }


    public function edit(Venta $venta)
    {
        //
    }

  
    public function update(Request $request, Venta $venta)
    {
        //
    }

   
    public function destroy(Venta $venta)
    {
        //
    }
}
