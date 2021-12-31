@extends('adminlte::page')

@section('title', 'Rol')

@section('content_header')
    <h1>Lista de Rol</h1>
@stop

@section('content')
<div class="card bg-light mb-3" >
    <div class="card-header">
        <h3 class="card-title">Listado</h3>
        <div class="card-tools">
            <a href="{{ route('roles.index') }}" class="btn btn-tool" >
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
        @if (session('info'))
        <div class="alert alert-danger">
            <strong>{{session('info')}}</strong>
        </div>
        @endif        
        <div class="d-md-flex justify-content-md-end">
            <form action="{{ route('roles.index') }}" method="GET">
                <div class="btn-group">
                    <input type="text" name="busqueda" class="form-control">
                    <input type="submit" value="enviar" class="btn btn-primary">
                </div>
            </form>
        </div> 
        <div>
            @can('roles.create')
                <a href="{{ route('roles.create') }}" class="btn btn-primary">Agregar</a>
            @endcan
        </div> 
        <table class="table table-striped">
            <thead>
                <td>ID</td>
                <td>NOMBRE</td>
                <td>OTRO</td>
                <td>CREADO</td>
                <td>OPCIONES</td>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->guard_name}}</td>
                        <td>{{$role->created_at}}</td>
                        <td class="btn-group">
                            <a class="btn btn-primary" href="{{ route('roles.show', $role) }}">+</a>
                            @can('roles.edit')
                                <a class="btn btn-warning" href="{{ route('roles.edit', $role) }}">Editar</a>
                            @endcan
                            @can('roles.destroy')
                                <form action="{{ route('roles.destroy', $role) }}" method="POST">
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
                    <td colspan="4"> {{$roles->appends(['busqueda'=>$busqueda])}} </td>
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