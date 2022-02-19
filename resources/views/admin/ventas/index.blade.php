@extends('adminlte::page')

@section('title', 'venta')

@section('content_header')
    <h1>Lista de venta</h1>
@stop

@section('content')
<div class="card bg-light mb-3" >
    <div class="card-header">
        <h3 class="card-title">Listado</h3>
        <div class="card-tools">
            <a href="{{ route('ventas.index') }}" class="btn btn-tool" >
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
            <form action="{{ route('ventas.index') }}" method="GET">
                <div class="btn-group">
                    <input type="text" name="busqueda" class="form-control">
                    {{-- <input type="submit" value="enviar" class="btn btn-primary"> --}}
                    <button type="submit" class="btn btn-primary" ><i class="fas fa-search-plus"></i></button>
                </div>
            </form>
        </div> 
        <div>
            @can('ventas.create')
                <a href="{{ route('ventas.create') }}" class="btn btn-primary"><i class="fas fa-plus-square"></i></a>
            @endcan
        </div> 
        <table class="table table-striped">
            <thead>
                <td>ID</td>
                <td>FECHA</td>
                <td>ITEMS</td>
                <td>CLIENTE</td>
                <td>SUBTOTAL</td>
                <td>ESTADO</td>
                <td>CREADO</td>
                <td>OPCIONES</td>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                    <tr>
                        <td>{{$venta->id}}</td>
                        <td>{{$venta->fecha_venta}}</td>
                        <td>{{$venta->detalle_ventas->count()}}</td>
                        <td>{{$venta->cliente->nombre}}</td>
                        <td>{{$venta->detalle_ventas->sum('total')}}</td>
                        <td>@if($venta->estado=='new')<p class="badge bg-success">Nuevo</p> @else <p class="badge bg-warning">Enviado</p> @endif</td>
                        <td>{{$venta->created_at}}</td>
                        <td class="btn-group">
                            <a class="btn btn-primary" href="{{ route('detalle_ventas.create', $venta) }}"><i class="fas fa-list-alt"></i></a>
                            @can('ventas.edit')
                                <a class="btn btn-warning" href="{{ route('ventas.edit', $venta) }}"><i class="fas fa-edit"></i></a>
                            @endcan
                            @can('ventas.destroy')
                                <form action="{{ route('ventas.destroy', $venta) }}" method="POST" class="formulario-eliminar">
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
                    <td colspan="4"> {{$ventas->appends(['busqueda'=>$busqueda])}} </td>
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