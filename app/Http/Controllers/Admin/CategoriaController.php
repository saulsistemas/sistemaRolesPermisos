<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
   
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $categorias=Categoria::where('codigo','LIKE','%'.$busqueda.'%')
        ->orWhere('nombre','LIKE','%'.$busqueda.'%')
        ->latest('id')
        ->paginate(2);
        return view('admin.categorias.index',compact('categorias','busqueda'));
    }

   
    public function create()
    {
        return view('admin.categorias.create');
    }

 
    public function store(Request $request)
    {
        $categoria = Categoria::create($request->all());
        return redirect()->route('categorias.index');

    }


    public function show(Categoria $categoria)
    {
        return view('admin.categorias.show',compact('categoria'));
    }

 
    public function edit(Categoria $categoria)
    {
        return view('admin.categorias.edit',compact('categoria'));
    }

  
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update($request->all());
        return redirect()->route('categorias.index');
    }

 
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
