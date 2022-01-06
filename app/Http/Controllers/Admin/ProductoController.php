<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductoRequest;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:productos.index');
        $this->middleware('can:productos.create')->only('create','store');
        $this->middleware('can:productos.show');
        $this->middleware('can:productos.edit')->only('edit','update');
        $this->middleware('can:productos.destroy');
    }
   
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $productos=Producto::where('codigo','LIKE','%'.$busqueda.'%')
        ->orWhere('nombre','LIKE','%'.$busqueda.'%')
        ->latest('id')
        ->paginate(10);
        return view('admin.productos.index',compact('productos','busqueda'));
    }

    
    public function create()
    {
        #$categorias = Categoria::all();
        $categorias = Categoria::where('estado','0')->pluck('nombre','id');
        $estados = ['Activo','Desactivo'];
        return view('admin.productos.create',compact('estados','categorias'));
    }

    
    public function store(ProductoRequest $request)
    {
        #return $request;
        $data = $request->all();
        if ($request->has('imagen')) {
            $image_path = $request->file('imagen')->store('media');
            $data['imagen'] = $image_path;
        }
        $producto = Producto::create($data);
        return redirect()->route('productos.index')->with(['estado'=>'success','titulo'=>'Guardado!','texto'=>'Se guardó correctamente']);
    }

   
    public function show(Producto $producto)
    {
        //
    }

    
    public function edit(Producto $producto)
    {
        $categorias = Categoria::where('estado','0')->pluck('nombre','id');
        $estados = ['Activo','Desactivo'];
        return view('admin.productos.edit',compact('producto','estados','categorias'));
    }

  
    public function update(ProductoRequest $request, Producto $producto)
    {
        $data = $request->all();
        if ($request->has('imagen')) {
            Storage::delete($producto->imagen);
            $image_path = $request->file('imagen')->store('media');
            $data['imagen'] = $image_path;
        }
        $producto->update($data);
        return redirect()->route('productos.index')->with(['estado'=>'success','titulo'=>'Modificado!','texto'=>'Se modificó correctamente']);
    }

  
    public function destroy(Producto $producto)
    {
        Storage::delete($producto->imagen);
        $producto->delete();
        return redirect()->route('productos.index')->with(['estado'=>'success','titulo'=>'Eliminado!','texto'=>'Se eliminó correctamente']);
    
    }
}
