<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

use App\Http\Requests\ClienteRequest;
class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:clientes.index');
        $this->middleware('can:clientes.create')->only('create','store');
        $this->middleware('can:clientes.show');
        $this->middleware('can:clientes.edit')->only('edit','update');
        $this->middleware('can:clientes.destroy');
    }
   
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $clientes=Cliente::where('codigo','LIKE','%'.$busqueda.'%')
        ->orWhere('nombre','LIKE','%'.$busqueda.'%')
        ->latest('id')
        ->paginate(10);
        return view('admin.clientes.index',compact('clientes','busqueda'));
    }

  
    public function create()
    {
        #$estados =[
        #    1=>"Activo",
        #    2=>"Desactivo"
        #];
        $estados = ['Activo','Descativo'];
        return view('admin.clientes.create',compact('estados'));
    }

   
    public function store(ClienteRequest $request)
    {
        $cliente = Cliente::create($request->all());
        return redirect()->route('clientes.index')->with(['estado'=>'success','titulo'=>'Guardado!','texto'=>'Se guardó correctamente']);
    }

    
    public function show(Cliente $cliente)
    {
        //
    }

  
    public function edit(Cliente $cliente)
    {
        $estados = ['Activo','Descativo'];
        return view('admin.clientes.edit',compact('cliente','estados'));
    }

  
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with(['estado'=>'success','titulo'=>'Modificado!','texto'=>'Se modificó correctamente']);
    }

    
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with(['estado'=>'success','titulo'=>'Eliminado!','texto'=>'Se eliminó correctamente']);
    }
}
