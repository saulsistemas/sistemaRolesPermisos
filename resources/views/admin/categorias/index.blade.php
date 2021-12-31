@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <h1>Lista de Categoria</h1>
@stop

@section('content')
<div class="card bg-light mb-3" >
    <div class="card-header">
        <h3 class="card-title">Listado</h3>
        <div class="card-tools">
            <a href="{{ route('categorias.index') }}" class="btn btn-tool" >
                <i class="fas fa-sync-alt"></i>
            </a>
            <button type="button" class="btn btn-tool" data-card-widget="maximize">
              <i class="fas fa-expand"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>
    <div class="card-body">
        <div class="d-md-flex justify-content-md-end">
            <form action="{{ route('categorias.index') }}" method="GET">
                <div class="btn-group">
                    <input type="text" name="busqueda" class="form-control">
                    <input type="submit" value="enviar" class="btn btn-primary">
                </div>
            </form>
        </div> 
        <div>
            @can('categorias.create')
                <a href="{{ route('categorias.create') }}" class="btn btn-primary">Agregar</a>
            @endcan
        </div> 
        <table class="table table-striped">
            <thead>
                <td>ID</td>
                <td>CODIGO</td>
                <td>NOMBRE</td>
                <td>CREADO</td>
                <td>OPCIONES</td>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->id}}</td>
                        <td>{{$categoria->codigo}}</td>
                        <td>{{$categoria->nombre}}</td>
                        <td>{{$categoria->created_at}}</td>
                        <td class="btn-group">
                            <a class="btn btn-primary" href="{{ route('categorias.show', $categoria) }}">+</a>
                            @can('categorias.edit')
                                <a class="btn btn-warning" href="{{ route('categorias.edit', $categoria) }}">Editar</a>
                            @endcan
                            @can('categorias.destroy')
                                <form action="{{ route('categorias.destroy', $categoria) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Eliminar" class="btn btn-danger">
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4"> {{$categorias->appends(['busqueda'=>$busqueda])}} </td>
                </tr>
            </tfoot>        
        </table>               
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop