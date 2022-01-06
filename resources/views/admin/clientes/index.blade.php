@extends('adminlte::page')

@section('title', 'cliente')

@section('content_header')
    <h1>Lista de Cliente</h1>
@stop

@section('content')
<div class="card bg-light mb-3" >
    <div class="card-header">
        <h3 class="card-title">Listado</h3>
        <div class="card-tools">
            <a href="{{ route('clientes.index') }}" class="btn btn-tool" >
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
            <form action="{{ route('clientes.index') }}" method="GET">
                <div class="btn-group">
                    <input type="text" name="busqueda" class="form-control">
                    {{-- <input type="submit" value="enviar" class="btn btn-primary"> --}}
                    <button type="submit" class="btn btn-primary" ><i class="fas fa-search-plus"></i></button>
                </div>
            </form>
        </div> 
        <div>
            @can('clientes.create')
                <a href="{{ route('clientes.create') }}" class="btn btn-primary"><i class="fas fa-plus-square"></i></a>
            @endcan
        </div> 
        <table class="table table-striped">
            <thead>
                <td>ID</td>
                <td>CODIGO</td>
                <td>NOMBRE</td>
                <td>DIRECCION</td>
                <td>TELEFONO</td>
                <td>ESTADO</td>
                <td>CREADO</td>
                <td>OPCIONES</td>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{$cliente->id}}</td>
                        <td>{{$cliente->codigo}}</td>
                        <td>{{$cliente->nombre}}</td>
                        <td>{{$cliente->direccion}}</td>
                        <td>{{$cliente->telefono}}</td>
                        <td>@if($cliente->estado==0)<p class="badge bg-success">Habilitado</p> @else <p class="badge bg-warning">Deshabilitado</p> @endif</td>
                        <td>{{$cliente->created_at}}</td>
                        <td class="btn-group">
                            <a class="btn btn-primary" href="{{ route('clientes.show', $cliente) }}"><i class="fas fa-list-alt"></i></a>
                            @can('clientes.edit')
                                <a class="btn btn-warning" href="{{ route('clientes.edit', $cliente) }}"><i class="fas fa-edit"></i></a>
                            @endcan
                            @can('clientes.destroy')
                                <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="formulario-eliminar">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" ><i class="fas fa-trash-alt"></i></button>
                                    {{-- <input type="submit" value="Del" class="btn btn-danger"> --}}
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4"> {{$clientes->appends(['busqueda'=>$busqueda])}} </td>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('estado'))
        <script>
            Swal.fire(
                '{{session("titulo")}}!',
                '{{session("texto")}}',
                'success'
            )
        </script>
    @endif
<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
        title: 'Estás seguro?',
        text: "El registro se eliminará definitivamente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })        

    })
    
</script>    
@stop